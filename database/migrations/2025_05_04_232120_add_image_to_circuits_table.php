<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('circuits', function (Blueprint $table) {
            $table->string('name')->after('id');
            $table->string('location')->after('name');
            $table->string('country')->after('location');
            $table->decimal('length_km', 8, 3)->after('country');
            // image_path exists already
        });
    }
    
   

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('circuits', function (Blueprint $table) {
            $table->dropColumn(['name', 'location', 'country', 'length_km']);
        });
    }
};
