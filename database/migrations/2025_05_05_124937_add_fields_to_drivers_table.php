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
        Schema::table('drivers', function (Blueprint $table) {
            $table->string('name')->after('id');
            $table->string('nationality')->after('name');
            $table->foreignId('team_id')->nullable()->constrained()->cascadeOnDelete()->after('nationality');
            $table->date('date_of_birth')->after('team_id');
            $table->string('image_path')->nullable()->after('date_of_birth');
        });
    }
    
    public function down()
    {
        Schema::table('drivers', function (Blueprint $table) {
            $table->dropForeign(['team_id']);
            $table->dropColumn(['name','nationality','team_id','date_of_birth','image_path']);
        });
    }
};
