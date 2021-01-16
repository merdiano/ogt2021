<?php namespace RainLab\Blog\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateRainlabBlogSpikers extends Migration
{
    public function up()
    {
        Schema::table('rainlab_blog_spikers', function($table)
        {
            $table->dateTime('date')->nullable()->unsigned(false)->default(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('rainlab_blog_spikers', function($table)
        {
            $table->date('date')->nullable()->unsigned(false)->default(null)->change();
        });
    }
}
