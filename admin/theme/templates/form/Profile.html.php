<?php 
  if(isset($_GET['id'])){
     $profile = new Profile((int)$_GET['id']);
  }
?>
<div class="col-md-offset-2 col-md-6 col-md-offset-2">
<form method="POST" action="index.php?controller=<?php echo $_controller;?>&action=list">
  <div class="form-group">
    <label for="name">Profile</label>
    <input type="text" class="form-control" id="name" name="name" value="<?php echo (isset($profile->name) ? $profile->name : "");?>">
  </div>
  <div class="radio">Active<br><br>
    <label class="radio-inline">
      <input type="radio" name="active" <?php echo (isset($profile->active)  && $profile->active ? ' checked="1" value="1"' : 'value="0"');?>>Oui
    </label>
    <label class="radio-inline">
      <input type="radio" name="active" <?php echo (isset($profile->active)  && $profile->active ? 'value="1"' : 'checked="1" value="0"');?>>Non
    </label>
  </div>
  <input type="hidden" id="id_profile" name="id_profile" value="<?php echo (isset($profile->id) ? $profile->id : "");?>">
  <input type="hidden" id="submit_profile" name="submit_profile" value="submit_profile">
  <button type="submit" class="btn btn-default" name="submit_form">Submit</button>
</form>
</div>
