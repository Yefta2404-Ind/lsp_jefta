<?php

namespace App\Filament\Widgets;

use App\Models\Kelas;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class SiswaPerKelasOverview extends BaseWidget
{
    protected function getStats(): array
    {
        // Ambil semua kelas 7A, 7B, 8A, 8B, 9A, 9B
        $kelasData = Kelas::with('siswas')->get();

        // Inisialisasi
        $jumlahSiswaPerTingkat = [
            '7' => 0,
            '8' => 0,
            '9' => 0,
        ];

        // Loop setiap kelas
        foreach ($kelasData as $kelas) {
            $nama = $kelas->nama;

            if (str_starts_with($nama, '7')) {
                $jumlahSiswaPerTingkat['7'] += $kelas->siswas->count();
            } elseif (str_starts_with($nama, '8')) {
                $jumlahSiswaPerTingkat['8'] += $kelas->siswas->count();
            } elseif (str_starts_with($nama, '9')) {
                $jumlahSiswaPerTingkat['9'] += $kelas->siswas->count();
            }
        }

        // Buat statistiknya
        $stats = [];
        foreach (['7', '8', '9'] as $tingkat) {
            $stats[] = Stat::make("Kelas $tingkat", $jumlahSiswaPerTingkat[$tingkat])
                ->description("Total siswa")
                ->color($this->getColorForTingkat($tingkat))
                ->icon('heroicon-o-user-group');
        }

        return $stats;
    }

    protected function getColorForTingkat(string $tingkat): string
    {
        return match ($tingkat) {
            '7' => 'success',
            '8' => 'warning',
            '9' => 'danger',
            default => 'primary',
        };
    }
}
