<?php
/**
 * Class Access
 */
class Access extends ObjectModel
{
    /** @var string Name */
    public $id;
    public $id_access;
    public $slug;
    public $description;

    /**
     * @see ObjectModel::$definition
     */
    public static $definition = array(
        'table' => 'access',
        'primary' => 'id_access',
        'fields' => array(
            'slug' => array('type' => self::TYPE_STRING, 'validate' => 'isString'),
            'description' => array('type' => self::TYPE_STRING, 'validate' => 'isString'),
        ),
    );
}
