<?php namespace RainLab\Blog\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateRainlabBlogCategories3 extends Migration
{
    public function up()
    {
        Schema::table('rainlab_blog_categories', function($table)
        {
            $table->boolean('active')->default(0);
        });
    }
    
    public function down()
    {
        Schema::table('rainlab_blog_categories', function($table)
        {
            $table->dropColumn('active');
        });
    }
}
