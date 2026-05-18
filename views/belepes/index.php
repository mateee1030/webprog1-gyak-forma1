<div style="display:flex;gap:30px;flex-wrap:wrap">

  <!-- BELÉPÉS -->
  <div class="crud-box" style="flex:1;min-width:280px">
    <h2>Belépés</h2>
    <?php foreach($errors as $e): ?><div class="alert alert-danger"><?=htmlspecialchars($e)?></div><?php endforeach; ?>
    <form method="POST" onsubmit="return validateLogin()" novalidate>
      <div class="form-group">
        <label>Felhasználónév <span class="req">*</span></label>
        <input type="text" name="login" id="l_login" placeholder="felhasznalonev">
      </div>
      <div class="form-group">
        <label>Jelszó <span class="req">*</span></label>
        <input type="password" name="jelszo" id="l_jelszo" placeholder="••••••">
      </div>
      <button type="submit" name="login_submit" class="btn btn-danger">Belépés</button>
    </form>
  </div>

  <!-- REGISZTRÁCIÓ -->
  <div class="crud-box" style="flex:1;min-width:280px">
    <h2>Regisztráció</h2>
    <?php if($reg_success): ?>
      <div class="alert alert-success">Sikeres regisztráció! Most már beléphet.</div>
    <?php endif; ?>
    <?php foreach($reg_errors as $e): ?><div class="alert alert-danger"><?=htmlspecialchars($e)?></div><?php endforeach; ?>
    <form method="POST" onsubmit="return validateReg()" novalidate>
      <div class="form-group">
        <label>Vezetéknév <span class="req">*</span></label>
        <input type="text" name="vezeteknev" id="r_vez" placeholder="Bartal">
      </div>
      <div class="form-group">
        <label>Keresztnév <span class="req">*</span></label>
        <input type="text" name="keresztnev" id="r_ker" placeholder="András">
      </div>
      <div class="form-group">
        <label>Felhasználónév <span class="req">*</span></label>
        <input type="text" name="reg_login" id="r_login" placeholder="felhasznalonev">
      </div>
      <div class="form-group">
        <label>Jelszó (min. 6 karakter) <span class="req">*</span></label>
        <input type="password" name="reg_jelszo" id="r_jel" placeholder="••••••">
      </div>
      <div class="form-group">
        <label>Jelszó megerősítése <span class="req">*</span></label>
        <input type="password" name="reg_jelszo2" id="r_jel2" placeholder="••••••">
      </div>
      <button type="submit" name="reg_submit" class="btn btn-success">Regisztráció</button>
    </form>
  </div>
</div>

<script>
function validateLogin(){
  const l=document.getElementById('l_login').value.trim();
  const p=document.getElementById('l_jelszo').value;
  if(!l){alert('A felhasználónév megadása kötelező!');return false;}
  if(!p){alert('A jelszó megadása kötelező!');return false;}
  return true;
}
function validateReg(){
  const vez=document.getElementById('r_vez').value.trim();
  const ker=document.getElementById('r_ker').value.trim();
  const log=document.getElementById('r_login').value.trim();
  const p1=document.getElementById('r_jel').value;
  const p2=document.getElementById('r_jel2').value;
  if(!vez||!ker||!log||!p1){alert('Minden mező kitöltése kötelező!');return false;}
  if(p1.length<6){alert('A jelszó legalább 6 karakter legyen!');return false;}
  if(p1!==p2){alert('A két jelszó nem egyezik!');return false;}
  return true;
}
</script>
