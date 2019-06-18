<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="https://use.fontawesome.com/f225000782.js"></script>
  <link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css" rel="stylesheet">

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <link rel="stylesheet" href="theme/css/custom.css">
  <script>
$(document).ready(function() {
  $('#example').DataTable( {
        "scrollX": true,
        "pagingType": "full_numbers",
        "scrollY": "400px",
        "scrollCollapse": true,
        language: {
        url: '//cdn.datatables.net/plug-ins/1.10.15/i18n/French.json'
    }
    } );
} );
</script>
</head>
<body>

<nav class="navbar top-navbar">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid">    
  <div class="row custom-menu-left">
    <div class="col-sm-2 custom-sidenav">
    <ul class="nav">
    <?php 

      function displayMessage($status,$message){
        return '<div class="alert alert-'.$status.'">'.$message.'</div>';
      }

      $nv = '';
      if(!empty($menu_datas) && is_array($menu_datas)){
        foreach($menu_datas as $ctlr=>$nav){
           $nv  .= '<li class="nav-item">';
           $nv .= '<a class="nav-link" href="index.php?controller='.$ctlr.'&action=list"><i class="'.$nav['fa_icon'].'"></i> '.$nav['label'].'</a>';
           $nv .= '</li>';
        }
        echo $nv;
      }
    ?>
    </ul>
    </div>
    <div class="col-sm-10" style="margin-top:10px;"> 
        <?php 

          if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["submit_form"]))
            include("formHandler.php");

            if($action == 'list' || $action == 'delete'){
              include('delete.html.php'); 
              include('list.html.php');
            }else if($action == 'add' || $action == 'edit')
              include('add.html.php');
            else
              echo displayMessage('warning',"Action <strong>".$action."</strong> not found");
        ?>
    </div>
  </div>
</div>
</body>
</html>
