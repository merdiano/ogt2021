<?php namespace RainLab\Blog\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateRainlabBlogSponsors extends Migration
{
    public function up()
    {
        Schema::table('rainlab_blog_sponsors', function($table)
        {
            $table->integer('category_id');
        });
    }
    
    public function down()
    {
        Schema::table('rainlab_blog_sponsors', function($table)
        {
            $table->dropColumn('category_id');
        });
    }
}
