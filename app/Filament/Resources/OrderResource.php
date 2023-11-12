<?php

namespace App\Filament\Resources;

use App\Enums\OrderStatusEnum;
use App\Filament\Resources\OrderResource\Pages;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Actions\Action;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationGroup = 'Shop';

    protected static ?string $navigationIcon = 'heroicon-m-archive-box';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Wizard::make([
                Wizard\Step::make('Order')->schema([
                    Forms\Components\Select::make('product_id')->relationship('product', 'name')->required(),
                    Forms\Components\Textarea::make('comment')->maxLength(65535)->columnSpanFull(),
                ]),
                Wizard\Step::make('Customer')->schema([
                    Forms\Components\TextInput::make('customer_name')->required()->maxLength(255),
                    Forms\Components\TextInput::make('customer_email')->email()->required()->maxLength(255),
                    Forms\Components\TextInput::make('customer_phone')->tel()->maxLength(255),
                ]),
                Wizard\Step::make('Status')->schema([
                    Forms\Components\Select::make('status')->required()->options(OrderStatusEnum::class),
                ]),
            ])->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->numeric()->searchable()->sortable(),
                Tables\Columns\TextColumn::make('status')->sortable()->badge(),
                Tables\Columns\TextColumn::make('product.name')->numeric()->searchable()->sortable(),
                Tables\Columns\TextColumn::make('customer_email')->icon('heroicon-m-envelope')->copyable(),
                Tables\Columns\TextColumn::make('customer_phone')->icon('heroicon-m-phone')->copyable(),
                Tables\Columns\TextColumn::make('created_at')->dateTime('M d, Y H:i')->sortable(),

                Tables\Columns\TextColumn::make('updated_at')->dateTime()->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])

            ->defaultSort('id', 'desc')

            ->filters([
                Filter::make('created_at')
                    ->form([
                        DatePicker::make('created_from'),
                        DatePicker::make('created_until')->default(now()),
                    ]),

                SelectFilter::make('status')
                    ->options(OrderStatusEnum::class)
                    ->multiple()
                    ->searchable(),
            ])

            ->actions([
                Tables\Actions\EditAction::make(),
            ])

            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ])

            ->paginated([10, 25, 50, 100])
            ->defaultPaginationPageOption(25);
    }

    public static function getNavigationBadge(): ?string
    {
        return Order::where('status', OrderStatusEnum::NEW)->count();
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'success';
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
