<?php

$data_list = array();
$id_object_key = '';
$object_list_template = '';
if(!empty($_controller) && ($action == 'list' || $action == 'delete')){
    $class = $menu_datas[$_controller]['class'];
    if(class_exists($class)){
        $object = new $class;
        $data_list = $object->getAll();
        $id_object_key = 'id_'.strtolower($class);
        $object_list_template = ucfirst($class).'.html.php';
    }
}
?>  
    <div class="btn-group" style="float:right;margin-right:15px">
        <a href="index.php?controller=<?php echo $_controller;?>&action=add" class="btn btn-primary"><i class="fa fa-plus"> Ajouter <?php echo $class;?></i></a>
    </div><br><br>
   <table id="example" class="box-shadow  table table-striped table-bordered" style="width:100%;<?php if(empty($data_list)) echo 'display:none';?>">
        <?php
            $template_path = _ADMIN_THEME_TEMPLATES_DIR.'list/'.$object_list_template;
            if(file_exists($template_path) && is_file($template_path))
                include($template_path);
            else
                echo displayMessage('warning','Template : '.$template_path.' not found'); 
        ?> 
    </table>