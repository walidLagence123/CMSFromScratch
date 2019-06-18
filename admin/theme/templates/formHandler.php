<?php

    // TODO : 
    /*
     *
     * 
     * 
     * */

    // Handle activity form :
    if(isset($_POST['submit_activity'])){
        $atvt = new Activity((int)$_POST['id_activity']);
        $atvt->name = addslashes($_POST['activity']);
        $atvt->description = addslashes($_POST['description']);
        $atvt->active = $_POST['active'];
        if(isset($_POST['id_activity']) && Validate::isUnsignedId($_POST['id_activity'])){
            $res = $atvt->update();
        }else $res = $atvt->add();

        if($res)
            echo displayMessage('success','<strong>Success !</strong> activité '.$atvt->name);
        else
            echo displayMessage('danger','<strong>Error !</strong> activité '.$atvt->name);

    }

    // Handle category form :
    if(isset($_POST['submit_category'])){
        $ctgr = new Category((int)$_POST['id_category']);
        $ctgr->name = addslashes($_POST['name']);
        $ctgr->description = addslashes($_POST['description']);
        $ctgr->meta_seo = $_POST['meta_seo'];
        $ctgr->id_parent = $_POST['id_parent'];
        $ctgr->is_root = false;
        $ctgr->active = $_POST['active'];
        if(isset($_POST['id_category']) && Validate::isUnsignedId($_POST['id_category'])){
            $res = $ctgr->update();
        }else $res = $ctgr->add();
    
        if($res)
            echo displayMessage('success','<strong>Success !</strong> Categorie '.$ctgr->name);
        else
            echo displayMessage('danger','<strong>Error !</strong> Categorie '.$ctgr->name);
    
    }  
    
    
    // Handle Member form :
    if(isset($_POST['submit_member'])){
        $mbr = new Member((int)$_POST['id_member']);
        $mbr->lastname = addslashes($_POST['lastname']);
        $mbr->firstname = addslashes($_POST['firstname']);
        $mbr->address = addslashes($_POST['address']);
        $mbr->city = addslashes($_POST['city']);
        $mbr->country = addslashes($_POST['country']);
        $mbr->zip_code = addslashes($_POST['zip_code']);
        $mbr->email = addslashes($_POST['email']);
        $mbr->description = addslashes($_POST['id_member']);
        $mbr->enable_comments = $_POST['enable_comments'];
        $mbr->passwd = $_POST['passwd'];
        $mbr->active = $_POST['active'];
        if(isset($_POST['id_member']) && Validate::isUnsignedId($_POST['id_member'])){
            $res = $mbr->update();
        }else $res = $mbr->add();
    
        if($res)
            echo displayMessage('success','<strong>Success !</strong> Membre '.$mbr->lastname);
        else
            echo displayMessage('danger','<strong>Error !</strong> Membre '.$mbr->mlastnamebr);
    
    }  



    // Handle Profile form :
        if(isset($_POST['submit_profile'])){
            $pfrl = new Profile((int)$_POST['id_profile']);
            $pfrl->name = addslashes($_POST['name']);
            $pfrl->active = $_POST['active'];
            if(isset($_POST['id_profile']) && Validate::isUnsignedId($_POST['id_profile'])){
                $res = $pfrl->update();
            }else $res = $pfrl->add();
        
            if($res)
                echo displayMessage('success','<strong>Success !</strong> Profile '.$pfrl->name);
            else
                echo displayMessage('danger','<strong>Error !</strong> Profile '.$pfrl->name);
        
        }  



    // Handle Article form :
    if(isset($_POST['submit_article'])){
        $artle = new Article((int)$_POST['id_article']);
        $artle->title = addslashes($_POST['title']);
        $artle->description = addslashes($_POST['description']);
        $artle->meta_seo = $_POST['meta_seo'];
        $artle->id_manager = 1; //TODO: le manager connecté
        $artle->enable_comments = $_POST['enable_comments'];
        $artle->active = $_POST['active'];
        if(isset($_POST['id_article']) && Validate::isUnsignedId($_POST['id_article'])){
            $res = $artle->update();
        }else $res = $artle->add();
    
        if($res)
            echo displayMessage('success','<strong>Success !</strong> Article '.$artle->title);
        else
            echo displayMessage('danger','<strong>Error !</strong> Article '.$artle->title);
    
    }  