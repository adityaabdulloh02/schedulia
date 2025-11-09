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
        Schema::table('pengambilan_mk', function (Blueprint $table) {
            $table->string('tahun_akademik')->nullable()->after('semester');
            $table->integer('semester')->change(); // Change semester to integer
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pengambilan_mk', function (Blueprint $table) {
            $table->dropColumn('tahun_akademik');
            $table->string('semester')->change(); // Revert semester to string
        });
    }
};
