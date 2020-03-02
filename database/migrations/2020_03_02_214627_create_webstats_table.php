<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use App\Http\Controllers\WebStatsController;
use Illuminate\Database\Migrations\Migration;

class CreateWebstatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('webstats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->time('hour');
            $table->string('category');
            $table->string('informations');
            $table->string('user');
            $table->timestamps();
        });

        (new WebStatsController)->addStat('Artisan', 'Migration refresh');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('webstats');
    }
}
