<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReviewResource\Pages;
use App\Filament\Resources\ReviewResource\RelationManagers;
use App\Models\Review;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ReviewResource extends Resource
{
    protected static ?string $model = Review::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static bool $isLazy = false;

    protected static ?string $modelLabel = 'Review'; // Label untuk satu item
    protected static ?string $pluralModelLabel = 'Daftar Ulasan'; // Label untuk daftar item
    protected static ?string $navigationLabel = 'Reviews'; // Label di sidebar

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_pembeli')
                    ->label('Nama Pembeli')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('produk.name')
                    ->label('Nama Produk')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('rating')
                    ->label('Rating')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('comment')
                    ->label('Comment')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
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
            'index' => Pages\ListReviews::route('/'),
        ];
    }
}
