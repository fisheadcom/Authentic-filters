<?php namespace Snapperit\Faq\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateSnapperitFaq extends Migration
{
    public function up()
    {
        Schema::create('snapperit_faq_', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('sort_order')->unsigned();
            $table->string('question');
            $table->text('answer');
        });
    }

    public function down()
    {
        Schema::dropIfExists('snapperit_faq_');
    }
}
