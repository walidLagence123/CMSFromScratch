<?php
/**
 * Class Comment
 */
class Comment extends ObjectModel
{
    /** @var string Name */
    public $id;
    public $id_comment;
    public $name;
    public $comment;
    public $id_article;
    public $id_member;
    public $active;
    public $date_add;
    public $date_update;

    /**
     * @see ObjectModel::$definition
     */
    public static $definition = array(
        'table' => 'comment',
        'primary' => 'id_comment',
        'fields' => array(
            'name' => array('type' => self::TYPE_STRING, 'validate' => 'isString'),
            'comment' => array('type' => self::TYPE_HTML),
            'id_article' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId'),
            'id_member' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId'),
            'active' => array('type' => self::TYPE_BOOL),
            'date_add' => array('type' => self::TYPE_DATE, 'shop' => true, 'validate' => 'isDate'),
            'date_update' => array('type' => self::TYPE_DATE, 'shop' => true, 'validate' => 'isDate'),
        ),
    );

    /*
     * Get Comment
     * @return array
     */

    public function getMember(){

        $sql = new QueryBuilder();
        $sql->select('*');
        $sql->from('member', 'm');
        $sql->where('m.id_member = '.(int)$this->id_member);

        return Db::getInstance()->executeS($sql->build());
    }
}
