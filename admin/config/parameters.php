<?php 

define('_ADMIN_THEME_DIR', 'theme/');
define('_ADMIN_THEME_TEMPLATES_DIR', 'theme/templates/');

$avalables_actions = array(
  'list',
  'show',
  'delete',
  'update',
  'add'
);



// Admin routes :
$menu_datas = array(
  'AdminDashboard'=>array(
      'fa_icon' => 'fa fa-dashboard',
      'label'=> 'Tableau de bord',
      'class'=> false,
  ),
  'AdminConfigs'=>array(
    'fa_icon' => 'fa fa-cogs',
    'label'=> 'Configs',
    'class'=> false,
  ),
  'AdminActivity'=>array(
    'fa_icon' => 'fa fa-child',
    'label'=> 'Activités',
    'class'=> 'Activity',
  ),
  'AdminAccess'=>array(
    'fa_icon' => 'fa fa-key',
    'label'=> 'Accéss',
    'class'=> 'Access',
  ),
  'AdminCategory'=>array(
    'fa_icon' => 'fa fa-clone',
    'label'=> 'Categories',
    'class'=> 'Category',
  ),
  'AdminMember'=>array(
    'fa_icon' => 'fa fa-group',
    'label'=> 'Membres',
    'class'=> 'Member',
  ),
  'AdminProfile'=>array(
    'fa_icon' => 'fa fa-drivers-license',
    'label'=> 'Profiles',
    'class'=> 'Profile',
  ),
  'AdminArticle'=>array(
    'fa_icon' => 'fa fa-drivers-license',
    'label'=> 'Articles',
    'class'=> 'Article',
  )
);