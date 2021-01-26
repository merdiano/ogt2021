<?php namespace RainLab\Blog\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateRainlabBlogSpikers3 extends Migration
{
    public function up()
    {
        Schema::table('rainlab_blog_spikers', function($table)
        {
            $table->string('flag', 255)->nullable();
            $table->string('organization', 255)->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('rainlab_blog_spikers', function($table)
        {
            $table->dropColumn('flag');
            $table->dropColumn('organization');
        });
    }
}
