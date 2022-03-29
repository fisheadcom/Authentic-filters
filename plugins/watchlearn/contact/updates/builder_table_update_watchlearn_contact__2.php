<?php namespace Watchlearn\Contact\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateWatchlearnContact2 extends Migration
{
    public function up()
    {
        Schema::table('watchlearn_contact_', function($table)
        {
            $table->increments('id')->change();
        });
    }
    
    public function down()
    {
        Schema::table('watchlearn_contact_', function($table)
        {
            $table->integer('id')->change();
        });
    }
}
