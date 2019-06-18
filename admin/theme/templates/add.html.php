<?php

$data_list = array();
$id_object_key = '';
$object_list_template = '';
if(!empty($_controller) && ($action == 'add' || $action == 'edit')){
    $class = $menu_datas[$_controller]['class'];
    if(class_exists($class)){
        $object = new $class;
        $data_list = $object->getAll();
        $id_object_key = 'id_'.strtolower($class);
        $object_list_template = ucfirst($class).'.html.php';
    }
}
?>
        <?php
            $template_path = _ADMIN_THEME_TEMPLATES_DIR.'form/'.$object_list_template;
            if(file_exists($template_path) && is_file($template_path))
                include($template_path);
            else 
                echo 'Template : <strong>'.$template_path.'</strong> not found';
            
        ?> 
