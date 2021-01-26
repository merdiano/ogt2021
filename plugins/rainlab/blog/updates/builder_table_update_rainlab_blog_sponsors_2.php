<?php namespace RainLab\Blog\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateRainlabBlogSponsors2 extends Migration
{
    public function up()
    {
        Schema::table('rainlab_blog_sponsors', function($table)
        {
            $table->string('logo', 255)->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('rainlab_blog_sponsors', function($table)
        {
            $table->dropColumn('logo');
        });
    }
}
