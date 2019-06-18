<thead>
            <tr>
                <th>Id</th>
                <th>Accèss</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                if(!empty($data_list)){
                    foreach($data_list as $k=>$v){
                        echo '<tr>';
                        echo '<td>'.$data_list[$k]['id_access'].'</td>';
                        echo '<td>'.$data_list[$k]['slug'].'</td>';
                        echo '<td>'.$data_list[$k]['description'].'</td>';
                        echo '</th>';
                    }
                }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Id</th>
                <th>Accèss</th>
                <th>Description</th>
            </tr>
        </tfoot>
