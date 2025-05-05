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
        Schema::table('simulations', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->after('id');
            $table->foreignId('race_id')->constrained()->cascadeOnDelete()->after('user_id');
            $table->json('parameters')->nullable()->after('race_id');
            $table->json('results')->nullable()->after('parameters');
        });
    }
    
    public function down()
    {
        Schema::table('simulations', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['race_id']);
            $table->dropColumn(['user_id','race_id','parameters','results']);
        });
    }
};
