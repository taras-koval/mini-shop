<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use Closure;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Pages\ListRecords\Tab;
use Filament\Resources\Resource;
use Filament\Support\Enums\FontWeight;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Filters\Filter;
use Illuminate\Support\Str;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationGroup = 'Shop';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Section::make()->schema([
                Grid::make()->schema([
                    TextInput::make('name')
                        ->required()
                        ->maxLength(255)
                        ->live()
                        ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),

                    TextInput::make('slug')
                        ->required()
                        ->maxLength(255)
                        ->unique(Product::class, 'slug', fn ($record) => $record),
                ]),

                RichEditor::make('description')->maxLength(65535),
                TextInput::make('price')->required()->numeric()->prefix('$'),

            ])->columnSpan(8),

            Section::make()->schema([
                FileUpload::make('image')->image(),
                Toggle::make('is_active')->required(),
            ])->columnSpan(4),

        ])->columns(12);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable()->sortable()->weight(FontWeight::Bold),
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\IconColumn::make('is_active')->boolean()->sortable(),
                Tables\Columns\TextColumn::make('price')->money()->searchable()->sortable(),

                Tables\Columns\TextColumn::make('created_at')->dateTime('d-m-Y H:i')->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')->dateTime('d-m-Y H:i')->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('deleted_at')->dateTime('d-m-Y H:i')->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])

            ->defaultSort('created_at', 'desc')

            ->filters([
                Filter::make('Is active')
                    ->toggle()
                    ->query(fn (Builder $query): Builder => $query->where('is_active', true)),

                Filter::make('Is not active')
                    ->toggle()
                    ->query(fn (Builder $query): Builder => $query->where('is_active', false)),

                Filter::make('created_at')
                    ->form([
                        DatePicker::make('created_from'),
                        DatePicker::make('created_until')->default(now()),
                    ]),

                TrashedFilter::make(),
            ])

            ->actions([
                Action::make('Activate')
                    ->action(function (Product $record) {
                        $record->is_active = true;
                        $record->save();
                    })
                    ->hidden(fn (Product $record): bool => $record->is_active),
                Action::make('Deactivate')
                    ->action(function (Product $record) {
                        $record->is_active = false;
                        $record->save();
                    })
                    ->visible(fn (Product $record): bool => $record->is_active),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\RestoreAction::make(),
            ])

            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ])

            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ])

            ->paginated([10, 25, 50, 100])
            ->defaultPaginationPageOption(25);
    }

    public function getTabs(): array
    {
        return [
            'all' => Tab::make(),
            'active' => Tab::make()->modifyQueryUsing(fn (Builder $query) => $query->where('is_active', true)),
            'inactive' => Tab::make()->modifyQueryUsing(fn (Builder $query) => $query->where('is_active', false)),
        ];
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
