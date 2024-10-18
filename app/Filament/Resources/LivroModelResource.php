<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LivroModelResource\Pages;
use App\Filament\Resources\LivroModelResource\RelationManagers;
use App\Models\LivroModel;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LivroModelResource extends Resource
{
    protected static ?string $model = LivroModel::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('Titulo')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('Autor')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('Editora')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Toggle::make('Disponivel')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('Titulo')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('Autor')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('Editora')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\ToggleColumn::make('Disponivel')
                    ->sortable(),
                    // ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                    Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
             
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
            'index' => Pages\ListLivroModels::route('/'),
            'create' => Pages\CreateLivroModel::route('/create'),
            'edit' => Pages\EditLivroModel::route('/{record}/edit'),
        ];
    }
}
