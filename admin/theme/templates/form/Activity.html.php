<?php 
  if(isset($_GET['id'])){
     $activity = new Activity((int)$_GET['id']);
  }
?>
<div class="col-md-offset-2 col-md-6 col-md-offset-2">
<form method="POST" action="index.php?controller=<?php echo $_controller;?>&action=list">
  <div class="form-group">
    <label for="activity">Activité</label>
    <input type="text" class="form-control" id="activity" name="activity" value="<?php echo (isset($activity->name) ? $activity->name : "");?>">
  </div>
  <div class="form-group">
    <label for="description">Description</label>
    <textarea type="textarea" class="form-control" id="description" rows="4" name="description" ><?php echo (isset($activity->description) ? $activity->description : "");?></textarea>
  </div>
  <div class="radio">Active<br><br>
    <label class="radio-inline">
      <input type="radio" name="active" <?php echo (isset($activity->active)  && $activity->active ? ' checked="1" value="1"' : 'value="0"');?>>Oui
    </label>
    <label class="radio-inline">
      <input type="radio" name="active" <?php echo (isset($activity->active)  && $activity->active ? 'value="1"' : 'checked="1" value="0"');?>>Non
    </label>
  </div>
  <input type="hidden" id="id_activity" name="id_activity" value="<?php echo (isset($activity->id) ? $activity->id : "");?>">
  <input type="hidden" id="submit_activity" name="submit_activity" value="submit_activity">
  <button type="submit" class="btn btn-default" name="submit_form">Submit</button>
</form>
</div>
