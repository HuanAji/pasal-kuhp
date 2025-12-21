<?php

namespace App\Filament\Resources;

use App\Enums\StatusPasal;
use App\Filament\Resources\PasalResource\Pages;
use App\Models\Pasal;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PasalResource extends Resource
{
    protected static ?string $model = Pasal::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationLabel = 'Pasal';

    protected static ?string $navigationGroup = 'Pasal Management';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Pasal')
                    ->schema([
                        Forms\Components\TextInput::make('nomor_pasal')
                            ->label('Nomor Pasal')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Contoh: Pasal 1'),

                        Forms\Components\DatePicker::make('tanggal_berlaku')
                            ->label('Tanggal Berlaku')
                            ->required()
                            ->default(now()),

                        Forms\Components\Select::make('pasal_category_id')
                            ->label('Kategori Pasal')
                            ->relationship('category', 'title')
                            ->required()
                            ->searchable()
                            ->preload()
                            ->createOptionForm([
                                Forms\Components\TextInput::make('title')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('slug')
                                    ->required()
                                    ->maxLength(255),
                            ]),

                        Forms\Components\Select::make('status_pasal')
                            ->label('Status Pasal')
                            ->options([
                                'berlaku' => 'Berlaku',
                                'kadaluwarsa' => 'Kadaluwarsa',
                                'berubah' => 'Berubah',
                                'uji_coba' => 'Uji Coba',
                            ])
                            ->required()
                            ->native(false)
                            ->default('berlaku'),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Isi Pasal')
                    ->schema([
                        Forms\Components\RichEditor::make('isi_pasal')
                            ->label('Isi Pasal')
                            ->required()
                            ->columnSpanFull()
                            ->toolbarButtons([
                                'blockquote',
                                'bold',
                                'bulletList',
                                'h2',
                                'h3',
                                'italic',
                                'link',
                                'orderedList',
                                'redo',
                                'strike',
                                'underline',
                                'undo',
                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nomor_pasal')
                    ->label('Nomor Pasal')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('category.title')
                    ->label('Kategori')
                    ->searchable()
                    ->sortable()
                    ->badge(),

                Tables\Columns\TextColumn::make('status_pasal')
                    ->label('Status')
                    ->badge()
                    ->formatStateUsing(fn (StatusPasal $state): string => $state->getLabel())
                    ->color(fn (StatusPasal $state): string => $state->getColor()),

                Tables\Columns\TextColumn::make('tanggal_berlaku')
                    ->label('Tanggal Berlaku')
                    ->date('d M Y')
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('pasal_category_id')
                    ->label('Kategori')
                    ->relationship('category', 'title')
                    ->searchable()
                    ->preload(),

                Tables\Filters\SelectFilter::make('status_pasal')
                    ->label('Status')
                    ->options([
                        'berlaku' => 'Berlaku',
                        'kadaluwarsa' => 'Kadaluwarsa',
                        'berubah' => 'Berubah',
                        'uji_coba' => 'Uji Coba',
                    ]),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('nomor_pasal', 'asc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPasals::route('/'),
            'create' => Pages\CreatePasal::route('/create'),
            'edit' => Pages\EditPasal::route('/{record}/edit'),
            'view' => Pages\ViewPasal::route('/{record}'),
        ];
    }
}