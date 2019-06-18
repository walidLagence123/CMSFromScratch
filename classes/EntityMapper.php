<?php

class EntityMapper
{
    /**
     * Load ObjectModel
     * @param $id
     * @param $entity \ObjectModel
     * @param $entity_defs
     */
    public static function load($id,$entity, $entity_defs)
    {
        // Load object from database if object id is present
        $should_cache_objects = false;
        if (!$should_cache_objects){
            $sql = new QueryBuilder();
            $sql->from($entity_defs['table'], 'a');
            $sql->where('a.`' .$entity_defs['primary']. '` = ' . (int)$id);

            if ($object_datas = Db::getInstance()->getRow($sql)) {
                $entity->id = (int)$id;
                foreach ($object_datas as $key => $value) {
                    if (array_key_exists($key, $entity)) {
                        $entity->{$key} = $value;
                    } else {
                        unset($object_datas[$key]);
                    }
                }
            }
        }
    }
}
