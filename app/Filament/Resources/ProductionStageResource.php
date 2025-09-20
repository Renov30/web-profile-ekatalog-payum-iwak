<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductionStageResource\Pages;
use App\Filament\Resources\ProductionStageResource\RelationManagers;
use App\Models\ProductionStage;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductionStageResource extends Resource
{
    protected static ?string $model = ProductionStage::class;
    protected static ?string $navigationGroup = 'Pesanan';
    protected static ?int $navigationSort = 3;
    protected static ?string $navigationLabel = 'Tahapan Produksi'; // Label di sidebar
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Nama Tahapan')
                    ->required()
                    ->maxLength(255),
                TextInput::make('urutan')
                    ->label('Urutan Tahapan')
                    ->required()
                    ->integer() // membatasi input hanya integer
                    ->minValue(1) // optional, jika mau minimal 1
                    ->maxValue(1000), // optional, jika mau batas maksimum
                TextInput::make('durasi')
                    ->label('Durasi Tahapan')
                    ->required()
                    ->postfix('hari')
                    ->integer() // membatasi input hanya integer
                    ->minValue(1) // optional, jika mau minimal 1
                    ->maxValue(1000), // optional, jika mau batas maksimum
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nama Tahapan')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('urutan')
                    ->label('Urutan Tahapan')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('durasi')
                    ->label('Durasi Tahapan (hari)')
                    ->formatStateUsing(fn($state) => $state . ' hari')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListProductionStages::route('/'),
            'create' => Pages\CreateProductionStage::route('/create'),
            'edit' => Pages\EditProductionStage::route('/{record}/edit'),
        ];
    }
}
