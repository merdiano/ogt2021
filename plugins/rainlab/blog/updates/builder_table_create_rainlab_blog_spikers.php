<?php namespace RainLab\Blog\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateRainlabBlogSpikers extends Migration
{
    public function up()
    {
        Schema::create('rainlab_blog_spikers', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('category_id');
            $table->string('name', 100)->nullable();
            $table->string('title', 100)->nullable();
            $table->text('content')->nullable();
            $table->string('topic', 255)->nullable();
            $table->string('session', 100)->nullable();
            $table->string('time', 100)->nullable();
            $table->date('date')->nullable();
            $table->integer('order')->default(0);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('rainlab_blog_spikers');
    }
}
