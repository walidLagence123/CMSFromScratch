<?php 
  if(isset($_GET['id'])){
     $article = new Article((int)$_GET['id']);
  }
?>
<div class="col-md-offset-2 col-md-6 col-md-offset-2">
<form method="POST" action="index.php?controller=<?php echo $_controller;?>&action=list">
  <div class="form-group">
    <label for="title">Article</label>
    <input type="text" class="form-control" id="title" name="title" value="<?php echo (isset($article->title) ? $article->title : "");?>">
  </div>
  <div class="form-group">
    <label for="description">Description</label>
    <textarea type="textarea" class="form-control" id="description" rows="4" name="description" ><?php echo (isset($article->description) ? $article->description : "");?></textarea>
  </div>
  <div class="form-group">
    <label for="meta_seo">Metas seo :</label>
    <input type="text" class="form-control" id="meta_seo" name="meta_seo" value="<?php echo (isset($article->meta_seo) ? $article->meta_seo : "");?>">
  </div>
  <div class="radio">Activer les commentaires<br><br>
    <label class="radio-inline">
      <input type="radio" name="enable_comments" <?php echo (isset($article->enable_comments)  && $article->enable_comments ? ' checked="1" value="1"' : 'value="0"');?>>Oui
    </label>
    <label class="radio-inline">
      <input type="radio" name="enable_comments" <?php echo (isset($article->enable_comments)  && $article->enable_comments ? 'value="1"' : 'checked="1" value="0"');?>>Non
    </label>
  </div>
  <div class="form-group">
    <label for="id_parent">Categories</label>
    <select class="form-control" id="categories" name="categories[]" multiple>
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
  <div class="radio">Active<br><br>
    <label class="radio-inline">
      <input type="radio" name="active" <?php echo (isset($article->active)  && $article->active ? ' checked="1" value="1"' : 'value="0"');?>>Oui
    </label>
    <label class="radio-inline">
      <input type="radio" name="active" <?php echo (isset($article->active)  && $article->active ? 'value="1"' : 'checked="1" value="0"');?>>Non
    </label>
  </div>
  <input type="hidden" id="id_article" name="id_article" value="<?php echo (isset($article->id) ? $article->id : "");?>">
  <input type="hidden" id="submit_article" name="submit_article" value="submit_article">
  <button type="submit" class="btn btn-default" name="submit_form">Submit</button>
</form>
</div>
