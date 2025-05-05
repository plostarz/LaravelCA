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
    Schema::table('races', function (Blueprint $table) {
        $table->string('name')->after('id');
        $table->date('date')->after('name');
        $table->foreignId('circuit_id')->constrained()->cascadeOnDelete()->after('date');
        $table->integer('season')->after('circuit_id');
        $table->integer('round')->after('season');
    });
}

public function down()
{
    Schema::table('races', function (Blueprint $table) {
        $table->dropForeign(['circuit_id']);
        $table->dropColumn(['name','date','circuit_id','season','round']);
    });
}
};
