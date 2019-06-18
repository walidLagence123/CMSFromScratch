<?php 
  if(isset($_GET['id'])){
     $member = new Member((int)$_GET['id']);
  }
?>
<div class="col-md-offset-2 col-md-6 col-md-offset-2">
<form method="POST" action="index.php?controller=<?php echo $_controller;?>&action=list">
  <div class="form-group">
    <label for="lastname">Nom :</label>
    <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo (isset($member->lastname) ? $member->lastname : "");?>">
  </div>
  <div class="form-group">
    <label for="firstname">Prénom :</label>
    <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo (isset($member->firstname) ? $member->firstname : "");?>">
  </div>
  <div class="form-group">
    <label for="email">Email :</label>
    <input type="text" class="form-control" id="email" name="email" value="<?php echo (isset($member->email) ? $member->email : "");?>">
  </div>
  <div class="form-group">
    <label for="address">Adresse :</label>
    <input type="text" class="form-control" id="address" name="address" value="<?php echo (isset($member->address) ? $member->address : "");?>">
  </div>
  <div class="form-group">
    <label for="city">Ville :</label>
    <input type="text" class="form-control" id="city" name="city" value="<?php echo (isset($member->city) ? $member->city : "");?>">
  </div>
  <div class="form-group">
    <label for="country">Pays :</label>
    <input type="text" class="form-control" id="country" name="country" value="<?php echo (isset($member->country) ? $member->country : "");?>">
  </div>
  <div class="form-group">
    <label for="zip_code">Code postal :</label>
    <input type="text" class="form-control" id="zip_code" name="zip_code" value="<?php echo (isset($member->zip_code) ? $member->zip_code : "");?>">
  </div>
  <div class="form-group">
    <label for="description">Description :</label>
    <textarea type="textarea" class="form-control" id="description" rows="4" name="description" ><?php echo (isset($member->description) ? $member->description : "");?></textarea>
  </div>
  <div class="form-group">
    <label for="passwd">Mot de pass :</label>
    <input type="password" class="form-control" id="passwd" name="passwd" value="<?php echo (isset($member->passwd) ? $member->passwd : "");?>">
  </div>
  <div class="radio">Activer les commentaires :<br><br>
    <label class="radio-inline">
      <input type="radio" name="enable_comments" <?php echo (isset($member->enable_comments)  && $member->enable_comments ? ' checked="1" value="1"' : 'value="0"');?>>Oui
    </label>
    <label class="radio-inline">
      <input type="radio" name="enable_comments" <?php echo (isset($member->enable_comments)  && $member->enable_comments ? 'value="1"' : 'checked="1" value="0"');?>>Non
    </label>
  </div>
  <div class="radio">Active :<br><br>
    <label class="radio-inline">
      <input type="radio" name="active" <?php echo (isset($member->active)  && $member->active ? ' checked="1" value="1"' : 'value="0"');?>>Oui
    </label>
    <label class="radio-inline">
      <input type="radio" name="active" <?php echo (isset($member->active)  && $member->active ? 'value="1"' : 'checked="1" value="0"');?>>Non
    </label>
  </div>
  <input type="hidden" id="id_member" name="id_member" value="<?php echo (isset($member->id) ? $member->id : "");?>">
  <input type="hidden" id="submit_member" name="submit_member" value="submit_member">
  <button type="submit" class="btn btn-default" name="submit_form">Submit</button>
</form>
</div>
