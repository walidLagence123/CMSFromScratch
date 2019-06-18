<?php
    if(isset($_GET['controller']) && isset($_GET['action']) && isset($_GET['id'])){
        $_controller = $_GET['controller'];
        $action = $_GET['action'];
        $id = $_GET['id'];
        if(!empty($_controller) && $action == 'delete' && $id){
            $class = $menu_datas[$_controller]['class'];
            if(class_exists($class) && Validate::isUnsignedId($id)){
                $object = new $class((int)$id);
                if($object->delete())
                    echo displayMessage('success','<strong>Success !</strong> suppression '.$class.' '.$id);
                else
                    echo displayMessage('danger','<strong>Erreur !</strong> suppression '.$class.' '.$id);
            }else
                echo displayMessage('danger','<strong>Erreur !</strong> suppression '.$class.' '.$id);
        }
    }