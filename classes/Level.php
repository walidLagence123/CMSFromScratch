<?php
/**
 * Class Level
 */
class Level extends ObjectModel
{
    /** @var string Name */
    public $id;
    public $id_level;
    public $active;
    public $name;

    /**
     * @see ObjectModel::$definition
     */
    public static $definition = array(
        'table' => 'level',
        'primary' => 'id_level',
        'fields' => array(
            'name' => array('type' => self::TYPE_STRING, 'validate' => 'isString'),
            'active' => array('type' => self::TYPE_BOOL),
        ),
    );
}
