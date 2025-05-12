<?php

namespace App\Filament\Resources;

use App\Filament\Clusters\DataAkademik;
use App\Filament\Resources\SiswaResource\Pages;
use App\Models\Siswa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SiswaResource extends Resource
{
    protected static ?string $model = Siswa::class;
    protected static ?string $cluster = DataAkademik::class;
    protected static ?string $navigationIcon = 'heroicon-o-user';
    


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama')->required(),
                TextInput::make('nis')->required(),
                TextInput::make('alamat')->required(),
                TextInput::make('telepon')
    ->required(), // atau ->nullable() jika tidak wajib
                Select::make('kelas_id')
                    ->label('Kelas')
                    ->relationship('kelas', 'nama') // Relasi dengan model 'Kelas'
                    ->searchable()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Anda bisa menambahkan kolom yang ingin ditampilkan di tabel, seperti:
                Tables\Columns\TextColumn::make('nama')->searchable(),
                Tables\Columns\TextColumn::make('nis'),
                Tables\Columns\TextColumn::make('alamat'),
                Tables\Columns\TextColumn::make('kelas.nama')->label('Kelas'),
            ])
            ->filters([
                // Menambahkan filter (jika diperlukan)
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
            'index' => Pages\ListSiswas::route('/'),
            'create' => Pages\CreateSiswa::route('/create'),
            'edit' => Pages\EditSiswa::route('/{record}/edit'),
        ];
    }
}
