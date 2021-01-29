<?php


namespace RainLab\Blog\Components;


use Cms\Classes\ComponentBase;
use Illuminate\Support\Facades\DB;
use October\Rain\Database\Collection;
use RainLab\Blog\Models\Category as Event;
use RainLab\Blog\Models\Spiker;

class Spikers extends ComponentBase
{
    /**
     * A collection of sponsors to display
     *
     * @var Collection
     */
    public $spikers;

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
            'name'        => 'Spikers',
            'description' => 'All spikers list'
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

    protected function loadEvent()
    {
        if (!$slug = $this->property('event')) {
            return Event::where('type',1)->latest()->first(['id','name']);
        }

        $event = new Event;

        $event = $event->isClassExtendedWith('RainLab.Translate.Behaviors.TranslatableModel')
            ? $event->transWhere('slug', $slug)
            : $event->where('slug', $slug);

        $event = $event->first();

        return $event ?: null;
    }

    public function onRun()
    {
        $this->noRecordsMessage = $this->page['noSpikersMessage'] = $this->property('noSpikersMessage');

        $this->event = $this->page['event'] = $this->loadEvent();

        $speakerId = $this->property('speakerId');

        $query = Spiker::query();

        if($speakerId){
            $query->where('id',$speakerId);
        }
        else if($this->event){;
            $query->where('category_id','=',$this->event->id);
        }

        $query->orderBy('order');

        $this->spikers = $this->page['spikers'] = $query->get();

    }
}
