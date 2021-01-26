<?php namespace RainLab\Blog\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateRainlabBlogCategories4 extends Migration
{
    public function up()
    {
        Schema::table('rainlab_blog_categories', function($table)
        {
            $table->smallInteger('active')->nullable(false)->unsigned(false)->default(0)->change();
        });
    }
    
    public function down()
    {
        Schema::table('rainlab_blog_categories', function($table)
        {
            $table->boolean('active')->nullable(false)->unsigned(false)->default(0)->change();
        });
    }
}
