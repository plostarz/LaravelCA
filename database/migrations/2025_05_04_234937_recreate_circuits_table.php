<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RecreateCircuitsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // If the table exists already, drop it:
        Schema::dropIfExists('circuits');

        // Create the circuits table from scratch:
        Schema::create('circuits', function (Blueprint $table) {
            $table->id();                                       // big integer unsigned AUTO INCREMENT primary key
            $table->string('name');                             // circuit name
            $table->string('location');                         // city/venue
            $table->string('country');                          // country
            $table->decimal('length_km', 8, 3);                 // length in kilometres, e.g. 5.793
            $table->string('image_path')->nullable();           // path to an image, optional
            $table->timestamps();                               // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('circuits');
    }
}