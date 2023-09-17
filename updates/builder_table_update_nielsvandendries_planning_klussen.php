<?php namespace NielsVanDenDries\Planning\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateNielsvandendriesPlanningKlussen extends Migration
{
    public function up()
    {
        Schema::table('nielsvandendries_planning_klussen', function($table)
        {
            $table->string('aanwezigen')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('nielsvandendries_planning_klussen', function($table)
        {
            $table->dropColumn('aanwezigen');
        });
    }
}
