<?php
require 'views/layout_top.php';
?>
<div class="crud-box">
  <h2>Üdvözöljük a Forma-1 Adatbázisban!</h2>
  <p style="margin:10px 0 20px;color:#555;line-height:1.7">
    A Forma-1 a világ egyik legnépszerűbb motorsport-sorozata. Ez az alkalmazás az első évtized
    futameredményeit, pilótáit és nagydíjait tartalmazza. Böngésszen az adatok között,
    vagy lépjen be a teljes funkcionalitás eléréséhez!
  </p>

  <div class="video-wrap">
    <div>
      <h3 style="margin-bottom:8px;color:#b71c1c">Saját videó</h3>
      <video controls>
        <source src="images/forma1.mp4" type="video/mp4">
        A böngésző nem támogatja a videót.
      </video>
    </div>
   <div>
  <h3 style="margin-bottom:8px;color:#b71c1c">YouTube videó</h3>
  <a href="https://www.youtube.com/watch?v=lL_d84cN1UY" target="_blank" rel="noopener noreferrer">
    <img src="https://img.youtube.com/vi/lL_d84cN1UY/hqdefault.jpg" 
         alt="F1 Highlights" style="width:100%;border-radius:8px;cursor:pointer">
    <p style="margin-top:6px;color:#b71c1c;font-weight:600">▶ Kattints a megtekintéshez</p>
  </a>
</div>
  </div>

  <h3 style="margin:24px 0 10px;color:#b71c1c">Az FIA Forma-1 Székháza</h3>
  <div class="map-wrap">
   <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2624.5263639357695!2d2.318791477017685!3d48.867241500082834!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66fd2a7964d51%3A0xf8e166936863dcae!2sF%C3%A9d%C3%A9ration%20Internationale%20de%20l&#39;Automobile!5e0!3m2!1shu!2shu!4v1778167059392!5m2!1shu!2shu" width=100% height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </div>

  <div class="cards" style="margin-top:24px">
    <div class="card"><h3>🏁 Pilóták</h3><p>Böngésszen a Forma-1 pilóták adatbázisában – CRUD kezeléssel.</p><br><a href="index.php?url=pilota/list" class="btn btn-danger">Megtekintés</a></div>
    <div class="card"><h3>📸 Képgaléria</h3><p>Forma-1 képek megtekintése és feltöltése (bejelentkezés szükséges).</p><br><a href="index.php?url=kepek" class="btn btn-danger">Megtekintés</a></div>
    <div class="card"><h3>✉️ Kapcsolat</h3><p>Üzenetet küldhet az oldal üzemeltetőjének.</p><br><a href="index.php?url=kapcsolat" class="btn btn-danger">Kapcsolat</a></div>
  </div>
</div>
<?php require 'views/layout_bottom.php'; ?>
