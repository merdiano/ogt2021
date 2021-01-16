<?php namespace RainLab\Blog\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateRainlabBlogSponsors extends Migration
{
    public function up()
    {
        Schema::create('rainlab_blog_sponsors', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('organization')->nullable();
            $table->string('site')->nullable();
            $table->integer('order')->default(0);
            $table->smallInteger('type')->default(1);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('rainlab_blog_sponsors');
    }
}
