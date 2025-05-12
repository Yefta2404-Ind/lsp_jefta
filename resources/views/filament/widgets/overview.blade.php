<x-filament::widget>
    <x-filament::card>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <p class="text-sm text-gray-500">Total Siswa</p>
                <p class="text-xl font-bold">{{ $totalSiswa }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-500">Total Guru</p>
                <p class="text-xl font-bold">{{ $totalGuru }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-500">Total Kelas</p>
                <p class="text-xl font-bold">{{ $totalKelas }}</p>
            </div>
        </div>
    </x-filament::card>
</x-filament::widget>
