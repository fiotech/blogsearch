<?php namespace Nolan\BlogSearch;

use System\Classes\PluginBase;

/**
 * blogSearch Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * @var array Plugin dependencies
     */
    public $require = ['RainLab.Blog'];

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'Fiotech Blogger',
            'description' => 'Blog plugin for OctoberCMS develop by Fiotech',
            'author'      => 'Nolan',
            'icon'        => 'icon-search',
            'homepage'    => 'https://github.com/fiotech/blogsearch'
        ];
    }

    /**
     * @return array
     */
    public function registerComponents()
    {
        return [
            'Nolan\BlogSearch\Components\SearchForm'   => 'searchForm',
            'Nolan\BlogSearch\Components\SearchResult' => 'searchResult'
        ];
    }

    /**
     * Register new Twig variables
     * @return array
     */
    public function registerMarkupTags()
    {
        // Check the translate plugin is installed
        if (class_exists('RainLab\Translate\Behaviors\TranslatableModel')) {
            return [];
        }

        return [
            'filters' => [
                '_'  => ['Lang', 'get'],
                '__' => ['Lang', 'choice']
            ]
        ];
    }
}
