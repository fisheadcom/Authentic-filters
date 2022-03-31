<?php namespace Snapperit\Faq;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return ['Snapperit\Faq\Components\Search' => 'FaqSearch'];
    }

    public function registerSettings()
    {
    }
}
