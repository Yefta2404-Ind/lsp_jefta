<?php

namespace App\Filament\Widgets;

use App\Models\ActivityLog;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Filament\Tables\Columns\TextColumn;

class RecentActivity extends BaseWidget
{
    protected static ?int $sort = 2;
    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                ActivityLog::query()->latest()->limit(10)
            )
            ->columns([
                TextColumn::make('user')
                    ->label('User')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('activity')
                    ->label('Aktivitas')
                    ->wrap()
                    ->limit(50),

                TextColumn::make('created_at')
                    ->label('Waktu')
                    ->dateTime('d M Y, H:i')
                    ->sortable(),
            ]);
    }
}
