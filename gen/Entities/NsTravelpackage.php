<?php
// WARNING! THIS IS A GENERATED FILE, PLEASE DO NOT EDIT!

namespace gen\Entities;


use Reactor\Hierarchy\NodeSourceExtension;

class NsTravelpackage extends NodeSourceExtension {

    /**
     * The fillable fields for the model.
     */
    protected $fillable = ['no_of_days', 'place_cover', 'pkgtype', 'price', 'description', 'discount'];

    /**
     * Returns the fields for the model
     */
    public static function getSourceFields()
    {
        return ['no_of_days', 'place_cover', 'pkgtype', 'price', 'description', 'discount'];
    }

    /**
     * Returns searchables for the model
     */
    public static function getSearchable()
    {
        return [
            'columns' => [],
            'joins' => [
                
            ]
        ];
    }

    /**
     * Returns mutatables for the model
     */
    public static function getMutatables()
    {
        return [];
    }

}