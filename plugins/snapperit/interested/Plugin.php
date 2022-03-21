<?php namespace Snapperit\Interested;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return [
            'Snapperit\Interested\Components\Interested' => 'interested'
        ];

    }

    public function registerSettings()
    {
    }
}
