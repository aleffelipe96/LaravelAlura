<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldAssistidoToEpisodiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('episodios', function (Blueprint $table) {
            $table->boolean('assistido')->after('temporada_id')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('episodios', function (Blueprint $table) {
            $table->dropColumn('assistido');
        });
    }
}
