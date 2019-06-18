<thead>
            <tr>
                <th>Id</th>
                <th>Nom</th>
                <th>Categorie de l'article</th>
                <th>Active</th>
                <th>Date d'ajout</th>
                <th>Dernier mise à jour</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php 
                if(!empty($data_list)){

                    foreach($data_list as $k=>$v){
                        $id = $data_list[$k]['id_article'];
                        
                        $sql = new QueryBuilder();
                        $sql->select('id_category');
                        $sql->from('article_category', 'ac');
                        $sql->where('ac.id_article = '.(int)$id);
                        
                        $cats = array();
                        $list_cat = Db::getInstance()->executeS($sql->build());

                        if(!empty($list_cat)){
                            foreach($list_cat as $id){
                                $c = new Category((int)$id['id_category']);
                                array_push($cats, $c->name);
                            }
                        }

                        echo '<tr>';
                        echo '<td>'.$data_list[$k]['id_article'].'</td>';
                        echo '<td>'.$data_list[$k]['title'].'</td>';
                        echo '<td>'.implode(",", $cats).'</td>';
                        echo '<td>'.$data_list[$k]['active'].'</td>';
                        echo '<td>'.$data_list[$k]['date_add'].'</td>';
                        echo '<td>'.$data_list[$k]['date_update'].'</td>';
                            $id = $data_list[$k][$id_object_key];
                            echo '<td><div class="btn-group btn-group-sm">
                                    <a href="index.php?controller='.$_controller.'&action=edit&id='.$id.'" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                    <a href="index.php?controller='.$_controller.'&action=delete&id='.$id.'" class="btn btn-danger"><i class="fa fa-remove"></i></a>
                                    <a href="index.php?controller='.$_controller.'&action=display&id='.$id.'" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                </div></td>';
                        echo '</th>';
                    }
                }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Id</th>
                <th>Nom</th>
                <th>Categorie de l'article</th>
                <th>Active</th>
                <th>Date d'ajout</th>
                <th>Dernier mise à jour</th>
                <th></th>
            </tr>
        </tfoot>
