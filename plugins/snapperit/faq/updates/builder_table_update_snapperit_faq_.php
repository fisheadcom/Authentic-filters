<?php namespace Snapperit\Faq\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateSnapperitFaq extends Migration
{
    public function up()
    {
        Schema::table('snapperit_faq_', function($table)
        {
            $table->integer('sort_order')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('snapperit_faq_', function($table)
        {
            $table->integer('sort_order')->nullable(false)->change();
        });
    }
}
