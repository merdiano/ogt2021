<?php


namespace RainLab\Blog\Components;


use Cms\Classes\ComponentBase;
use October\Rain\Database\Collection;
use RainLab\Blog\Models\Category as BlogCategory;
use RainLab\Blog\Models\Sponsor;

class Sponsors extends ComponentBase
{
    /**
     * A collection of sponsors to display
     *
     * @var Collection
     */
    public $sponsors;

    /**
     * Message to display when there are no messages
     *
     * @var string
     */
    public $noRecordsMessage;

    public function componentDetails()
    {
        return [
            'name'        => 'Sponsors',
            'description' => 'All Sponsors List'
        ];
    }

    public function defineProperties(){
        return [
            'categoryFilter' => [
                'title'       => 'rainlab.blog::lang.settings.posts_filter',
                'description' => 'rainlab.blog::lang.settings.posts_filter_description',
                'type'        => 'string',
                'default'     => '',
            ],
            'typeFilter' => [
                'title'       => 'Type',
                'description' => 'Select Sponsor type',
                'type'        => 'dropdown',
                'default'     => '',
            ],
            'noSponsorsMessage' => [
                'title'             => 'No sponsors Message',
                'description'       => 'Display text when no sponsors exist',
                'type'              => 'string',
                'default'           => 'No sponsors found',
                'showExternalParam' => false,
            ],
        ];
    }

    public function getTypeFilterOptions(){
        return [
            1 => 'Official partner',
            2 => 'Media partner',
            3 => 'Premier partner',
            4 => 'Event sponsor',
            5 => 'Platinum sponsor',
            6 => 'Golden sponsor',
            7 => 'Silver sponsor',
            8 => 'Bronze sponsor',
        ] ;
    }

    protected function loadCategory()
    {
        if (!$slug = $this->property('categoryFilter')) {
            return null;
        }

        $category = new BlogCategory;

        $category = $category->isClassExtendedWith('RainLab.Translate.Behaviors.TranslatableModel')
            ? $category->transWhere('slug', $slug)
            : $category->where('slug', $slug);

        $category = $category->first();

        return $category ?: null;
    }

    public function onRun()
    {
        $this->noRecordsMessage = $this->page['noSponsorsMessage'] = $this->property('noSponsorsMessage');

        $this->category = $this->page['category'] = $this->loadCategory();

        $query = new Sponsor;

        if($this->category){
            $query->where('category_id',$this->category->id);
        }

//        if($this->property('typeFilter')){
//            $query->where('type',$this->property('typeFilter'));
//        }

        $query->orderBy('type','ASC');
        $query->orderBy('order','ASC');

        $this->sponsors = $this->page['sponsors'] = $query->get();

    }
}
