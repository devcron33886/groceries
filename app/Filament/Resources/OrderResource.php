<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('user_id'),
                Forms\Components\TextInput::make('shipping_address_id'),
                Forms\Components\TextInput::make('shipping_type_id'),
                Forms\Components\TextInput::make('payment_method_id'),
                Forms\Components\TextInput::make('uuid')
                    ->required()
                    ->maxLength(36),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('subtotal')
                    ->required(),
                Forms\Components\DateTimePicker::make('placed_at')
                    ->required(),
                Forms\Components\DateTimePicker::make('packaged_at'),
                Forms\Components\DateTimePicker::make('shipped_at'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user_id'),
                Tables\Columns\TextColumn::make('shipping_address_id'),
                Tables\Columns\TextColumn::make('shipping_type_id'),
                Tables\Columns\TextColumn::make('payment_method_id'),
                Tables\Columns\TextColumn::make('uuid'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('subtotal'),
                Tables\Columns\TextColumn::make('placed_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('packaged_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('shipped_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
