<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JadwalPelajaranResource\Pages;
use App\Models\JadwalPelajaran;
use App\Models\Kelas;
use App\Models\MataPelajaran;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JadwalPelajaranResource extends Resource
{
    protected static ?string $model = JadwalPelajaran::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
{
    return $form
        ->schema([
            Select::make('kelas_id')
                ->label('Kelas')
                ->relationship('kelas', 'nama')  // Pastikan relasi sesuai
                ->required(),

            Select::make('mata_pelajaran_id')
                ->label('Mata Pelajaran')
                ->relationship('mataPelajaran', 'nama')  // Pastikan relasi sesuai
                ->required(),

            TextInput::make('hari')->required(),
            TimePicker::make('jam_mulai')->required(),
            TimePicker::make('jam_selesai')->required(),
        ]);
}

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kelas.nama')->label('Kelas'),
                Tables\Columns\TextColumn::make('mataPelajaran.nama')->label('Mata Pelajaran'),
                Tables\Columns\TextColumn::make('hari')->label('Hari'),
                Tables\Columns\TextColumn::make('jam_mulai')->label('Jam Mulai'),
                Tables\Columns\TextColumn::make('jam_selesai')->label('Jam Selesai'),
                Tables\Columns\TextColumn::make('created_at')->label('Dibuat Pada')->dateTime(),
            ])
            ->filters([
                // Definisikan filter jika diperlukan
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
            // Definisikan relasi jika ada
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListJadwalPelajarans::route('/'),
            'create' => Pages\CreateJadwalPelajaran::route('/create'),
            'edit' => Pages\EditJadwalPelajaran::route('/{record}/edit'),
        ];
    }
}
