<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PengaturanWebsiteResource\Pages;
use App\Filament\Resources\PengaturanWebsiteResource\RelationManagers;
use App\Models\PengaturanWebsite;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PengaturanWebsiteResource extends Resource
{
    protected static ?string $model = PengaturanWebsite::class;

    protected static ?string $navigationLabel = 'Informasi'; // Label di sidebar

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Nama Website')
                    ->required()
                    ->maxLength(255),
                FileUpload::make('logo')
                    ->label('Logo')
                    ->required()
                    ->image(),
                RichEditor::make('deskripsi_umkm')
                    ->label('Deskripsi')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('alamat')
                    ->label('Alamat')
                    ->required()
                    ->maxLength(255),
                TextInput::make('email')
                    ->label('Email')
                    ->required()
                    ->maxLength(255),
                TextInput::make('no_hp')
                    ->label('No. Handphone')
                    ->required()
                    ->maxLength(255),
                TextInput::make('facebook')
                    ->label('Facebook')
                    ->required()
                    ->maxLength(255),
                TextInput::make('instagram')
                    ->label('Instagram')
                    ->required()
                    ->maxLength(255),
                TextInput::make('twitter')
                    ->label('Twitter')
                    ->required()
                    ->maxLength(255),
                TextInput::make('meta_title')
                    ->label('Meta Title')
                    ->required()
                    ->maxLength(255),
                TextInput::make('meta_keyword')
                    ->label('Meta Keyword')
                    ->required()
                    ->maxLength(255),
                TextInput::make('meta_description')
                    ->label('Meta Description')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListPengaturanWebsites::route('/'),
            'create' => Pages\CreatePengaturanWebsite::route('/create'),
            'edit' => Pages\EditPengaturanWebsite::route('/{record}/edit'),
        ];
    }
}
