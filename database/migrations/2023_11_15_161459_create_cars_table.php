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
        $tableName = 'cars';

        Schema::create($tableName, function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('price');
            $table->timestamps();
        });

        DB::table($tableName)->insert([
            [
                'name' => 'Mercedes',
                'description' => 'Fusce lectus magna...Fusce lectus magna...',
                'price' => '59999'
            ],
            [
                'name' => 'BMW',
                'description' => 'Fusce lectus magna...Fusce lectus magna...Fusce lectus magna...Fusce lectus magna...',
                'price' => '33000'
            ],
            [
                'name' => 'Bentley',
                'description' => 'Fusce lectus magna...Fusce lectus magna...Fusce lectus magna...',
                'price' => '29999'
            ],
            [
                'name' => 'Rolls-Royce',
                'description' => 'Fusce lectus magna...Fusce lectus magna...',
                'price' => '10000'
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
