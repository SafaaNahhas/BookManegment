<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Book;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
// use Tables\Columns\TextColumn;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\BookResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\BookResource\RelationManagers;
// use App\Filament\Resources\BookResource\RelationManagers\MaincategoriesRelationManager;
// use Filament\Forms\Components\Select;


class BookResource extends Resource
{
    protected static ?string $model = Book::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    Forms\Components\TextInput::make('title')
                        ->required()
                        ->maxLength(255),
                        // Forms\Components\Textarea::make('summary')->rows(5)->cols(20)
                        // ->required(),
                    Forms\Components\Select::make('category_id')
                    ->Label('Category')
                    ->relationship('category', 'name')->preload()->searchable() ->required(),
                    ])

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('title')->searchable(),
                Tables\Columns\TextColumn::make('summary')
                    ->searchable(),
                Tables\Columns\TextColumn::make('category.name')->toggleable(),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),

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
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBooks::route('/'),
            'create' => Pages\CreateBook::route('/create'),
            'edit' => Pages\EditBook::route('/{record}/edit'),
        ];
    }
}
