        <thead>
            <tr>
                <th>Id</th>
                <th>Activité</th>
                <th>Active</th>
                <th>Date d'ajout</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php 
                if(!empty($data_list)){
                    foreach($data_list as $k=>$v){
                        echo '<tr>';
                        echo '<td>'.$data_list[$k]['id_activity'].'</td>';
                        echo '<td>'.$data_list[$k]['name'].'</td>';
                        echo '<td>'.$data_list[$k]['active'].'</td>';
                        echo '<td>'.$data_list[$k]['date_add'].'</td>';
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
                <th>Activité</th>
                <th>Active</th>
                <th>Date d'ajout</th>
                <th></th>
            </tr>
        </tfoot>
