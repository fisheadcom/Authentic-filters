<?php namespace Watchlearn\Contact\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateWatchlearnContact extends Migration
{
    public function up()
    {
        Schema::create('watchlearn_contact_', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('id');
            $table->text('firstname');
            $table->text('email');
            $table->text('reasons_for_contacting');
            $table->text('business_name')->nullable();
            $table->text('phone')->nullable();
            $table->text('address')->nullable();
            $table->text('content')->nullable();
            $table->primary(['id']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('watchlearn_contact_');
    }
}
