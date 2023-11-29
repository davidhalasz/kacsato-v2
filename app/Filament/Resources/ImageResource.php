<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ImageResource\Pages;
use App\Filament\Resources\ImageResource\RelationManagers;
use App\Models\Image;
use App\Models\Album;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Actions\Action;

class ImageResource extends Resource
{
    protected static ?string $model = Image::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    protected static ?string $navigationLabel = 'Képek';

    protected static ?string $pluralModelLabel  = 'Képek';

    protected static ?string $tableFiltersLabel = 'Szűrés';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('album_id')
                    ->label("Album neve")
                    ->required()
                    ->relationship('album', 'album_name'),
                FileUpload::make('filepath')
                    ->multiple()
                    ->visibility('public')
                    ->image()
                    ->label('Egy vagy több kép kiválasztása')
                    ->columnSpanFull()
                    ->storeFileNamesIn('original_filename')
                    ->placeholder('Húzd ide a képeket vagy klikkelj ide')
                    ->required()
                    ->directory('gallery'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('album.album_name')->label('Album neve')->sortable()->searchable(),
                ImageColumn::make('filepath')
                    ->height(100)
                    ->width(140)
                    ->label('Kép'),
            ])
            ->filters([
                SelectFilter::make('albumfilter')
                    ->options(
                        Album::query()
                            ->distinct()
                            ->pluck('album_name', 'id')
                            ->toArray()
                    )
                    ->query(fn (Builder $query, array $data): Builder => (isset($data['value'])) ? $query->where('album_id', $data['value']) : $query)
                    ->label('Szűrés albumnév szerint')
                    ->native(false)
            ])
            ->filtersTriggerAction(
                fn (Action $action) => $action
                    ->button()
                    ->modalHeading('title')
                    ->label('Szűrés'),
            )
            ->actions([
                Tables\Actions\EditAction::make()->label('szerkeszt'),
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
            'index' => Pages\ListImages::route('/'),
            'create' => Pages\CreateImage::route('/create'),
            'edit' => Pages\EditImage::route('/{record}/edit'),
        ];
    }
}
