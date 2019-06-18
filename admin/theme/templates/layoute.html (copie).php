<!-- DOCTYPE -->
<!DOCTYPE html>
<html lang="fr">
<head>
 <title>bootstrap 4 admin theme</title>
 <meta charset="utf-8">
 <!-- Viewport Meta Tag -->
 <!-- Bootstrap CSS -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
 <link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css" rel="stylesheet">
 <!-- fontawesome JS -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
 <script src="https://use.fontawesome.com/f225000782.js"></script>
 <link rel="stylesheet" href="theme/css/custom.css"> 
 <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>

 <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>



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

<style>
table.dataTable{border-collapse:collapse !important;}
</style>

</head>
<body>
 <!-- container open -->
 <div class="container-fluid">
   
  <nav class="navbar navbar-toggleable-sm navbar-light bg-faded fixed-top">
    
   <button class="navbar-toggler navbar-toggler-right hidden-lg-up" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
   </button>

   <a class="navbar-brand" href="#">
    <img src="https://v4-alpha.getbootstrap.com/assets/brand/bootstrap-solid.svg" width="30" height="30" class="align-top" alt="">
     Bootstrap 4
   </a>
    
   <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
     <li class="nav-item active">
      <a class="nav-link" href="#">middle1<span class="sr-only">(current)</span></a>
     </li>
     <li class="nav-item">
      <a class="nav-link" href="#">middle2</a>
     </li>
     <li class="nav-item">
      <a class="nav-link" href="#">middle3</a>
     </li>
     <li class="nav-item">
      <a class="nav-link" href="#">middle4</a>
     </li>
    </ul>

    <form class="form-inline mt-2 mt-md-0">
     <input class="form-control mr-sm-2" type="text" placeholder="Search">
     <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
   </div>
  </nav>
    
  <div class='row'>  
    <div class='col-md-2'>
  <nav class="sidebar" data-toggle="pill">
   <ul class="nav">
		 <li class="nav-profile">
			 <div class="image">
				 <a href=""><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/325053/profile/profile-80.jpg" alt=""></a>
			 </div>
			 <div class="info">
				Your Name
				<small>Frontend Developer</small>
			 </div>
			</li>
		</ul>
    
   <ul class="nav flex-column mr-auto">
    <?php 
      $nv = '<li class="nav-header">Navigation</li>';
      if(!empty($menu_datas) && is_array($menu_datas)){
        foreach($menu_datas as $ctlr=>$nav){
           $nv  .= '<li class="nav-item">';
           $nv .= '<a class="nav-link" href="index.php?controller='.$ctlr.'&action=list"><i class="'.$nav['fa_icon'].'"></i> '.$nav['label'].'</a>';
           $nv .= '</li>';
        }
        echo $nv;
      }
    ?>
    
    <li class="">
     <a class="sidebar-minify">
      <i class="fa fa-angle-double-left"></i>
     </a>
    </li>

   </ul>
  </nav>
    </div>
    <div class='col-md-9 body-center-content' style="margin-top:100px;">
        <?php 
          if($action == 'list')
            include('list.html.php'); 
          else if($action == 'add')
            include('add.html.php');
          else if($action == 'edit')
            include('add.html.php');
          else if($action == 'delete')
            include('delete.html.php');
          else 
            echo "Action <strong>".$action."</strong> not found";
        ?>
    </div>
    </div>

  <!-- container close -->
  </div>
  <!-- JavaScript: placed at the end of the document so the pages load faster -->
  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
  <script src="theme/js/custom.js"></script>
</body>
</html>