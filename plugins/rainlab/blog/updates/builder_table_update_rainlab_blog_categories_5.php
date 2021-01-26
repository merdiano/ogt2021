<?php namespace RainLab\Blog\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateRainlabBlogCategories5 extends Migration
{
    public function up()
    {
        Schema::table('rainlab_blog_categories', function($table)
        {
            $table->renameColumn('active', 'status');
        });
    }
    
    public function down()
    {
        Schema::table('rainlab_blog_categories', function($table)
        {
            $table->renameColumn('status', 'active');
        });
    }
}
