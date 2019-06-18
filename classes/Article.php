<?php
/**
 * Class Article
 */
class Article extends ObjectModel
{
    /** @var string Name */
    public $id;
    public $id_article;
    public $title;
    public $description;
    public $meta_seo;
    public $enable_comments;
    public $cover_image;
    public $id_manager;
    public $active;
    public $date_add;
    public $date_update;

    /**
     * @see ObjectModel::$definition
     */
    public static $definition = array(
        'table' => 'article',
        'primary' => 'id_article',
        'fields' => array(
            'title' => array('type' => self::TYPE_STRING, 'validate' => 'isString'),
            'description' => array('type' => self::TYPE_HTML),
            'enable_comments' => array('type' => self::TYPE_BOOL),
            'cover_image' => array('type' => self::TYPE_STRING,'validate' => 'isString'),
            'meta_seo' => array('type' => self::TYPE_STRING,'validate' => 'isString'),
            'id_manager' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId'),
            'active' => array('type' => self::TYPE_BOOL),
            'date_add' => array('type' => self::TYPE_DATE, 'validate' => 'isDate'),
            'date_update' => array('type' => self::TYPE_DATE,'validate' => 'isDate'),
        ),
    );

    /*
     * Get article categories
     * @return array
     */

    public function getCategoriesIds(){
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

    /*
     * Get article categories
     * @return array
     */

    public function getComments(){
        $id_list = array();
        $sql = new QueryBuilder();
        $sql->select('*');
        $sql->from('comment', 'c');
        $sql->where('c.id_article = '.(int)$this->id_article);
        $sql->orderBy('date_add');

        return Db::getInstance()->executeS($sql->build());
    }
}
