<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ImageResource\Pages;
use App\Filament\Resources\ImageResource\RelationManagers;
use App\Models\Image;
use Filament\Forms;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Avatar;
use Filament\Tables\Columns;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ImageResource extends Resource
{
    protected static ?string $model = Image::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    protected static ?string $navigationLabel = 'Image';
    protected static ?string $modelLabel = 'Image';
    protected static ?string $navigationGroup = 'File management';
    protected static ?string $slug = 'images';
    protected static ?int $navigationSort = 1;

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Image upload')
                    ->schema([
                        FileUpload::make('name')
                            ->image()
                            ->multiple()
                            ->imageEditor()
                            ->image()
                            ->reorderable()
                            ->appendFiles()
                            ->openable()
                            ->downloadable()
                            ->imageEditorEmptyFillColor('#000000')
                            ->imageEditorAspectRatios([
                                null,
                                '16:9',
                                '4:3',
                                '1:1',
                            ])
                            ->visibility('public')
                            ->acceptedFileTypes(['image/*'])
                            ->directory('/images'),
                    ])->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('name')
                    ->circular()
                    ->stacked()
                    ->limit(3)
                    ->limitedRemainingText()
                    ->extraImgAttributes(['loading' => 'lazy']),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListImages::route('/'),
            'create' => Pages\CreateImage::route('/create'),
            'view' => Pages\ViewImage::route('/{record}'),
            'edit' => Pages\EditImage::route('/{record}/edit'),
        ];
    }
}
