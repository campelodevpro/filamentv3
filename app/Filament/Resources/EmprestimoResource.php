<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmprestimoResource\Pages;
use App\Filament\Resources\EmprestimoResource\RelationManagers;
use App\Models\Emprestimo;
use App\Models\LivroModel;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EmprestimoResource extends Resource
{
    protected static ?string $model = Emprestimo::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('NomeColaborador')
                    ->maxLength(255),
                Forms\Components\TextInput::make('Unidade')
                    ->required()
                    ->maxLength(10),

                Forms\Components\Select::make('livro_models_id')
                    ->label('Livro')
                    ->required()
                    ->options(LivroModel::all()->pluck('Titulo', 'id')) // Obtém o nome do livro e o ID
                    ->searchable(),

                Forms\Components\DatePicker::make('DataEmprestimo'),
                Forms\Components\DatePicker::make('DataDevolucao'),
                Forms\Components\Textarea::make('Observacao')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('NomeColaborador')
                    ->searchable(),
                Tables\Columns\TextColumn::make('Unidade')
                    ->searchable(),
                Tables\Columns\TextColumn::make('livro_models_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('DataEmprestimo')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('DataDevolucao')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
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
            'index' => Pages\ListEmprestimos::route('/'),
            'create' => Pages\CreateEmprestimo::route('/create'),
            'edit' => Pages\EditEmprestimo::route('/{record}/edit'),
        ];
    }
}
