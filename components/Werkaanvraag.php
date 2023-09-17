<?php namespace Nielsvandendries\Planning\Components;

use Cms\Classes\ComponentBase;

/**
 * Werkaanvraag Component
 *
 * @link https://docs.octobercms.com/3.x/extend/cms-components.html
 */
class Werkaanvraag extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'Werkaanvraag Component',
            'description' => 'No description provided yet...'
        ];
    }

    /**
     * @link https://docs.octobercms.com/3.x/element/inspector-types.html
     */
    public function defineProperties()
    {
        return [];
    }

    public function getEventOptions()
    {
        // Haal de evenementen op uit je "planning" plugin
        $events = \Plugin\Planning\Models\Evenement::all();
    
        $options = [];
    
        foreach ($events as $event) {
            $options[$event->id] = $event->naam; // Pas dit aan op basis van je evenementmodel
        }
    
        return $options;
    }
    
}
