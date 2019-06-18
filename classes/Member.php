<?php
/**
 * Class Member
 */
class Member extends ObjectModel
{
    /** @var string Name */
    public $id;
    public $id_member;
    public $lastname;
    public $firstname;
    public $address;
    public $city;
    public $country;
    public $zip_code;
    public $enable_comments;
    public $description;
    public $last_connexion;
    public $passwd;
    public $photo;
    public $email;
    public $active;
    public $date_add;
    public $date_update;

    /**
     * @see ObjectModel::$definition
     */
    public static $definition = array(
        'table' => 'member',
        'primary' => 'id_member',
        'fields' => array(
            'lastname' => array('type' => self::TYPE_STRING, 'validate' => 'isString'),
            'firstname' => array('type' => self::TYPE_STRING, 'validate' => 'isString'),
            'address' => array('type' => self::TYPE_STRING, 'validate' => 'isString'),
            'city' => array('type' => self::TYPE_STRING, 'validate' => 'isString'),
            'country' => array('type' => self::TYPE_STRING, 'validate' => 'isString'),
            'zip_code' => array('type' => self::TYPE_STRING, 'validate' => 'isString'),
            'description' => array('type' => self::TYPE_HTML),
            'enable_comments' => array('type' => self::TYPE_BOOL),
            'passwd' => array('type' => self::TYPE_STRING,'validate' => 'isString'),
            'photo' => array('type' => self::TYPE_STRING,'validate' => 'isString'),
            'email' => array('type' => self::TYPE_STRING,'validate' => 'isEmail'),
            'last_connexion' => array('type' => self::TYPE_DATE, 'validate' => 'isDate'),
            'active' => array('type' => self::TYPE_BOOL),
            'date_add' => array('type' => self::TYPE_DATE, 'validate' => 'isDate'),
            'date_update' => array('type' => self::TYPE_DATE, 'validate' => 'isDate'),
        ),
    );

    /*
     * Get all Member
     * @return array
     */

    public function getAll(){
        $sql = new QueryBuilder();
        $sql->select('*');
        $sql->from('member', 'm');

        return Db::getInstance()->executeS($sql->build());
    }

    /*
     * Get all comments from member
     * @return array
     */

    public function getComments(){
        $sql = new QueryBuilder();
        $sql->select('*');
        $sql->from('comment', 'c');
        $sql->where('c.id_member = '.(int)$this->id_member);
        $sql->orderBy('date_add');

        return Db::getInstance()->executeS($sql->build());
    }
}
