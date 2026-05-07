<?php require 'views/layout_top.php'; ?>
<div class="crud-box">
  <h2>Kép feltöltése</h2>
  <?php if($upload_error): ?><div class="alert alert-danger"><?=htmlspecialchars($upload_error)?></div><?php endif; ?>
  <?php if($upload_success): ?><div class="alert alert-success"><?=htmlspecialchars($upload_success)?></div><?php endif; ?>
  <form method="POST" enctype="multipart/form-data" onsubmit="return validateKep()" novalidate>
    <div class="form-group">
      <label>Képfájl (jpg/png/gif, max 5MB) <span class="req">*</span></label>
      <input type="file" name="kep" id="kepFile" accept="image/*">
    </div>
    <div class="form-group">
      <label>Cím / leírás</label>
      <input type="text" name="cim" placeholder="pl. Monaco 1950">
    </div>
    <div class="form-actions">
      <button type="submit" class="btn btn-success">Feltöltés</button>
      <a href="index.php?url=kepek" class="btn btn-secondary">Vissza</a>
    </div>
  </form>
</div>
<script>
function validateKep(){
  const f=document.getElementById('kepFile');
  if(!f.value){alert('Kérjük válasszon képfájlt!');return false;}
  const allowed=['image/jpeg','image/png','image/gif','image/webp'];
  if(!allowed.includes(f.files[0].type)){alert('Csak kép fájl tölthető fel!');return false;}
  if(f.files[0].size>5*1024*1024){alert('A fájl mérete max. 5 MB!');return false;}
  return true;
}
</script>
<?php require 'views/layout_bottom.php'; ?>
