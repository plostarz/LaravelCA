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
        Schema::table('teams', function (Blueprint $table) {
            $table->string('name')->after('id');
            $table->string('base')->nullable()->after('name');
            $table->string('principal')->nullable()->after('base');
            $table->year('founded_year')->nullable()->after('principal');
            $table->string('image_path')->nullable()->after('founded_year');
        });
    }
    
    public function down()
    {
        Schema::table('teams', function (Blueprint $table) {
            $table->dropColumn(['name','base','principal','founded_year','image_path']);
        });
    }
};
