<?php namespace RainLab\Blog\Models;

use Model;

/**
 * Model
 */
class Spiker extends Model
{
    use \October\Rain\Database\Traits\Validation;

    public $implement = ['@RainLab.Translate.Behaviors.TranslatableModel'];
    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;
    /*
     * Relations
     */
    public $belongsTo = [
        'category' => ['RainLab\Blog\Models\Category','order' => 'name']
    ];

    public $translatable = [
        'name',
        'content',
        'title',
        'topic',
        'session'
    ];
    /**
     * @var string The database table used by the model.
     */
    public $table = 'rainlab_blog_spikers';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public function getCategoryIdOptions(){
        return Category::all()->pluck('name','id');
    }


}
