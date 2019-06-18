<?php
/**
 * Class Category
 */
class Category extends ObjectModel
{
    /** @var string Name */
    public $id;
    public $id_category;
    public $name;
    public $description;
    public $meta_seo;
    public $cover_image;
    public $is_root;
    public $id_parent;
    public $active;
    public $date_add;
    public $date_update;

    /**
     * @see ObjectModel::$definition
     */
    public static $definition = array(
        'table' => 'category',
        'primary' => 'id_category',
        'fields' => array(
            'name' => array('type' => self::TYPE_STRING, 'validate' => 'isString'),
            'description' => array('type' => self::TYPE_HTML),
            'cover_image' => array('type' => self::TYPE_STRING,'validate' => 'isString'),
            'meta_seo' => array('type' => self::TYPE_STRING,'validate' => 'isString'),
            'is_root' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId'),
            'id_parent' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId'),
            'active' => array('type' => self::TYPE_BOOL),
            'date_add' => array('type' => self::TYPE_DATE, 'shop' => true, 'validate' => 'isDate'),
            'date_update' => array('type' => self::TYPE_DATE, 'shop' => true, 'validate' => 'isDate'),
        ),
    );

    /*
     * Get article categories
     * @return array
     */

    public function getArticlesIds(){
        $id_list = array();
        $sql = new QueryBuilder();
        $sql->select('id_article');
        $sql->from('article_category', 'ac');
        $sql->where('ac.id_category = '.(int)$this->id_category);
        $sql->orderBy('id_category');

        $res = Db::getInstance()->executeS($sql->build());
        if(empty($res))
            return $id_list;
        else{
            foreach($res as $c)
                array_push($id_list, $c['id_article']);
            return $id_list;
        }
    }
}
