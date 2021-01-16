<?php namespace RainLab\Blog\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateRainlabBlogSpikers2 extends Migration
{
    public function up()
    {
        Schema::table('rainlab_blog_spikers', function($table)
        {
            $table->string('bg_white', 255)->nullable();
            $table->string('bg_blue', 255)->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('rainlab_blog_spikers', function($table)
        {
            $table->dropColumn('bg_white');
            $table->dropColumn('bg_blue');
        });
    }
}
