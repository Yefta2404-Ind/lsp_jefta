<?php

namespace App\Filament\Resources;

use App\Filament\Clusters\DataAkademik;
use App\Filament\Resources\GuruResource\Pages;
use App\Models\ActivityLog;
use App\Models\Guru;
use Closure;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class GuruResource extends Resource
{
    protected static ?string $model = Guru::class;
    protected static ?string $cluster = DataAkademik::class;
    protected static ?string $navigationIcon = 'heroicon-o-user';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('nama')->required(),
            TextInput::make('email')->email()->required(),
            TextInput::make('no_hp')->label('No HP')->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')->label('Nama'),
                TextColumn::make('email')->label('Email'),
                TextColumn::make('no_hp')->label('No HP'),
            ])
            ->filters([
                //
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
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGurus::route('/'),
            'create' => Pages\CreateGuru::route('/create'),
            'edit' => Pages\EditGuru::route('/{record}/edit'),
        ];
    }

    public static function afterCreate(): Closure
    {
        return function (Model $record) {
            $user = Auth::user();
            
            ActivityLog::create([
                'user' => $user?->name ?? 'System',
                'activity' => 'Menambahkan guru: ' . $record->nama,
            ]);
        };
    }
}
