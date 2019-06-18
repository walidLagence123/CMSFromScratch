<?php 
  if(isset($_GET['id'])){
     $category = new Category((int)$_GET['id']);
  }
?>
<div class="col-md-offset-2 col-md-6 col-md-offset-2">
<form method="POST" action="index.php?controller=<?php echo $_controller;?>&action=list">
  <div class="form-group">
    <label for="name">Categorie :</label>
    <input type="text" class="form-control" id="name" name="name" value="<?php echo (isset($category->name) ? $category->name : "");?>">
  </div>
  <div class="form-group">
    <label for="description">Description :</label>
    <textarea type="textarea" class="form-control" id="description" rows="4" name="description" ><?php echo (isset($category->description) ? $category->description : "");?></textarea>
  </div>
  <div class="form-group">
    <label for="meta_seo">Metas seo :</label>
    <input type="text" class="form-control" id="meta_seo" name="meta_seo" value="<?php echo (isset($category->meta_seo) ? $category->meta_seo : "");?>">
  </div>
  <div class="form-group">
    <label for="id_parent">Categorie parent:</label>
    <select class="form-control" id="id_parent" name="id_parent">
        <?php 
            $ct = new Category();
            $list = $ct->getAll();
            if(!empty($list)){
                foreach ($list as $c) {
                    if($c['id_category'] != $category->id )
                        echo "<option value='".$c['id_category']."'>".$c['name']."</option>";
                }
            }
        ?>
    </select>
  </div>
  <div class="radio">Active :<br><br>
    <label class="radio-inline">
      <input type="radio" name="active" <?php echo (isset($category->active)  && $category->active ? ' checked="1" value="1"' : 'value="0"');?>>Oui
    </label>
    <label class="radio-inline">
      <input type="radio" name="active" <?php echo (isset($category->active)  && $category->active ? 'value="1"' : 'checked="1" value="0"');?>>Non
    </label>
  </div>
  <input type="hidden" id="id_category" name="id_category" value="<?php echo (isset($category->id) ? $category->id : "");?>">
  <input type="hidden" id="submit_category" name="submit_category" value="submit_category">
  <button type="submit" class="btn btn-default" name="submit_form">Submit</button>
</form>
</div>
