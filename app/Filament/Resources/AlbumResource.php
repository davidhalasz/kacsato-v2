<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AlbumResource\Pages;
use App\Filament\Resources\AlbumResource\RelationManagers;
use App\Models\Album;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\FileUpload;
use Closure;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\ImageColumn;

use Filament\Tables\Filters\SelectFilter;

class AlbumResource extends Resource
{
    protected static ?string $model = Album::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    protected static ?string $navigationLabel = 'Albumok';

    protected static ?string $pluralModelLabel  = 'Albumok';

    protected static ?string $tableFiltersLabel = 'Szűrés';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('album_name')
                    ->required()
                    ->reactive()
                    ->label('Album megnevezése')
                    ->maxLength(255),
                FileUpload::make('filepath')
                    ->multiple()
                    ->visibility('public')
                    ->image()
                    ->label('Egy vagy több kép kiválasztása')
                    ->columnSpanFull()
                    ->storeFileNamesIn('gallery_filename')
                    ->placeholder('Húzd ide a képeket vagy klikkelj ide')
                    ->required()
                    ->directory(fn ($get) => 'albums/' . $get('album_name')),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('album_name')
                    ->searchable(),
                ImageColumn::make('filepath')
                    ->height('50px')
                    ->extraImgAttributes([
                        'class' => 'object-cover h-fit rounded-t-xl w-full',
                    ]),
            ])
            ->filters([
                SelectFilter::make('albumfilter')
                    ->options(
                        Album::query()
                            ->distinct()
                            ->pluck('album_name', 'album_name')
                            ->toArray()
                    )
                    ->query(fn (Builder $query, array $data): Builder => (isset($data['value'])) ? $query->where('album_name', $data['value']) : $query)
                    ->label('Szűrés albumnév szerint')
                    ->native(false)
            ])
            ->filtersTriggerAction(
                fn (Action $action) => $action
                    ->button()
                    ->label('Szűrés albumnév szerint'),
            )
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
            'index' => Pages\ListAlbums::route('/'),
            'create' => Pages\CreateAlbum::route('/create'),
            'edit' => Pages\EditAlbum::route('/{record}/edit'),
        ];
    }
}
