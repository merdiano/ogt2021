<?php namespace RainLab\Blog\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateRainlabBlogCategories extends Migration
{
    public function up()
    {
        Schema::table('rainlab_blog_categories', function($table)
        {
            $table->text('address')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('rainlab_blog_categories', function($table)
        {
            $table->dropColumn('address');
        });
    }
}
