<?php

namespace App\Filament\Clusters;

use Filament\Clusters\Cluster;

class DataAkademik extends Cluster
{
    protected static ?string $navigationIcon = 'heroicon-s-academic-cap';
    protected static ?string $clusterBreadcrumb = 'Data Akademik'; // Ini yang muncul di breadcrumb
    protected static ?string $navigationLabel = 'Data Akademik'; // Ini yang muncul di sidebar
}
