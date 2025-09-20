<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Helpers\EnumStatusHelper;
use App\Models\Order;
use App\Models\OrderProduction;
use App\Models\ProductionStage;
use App\Models\Produk;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ExportBulkAction;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;
    protected static ?string $navigationGroup = 'Pesanan';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static bool $isLazy = false;
    protected static ?string $modelLabel = 'Pesanan'; // Label untuk satu item
    protected static ?string $pluralModelLabel = 'Daftar Pesanan'; // Label untuk daftar item
    protected static ?string $navigationLabel = 'Pesanan'; // Label di sidebar

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Nama Pembeli')
                    ->required()
                    ->maxLength(255),
                DatePicker::make('tanggal_order')
                    ->label('Tanggal Pesan')
                    ->default(now())
                    ->required(),
                TextInput::make('no_hp')
                    ->label('No Handphone')
                    ->required()
                    ->maxLength(255),
                Textarea::make('alamat')
                    ->label('Alamat')
                    ->required()
                    ->rows(5),
                Repeater::make('orderItem')
                    ->label('Daftar Produk')
                    ->columnSpanFull()
                    ->relationship()
                    ->afterStateUpdated(function ($state, $set) {
                        // $state adalah seluruh array orderItem
                        $total = collect($state)->sum(fn($item) => $item['harga_subtotal'] ?? 0);
                        $set('total_harga', $total);
                    })
                    ->schema([
                        Select::make('produk_id')
                            ->label('Produk')
                            ->options(Produk::all()->pluck('name', 'id'))
                            ->reactive()
                            ->afterStateUpdated(function ($state, $set, $get) {
                                $produk = Produk::find($state);
                                if ($produk) {
                                    $harga = $produk->diskon
                                        ? $produk->harga - ($produk->harga * $produk->diskon / 100)
                                        : $produk->harga;
                                    $set('harga_satuan', $harga);
                                    $qty = $get('kuantitas') ?? 1;
                                    $set('harga_subtotal', $harga * $qty);
                                }
                            }),
                        TextInput::make('kuantitas')
                            ->label('Kuantitas')
                            ->numeric()
                            ->minValue(1)
                            ->reactive()
                            ->afterStateUpdated(function ($state, $set, $get) {
                                $harga = $get('harga_satuan') ?? 0;
                                $set('harga_subtotal', $harga * $state);
                            }),
                        TextInput::make('harga_satuan')
                            ->label('Harga Satuan')
                            ->numeric()
                            ->disabled()
                            ->dehydrated(false)
                            ->afterStateHydrated(function ($state, $set, $get, $record) {
                                if ($produk = Produk::find($get('produk_id'))) {
                                    $harga = $produk->diskon
                                        ? $produk->harga - ($produk->harga * $produk->diskon / 100)
                                        : $produk->harga;
                                    $set('harga_satuan', $harga);
                                }
                            }),
                        TextInput::make('harga_subtotal')
                            ->label('Subtotal')
                            ->numeric()
                            ->disabled()
                            ->reactive()
                            ->dehydrated(false)
                            ->afterStateHydrated(function ($state, $set, $get, $record) {
                                if ($produk = Produk::find($get('produk_id'))) {
                                    $harga = $produk->diskon
                                        ? $produk->harga - ($produk->harga * $produk->diskon / 100)
                                        : $produk->harga;
                                    $qty = $get('kuantitas') ?? 1;
                                    $set('harga_subtotal', $harga * $qty);
                                }
                            }),
                    ])
                    ->columns(4)
                    ->createItemButtonLabel('Tambah Produk'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label("ID")
                    ->searchable()
                    ->sortable(),
                TextColumn::make('tanggal_order')
                    ->label('Tanggal')
                    ->date()
                    ->searchable()
                    ->sortable(),
                TextColumn::make('name')
                    ->label("Nama Pembeli")
                    ->searchable()
                    ->sortable(),
                TextColumn::make('no_hp')
                    ->label("No Handphone")
                    ->searchable()
                    ->sortable(),
                TextColumn::make('alamat')
                    ->label("Alamat")
                    ->formatStateUsing(fn($state) => strip_tags($state))
                    ->limit(50)
                    ->tooltip(fn($state) => strip_tags($state))
                    ->searchable()
                    ->sortable(),
                // Kolom produk + kuantitas
                TextColumn::make('produk_list')
                    ->label('Produk')
                    ->getStateUsing(function ($record) {
                        return $record->orderItem
                            ->map(fn($item) => $item->produk?->name . ' (x' . $item->kuantitas . ')')
                            ->filter() // buang null kalau ada
                            ->toArray(); // harus array untuk badge
                    })
                    ->badge()
                    ->color('info'),
                TextColumn::make('subtotal')
                    ->label('Total Harga')
                    ->getStateUsing(function ($record) {
                        return $record->orderItem->sum(function ($item) {
                            $produk = $item->produk;
                            if (!$produk) {
                                return 0;
                            }

                            $harga = $produk->diskon
                                ? $produk->harga - ($produk->harga * $produk->diskon / 100)
                                : $produk->harga;

                            return $harga * $item->kuantitas;
                        });
                    })
                    ->money('IDR') // biar diformat uang otomatis
                    ->sortable(),

                TextColumn::make('status')
                    ->label("Status")
                    ->badge()
                    ->colors([
                        'warning' => 'menunggu konfirmasi',
                        'success' => 'dalam proses',
                        'emerald' => 'selesai',
                        'danger'  => 'dibatalkan',
                    ])
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
                Tables\Filters\Filter::make('dibatalkan')
                    ->label('Pesanan Dibatalkan')
                    ->query(fn($query) => $query->where('status', 'dibatalkan')),
                Tables\Filters\Filter::make('menunggu_konfirmasi')
                    ->label('Pesanan Menunggu Konfirmasi')
                    ->query(fn($query) => $query->where('status', 'menunggu konfirmasi')),
                Tables\Filters\Filter::make('dalam_proses')
                    ->label('Pesanan Dalam Proses')
                    ->query(fn($query) => $query->where('status', 'dalam proses')),
            ])
            ->actions([
                Tables\Actions\Action::make('konfirmasi')
                    ->label('Konfirmasi')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->requiresConfirmation()
                    ->disabled(fn(Order $record) => in_array($record->status, ['dalam proses', 'dibatalkan', 'selesai']))
                    ->action(function (Order $record) {
                        $record->update([
                            'status' => 'dalam proses',
                        ]);

                        // Ambil stage pertama berdasarkan urutan
                        $firstStage = ProductionStage::orderBy('urutan')->first();

                        // Hitung total durasi seluruh stage
                        $totalDurasi = ProductionStage::sum('durasi');

                        // Buat record order_productions
                        OrderProduction::create([
                            'id_order' => $record->id,
                            'id_stage' => $firstStage->id,
                            'tanggal_mulai' => Carbon::now(),
                            'waktu_total_produksi' => $totalDurasi,
                            'persentase_progress' => 0, // produksi baru dimulai
                        ]);
                    }),
                Tables\Actions\Action::make('batalkan')
                    ->label('Batalkan')
                    ->icon('heroicon-o-x-circle')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->disabled(fn(Order $record) => in_array($record->status, ['selesai', 'dibatalkan']))
                    ->action(function (Order $record) {
                        $record->update([
                            'status' => 'dibatalkan',
                        ]);
                        OrderProduction::where('id_order', $record->id)->delete();
                    }),
                Tables\Actions\EditAction::make(),

            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                    ExportBulkAction::make()
                        ->label('Ekspor Data'),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
