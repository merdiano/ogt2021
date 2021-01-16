<?php namespace RainLab\Blog\Models;

use Model;

/**
 * Model
 */
class Sponsor extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'rainlab_blog_sponsors';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    /*
     * Relations
     */
    public $belongsTo = [
        'category' => ['RainLab\Blog\Models\Category','order' => 'name']
    ];
    public $attachOne = [
        'logo' => 'System\Models\File'
    ];

    public function getCategoryIdOptions(){
        return Category::all()->pluck('name','id');
    }
}
