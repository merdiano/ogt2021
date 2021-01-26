<?php namespace RainLab\Blog\Components;

use Event;
use BackendAuth;
use Cms\Classes\Page;
use Cms\Classes\ComponentBase;
use RainLab\Blog\Models\Category as OGT_Event;

class OgtEvent extends ComponentBase
{
    /**
     * @var RainLab\Blog\Models\Post The post model used for display.
     */
    public $event;

    /**
     * @var string Reference to the page name for linking to categories.
     */
    public $eventPage;

    public function componentDetails()
    {
        return [
            'name'        => 'Event',
            'description' => 'Ogt event component'
        ];
    }

    public function defineProperties()
    {
        return [
            'slug' => [
                'title'       => 'Event slug',
                'description' => 'Event slug filter',
                'default'     => '{{ :slug }}',
                'type'        => 'string',
            ],
//            'eventPage' => [
//                'title'       => 'rainlab.blog::lang.settings.post_category',
//                'description' => 'rainlab.blog::lang.settings.post_category_description',
//                'type'        => 'dropdown',
//                'default'     => '',
//            ],
            'type' => [
                'title'       => 'Type',
                'description' => 'Event type: Active, Past, Next',
                'type'        => 'dropdown',
                'default'     => 1,
            ]

        ];
    }

    public function getEventPageOptions()
    {
        return Page::sortBy('baseFileName')->lists('baseFileName', 'baseFileName');
    }

    public function getTypeOptions(): array
    {
        return [
            'Past event',
            'Active event',
            'Next event'
        ];
    }
    public function init()
    {
        $this->eventPage = $this->page['eventPage'] = $this->property('eventPage');
        $this->event = $this->page['event'] = $this->loadEvent();

        Event::listen('translate.localePicker.translateParams', function ($page, $params, $oldLocale, $newLocale) {
            $newParams = $params;

            if (isset($params['slug'])) {
                $records = OGT_Event::transWhere('slug', $params['slug'], $oldLocale)->first();
                if ($records) {
                    $records->translateContext($newLocale);
                    $newParams['slug'] = $records['slug'];
                }
            }

            return $newParams;
        });
    }

    public function onRun()
    {

//        dd($this->event);
        if (!$this->event) {
            $this->setStatusCode(404);
            return $this->controller->run('404');
        }
    }

    public function onRender()
    {
        if (empty($this->event)) {
            $this->event = $this->page['event'] = $this->loadEvent();
        }
    }

    protected function loadEvent()
    {
        if (!$slug = $this->property('slug')) {
            $status = $this->property('type')?:1;

            return OGT_Event::where('type', $status)->latest()->first();
        }

        $event = new OGT_Event;
        $query = $event->query()->with(['spikers','sponsors']);

        if ($event->isClassExtendedWith('RainLab.Translate.Behaviors.TranslatableModel')) {
            $query->transWhere('slug', $slug);
        } else {
            $query->where('slug', $slug);
        }
//
//        if (!$this->checkEditor()) {
//            $query->isPublished();
//        }

        $event = $query->first();

        /*
         * Add a "url" helper attribute for linking to each category
         */
//        if ($event && $event->exists && $event->categories->count()) {
//            $event->categories->each(function($category) {
//                $category->setUrl($this->eventPage, $this->controller);
//            });
//        }

        return $event;
    }

    public function previousEvent()
    {
        return $this->getEventtSibling(-1);
    }

    public function nextEvent()
    {
        return $this->getEventtSibling(1);
    }

    protected function getEventtSibling($direction = 1)
    {
        if (!$this->event) {
            return;
        }

        $method = $direction === -1 ? 'previousEventt' : 'nextEvent';

        if (!$event = $this->event->$method()) {
            return;
        }

        $eventPage = $this->getPage()->getBaseFileName();

        $event->setUrl($eventPage, $this->controller);

//        $event->categories->each(function($category) {
//            $category->setUrl($this->eventPage, $this->controller);
//        });

        return $event;
    }

    protected function checkEditor()
    {
        $backendUser = BackendAuth::getUser();

        return $backendUser && $backendUser->hasAccess('rainlab.blog.access_posts');
    }
}
