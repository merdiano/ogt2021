<?php


namespace RainLab\Blog\Components;


use Cms\Classes\ComponentBase;
use October\Rain\Database\Collection;
use RainLab\Blog\Models\Category as BlogCategory;
use RainLab\Blog\Models\Spiker;

class Spikers extends ComponentBase
{
    /**
     * A collection of sponsors to display
     *
     * @var Collection
     */
    public $spikers;

    /**
     * Message to display when there are no messages
     *
     * @var string
     */
    public $noRecordsMessage;

    public function componentDetails()
    {
        return [
            'name'        => 'Spikers',
            'description' => 'All spikers list'
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
            'speakerId' => [
                'title'       => 'Speaker id',
                'description' => 'Enter speakers id if you want one speaker',
                'type'        => 'string',
                'default'     => '',
            ],
            'noSpikersMessage' => [
                'title'             => 'No spikers Message',
                'description'       => 'Display text when no spikers exist',
                'type'              => 'string',
                'default'           => 'No sponsors found',
                'showExternalParam' => false,
            ],
        ];
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
        $this->noRecordsMessage = $this->page['noSpikersMessage'] = $this->property('noSpikersMessage');

        $this->category = $this->page['category'] = $this->loadCategory();

        $speakerId = $this->property('speakerID');

        $query = new Spiker;

        if($this->category){
            $query->where('category_id',$this->category->id);
        }

        if($speakerId){
            $query->where('id',$speakerId);
        }
        $query->orderBy('order');

        $this->spikers = $this->page['spikers'] = $query->get();

    }
}
