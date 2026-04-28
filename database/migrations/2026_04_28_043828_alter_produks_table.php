<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('produks', function (Blueprint $table) {
            $table->text('description')->nullable()->after('name');
            $table->enum('status', ['tersedia', 'habis'])->default('tersedia')->after('description');
            $table->bigInteger('price')->change();
        });
    }

    public function down(): void
    {
        Schema::table('produks', function (Blueprint $table) {
            $table->dropColumn('description');
            $table->dropColumn('status');
            $table->integer('price')->change(); 
        });
    }
};