<?php namespace NielsVanDenDries\Planning\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateNielsvandendriesPlanningKlussen extends Migration
{
    public function up()
    {
        Schema::create('nielsvandendries_planning_klussen', function($table)
        {
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->string('naam');
            $table->string('locatie');
            $table->dateTime('aanvang');
            $table->dateTime('einde');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('nielsvandendries_planning_klussen');
    }
}
