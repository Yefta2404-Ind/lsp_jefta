<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('gurus', function (Blueprint $table) {
            $table->string('no_hp')->after('email');
        });
    }
    
    public function down(): void
    {
        Schema::table('gurus', function (Blueprint $table) {
            $table->dropColumn('no_hp');
        });
    }
};
