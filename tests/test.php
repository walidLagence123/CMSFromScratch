<?php

/**
 * @author    PKandré <pululuandre@gmail.com>
 * @copyright 2019-2020 PKandré
 * @license   https://opensource.org/licenses/OSL-3.0 Open Software License (OSL 3.0)
 */

include('../config/defines.php');
include('../config/parameters.php');
include('../autoloader.php');

$sql = new QueryBuilder();
$sql->select('*');
$sql->from('activity', 'a');
$sql->where('a.active = 1');
$sql->orderBy('id_activity');

/*var_dump($sql->build());*/

//$d = Db::getInstance()->executeS($sql->build());
//var_dump($d);


//Test insert int Db

/*Db::getInstance()->insert('access', array(
    'slug' => 'ACCESS_DELETE',
));*/


// TEST :  Add and Update object
$a = new Article(2); // enlever id pour créer

$a->title = 'opa';
$a->meta_seo = 'okokok';
$a->enable_comments = 'test222';
$a->cover_image = 'testPPP.png';
$a->id_manager = 1;
$a->active = false;

//echo $a->add();
//echo $a->update();
//echo $a->delete();
//var_dump($a->duplicateObject());

//var_dump($a->getComments());

//$ac = new Access();
//var_dump($ac->getAll());

/*$p = new Profile(6);

$p->name = "andré";

echo $p->delete();*/


/*$sql = new QueryBuilder();
$sql->select('*');
$sql->from('profile', 'a');


var_dump(Db::getInstance()->executeS($sql->build()));*/
