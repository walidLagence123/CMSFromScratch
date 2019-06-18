<?php
/**
 * Class Article
 */
class Activity extends ObjectModel
{
    /** @var string Name */
    public $id;
    public $id_activity;
    public $name;
    public $description;
    public $cover_image;
    public $icon;
    public $active;
    public $date_add;
    public $date_update;

    /**
     * @see ObjectModel::$definition
     */
    public static $definition = array(
        'table' => 'activity',
        'primary' => 'id_activity',
        'fields' => array(
            'name' => array('type' => self::TYPE_STRING, 'validate' => 'isString'),
            'description' => array('type' => self::TYPE_HTML),
            'cover_image' => array('type' => self::TYPE_STRING,'validate' => 'isString'),
            'icon' => array('type' => self::TYPE_STRING,'validate' => 'isString'),
            'active' => array('type' => self::TYPE_BOOL),
            'date_add' => array('type' => self::TYPE_DATE, 'shop' => true, 'validate' => 'isDate'),
            'date_update' => array('type' => self::TYPE_DATE, 'shop' => true, 'validate' => 'isDate'),
        ),
    );

    /*
     * Get article categories
     * @return array
     */

    public function getMembers(){
        $id_list = array();
        $sql = new QueryBuilder();
        $sql->select('id_category');
        $sql->from('article_category', 'ac');
        $sql->where('ac.id_article = '.(int)$this->id_article);
        $sql->orderBy('id_article');

        $res = Db::getInstance()->executeS($sql->build());
        if(empty($res))
            return $id_list;
        else{
            foreach($res as $c)
                array_push($id_list, $c['id_category']);
            return $id_list;
        }
    }
}
