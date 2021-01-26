<?php


namespace RainLab\Blog\Components;


use Cms\Classes\ComponentBase;
use October\Rain\Database\Collection;
use RainLab\Blog\Models\Category as Event;
use RainLab\Blog\Models\Sponsor;

class Sponsors extends ComponentBase
{
    /**
     * A collection of sponsors to display
     *
     * @var Collection
     */
    public $sponsors;

    public $event;
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
            'event' => [
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

    protected function loadEvent()
    {
        if (!$slug = $this->property('event')) {
            return Event::where('type',1)->latest()->first(['id','name']);
        }

        $event = new Event;

        $event = $event->isClassExtendedWith('RainLab.Translate.Behaviors.TranslatableModel')
            ? $event->transWhere('slug', $slug)
            : $event->where('slug', $slug);

        $event = $event->first(['id','name']);

        return $event ?: null;
    }

    public function onRun()
    {
        $this->noRecordsMessage = $this->page['noSponsorsMessage'] = $this->property('noSponsorsMessage');

        $this->event = $this->page['event'] = $this->loadEvent();

        $query = Sponsor::query();
        if($this->event){
            $query->where('category_id',$this->event->id);
        }

        $query->orderBy('type','ASC');
        $query->orderBy('order','ASC');

//        if($this->property('typeFilter')){
//            $query->where('type',$this->property('typeFilter'));
//        }

        $this->sponsors = $this->page['sponsors'] = $query->get();

    }
}
