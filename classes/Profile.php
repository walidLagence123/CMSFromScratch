<?php
/**
 * Class Profile
 */
class Profile extends ObjectModel
{
    /** @var string Name */
    public $id;
    public $id_profile;
    public $name;
    public $active;

    /**
     * @see ObjectModel::$definition
     */
    public static $definition = array(
        'table' => 'profile',
        'primary' => 'id_profile',
        'fields' => array(
            'name' => array('type' => self::TYPE_STRING, 'validate' => 'isString'),
            'active' => array('type' => self::TYPE_BOOL),
        ),
    );
}

