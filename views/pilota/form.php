<?php require 'views/layout_top.php'; ?>
<div class="crud-box">
  <h2><?=$pilota['az']?'Pilóta szerkesztése':'Új pilóta hozzáadása'?></h2>
  <?php if(!empty($errors)): ?>
    <div class="alert alert-danger"><?php foreach($errors as $e) echo '<p>'.htmlspecialchars($e).'</p>';?></div>
  <?php endif; ?>
  <form method="POST" onsubmit="return validatePilota()" novalidate>
    <div class="form-group">
      <label>Név <span class="req">*</span></label>
      <input type="text" name="nev" id="p_nev" value="<?=htmlspecialchars($pilota['nev'])?>" placeholder="pl. Hamilton Lewis">
      <small>Angol írásmód: vezetéknév a végén</small>
    </div>
    <div class="form-group">
      <label>Nem <span class="req">*</span></label>
      <select name="nem">
        <option value="F" <?=$pilota['nem']==='F'?'selected':''?>>Férfi</option>
        <option value="N" <?=$pilota['nem']==='N'?'selected':''?>>Nő</option>
      </select>
    </div>
    <div class="form-group">
      <label>Születési dátum <span class="req">*</span></label>
      <input type="date" name="szuldat" id="p_szuldat" value="<?=htmlspecialchars($pilota['szuldat'])?>">
    </div>
    <div class="form-group">
      <label>Nemzetiség <span class="req">*</span></label>
      <input type="text" name="nemzet" id="p_nemzet" value="<?=htmlspecialchars($pilota['nemzet'])?>" placeholder="pl. brit">
    </div>
    <div class="form-actions">
      <button type="submit" class="btn btn-success">Mentés</button>
      <a href="index.php?url=pilota/list" class="btn btn-secondary">Mégse</a>
    </div>
  </form>
</div>
<script>
function validatePilota(){
  const nev=document.getElementById('p_nev').value.trim();
  const szuldat=document.getElementById('p_szuldat').value;
  const nemzet=document.getElementById('p_nemzet').value.trim();
  if(!nev){alert('A név megadása kötelező!');return false;}
  if(!szuldat){alert('A születési dátum megadása kötelező!');return false;}
  if(!nemzet){alert('A nemzetiség megadása kötelező!');return false;}
  return true;
}
</script>
<?php require 'views/layout_bottom.php'; ?>
