<?php namespace RainLab\Blog\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateRainlabBlogCategories2 extends Migration
{
    public function up()
    {
        Schema::table('rainlab_blog_categories', function($table)
        {
            $table->text('about')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('rainlab_blog_categories', function($table)
        {
            $table->dropColumn('about');
        });
    }
}
