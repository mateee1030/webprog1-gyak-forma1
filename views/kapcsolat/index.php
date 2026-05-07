<?php require 'views/layout_top.php'; ?>
<div class="crud-box">
  <h2>✉️ Kapcsolat</h2>
  <?php if($success): ?>
    <div class="alert alert-success">Az üzenetet sikeresen elküldtük! Hamarosan válaszolunk.</div>
  <?php endif; ?>
  <?php if(!empty($errors)): ?>
    <div class="alert alert-danger"><?php foreach($errors as $e) echo '<p>'.htmlspecialchars($e).'</p>'; ?></div>
  <?php endif; ?>

  <div class="contact-wrap">
    <div class="contact-info">
      <h3 style="color:#b71c1c;margin-bottom:12px">Elérhetőségeink</h3>
      <p>📧 info@forma1adatbazis.hu</p><br>
      <p>📞 +36 70 123 4567</p><br>
      <p>🏠 1051 Budapest, Forma-1 út 1.</p>
    </div>
    <div class="contact-form" style="flex:2">
      <form method="POST" onsubmit="return validateKapcsolat()" novalidate>
        <div class="form-group">
          <label>Név <span class="req">*</span></label>
          <input type="text" name="nev" id="k_nev" value="<?=htmlspecialchars($data['nev'])?>" placeholder="Kovács Máté">
        </div>
        <div class="form-group">
          <label>E-mail cím <span class="req">*</span></label>
          <input type="email" name="email" id="k_email" value="<?=htmlspecialchars($data['email'])?>" placeholder="pelda@email.hu">
        </div>
        <div class="form-group">
          <label>Tárgy <span class="req">*</span></label>
          <input type="text" name="targy" id="k_targy" value="<?=htmlspecialchars($data['targy'])?>" placeholder="Üzenet tárgya">
        </div>
        <div class="form-group">
          <label>Üzenet <span class="req">*</span></label>
          <textarea name="uzenet" id="k_uzenet" placeholder="Írja ide üzenetét..."><?=htmlspecialchars($data['uzenet'])?></textarea>
        </div>
        <div class="form-actions">
          <button type="submit" class="btn btn-danger">Küldés</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
function validateKapcsolat(){
  const nev=document.getElementById('k_nev').value.trim();
  const email=document.getElementById('k_email').value.trim();
  const targy=document.getElementById('k_targy').value.trim();
  const uzenet=document.getElementById('k_uzenet').value.trim();
  const emailRe=/^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if(!nev){alert('A név megadása kötelező!');return false;}
  if(!email){alert('Az e-mail cím megadása kötelező!');return false;}
  if(!emailRe.test(email)){alert('Érvénytelen e-mail cím!');return false;}
  if(!targy){alert('A tárgy megadása kötelező!');return false;}
  if(!uzenet){alert('Az üzenet megadása kötelező!');return false;}
  if(uzenet.length<10){alert('Az üzenet legalább 10 karakter legyen!');return false;}
  return true;
}
</script>
<?php require 'views/layout_bottom.php'; ?>
