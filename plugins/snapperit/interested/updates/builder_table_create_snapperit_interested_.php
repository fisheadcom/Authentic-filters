<?php namespace Snapperit\Interested\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateSnapperitInterested extends Migration
{
    public function up()
    {
        Schema::create('snapperit_interested_', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->text('name');
            $table->text('email');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('snapperit_interested_');
    }
}
