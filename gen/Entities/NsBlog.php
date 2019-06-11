<?php
// WARNING! THIS IS A GENERATED FILE, PLEASE DO NOT EDIT!

namespace gen\Entities;


use Reactor\Hierarchy\NodeSourceExtension;

class NsBlog extends NodeSourceExtension {

    /**
     * The fillable fields for the model.
     */
    protected $fillable = ['content'];

    /**
     * Returns the fields for the model
     */
    public static function getSourceFields()
    {
        return ['content'];
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