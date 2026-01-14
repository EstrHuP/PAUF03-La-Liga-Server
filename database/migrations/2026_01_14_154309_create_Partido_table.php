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
        Schema::create('Partido', function (Blueprint $table) {
            $table->id();

            $table->foreignId('liga_id')
                    ->constrained('Liga')
                    ->onDelete('cascade');
    
            $table->foreignId('club_local_id')
                    ->constrained('Club')
                    ->onDelete('cascade');

            $table->foreignId('club_visitante_id')
                    ->constrained('Club')
                    ->onDelete('cascade');

            $table->date('fecha');
            $table->string('resultado');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Partido');
    }
};
