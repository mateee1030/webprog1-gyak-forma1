<?php require 'views/layout_top.php'; ?>
<div class="crud-box">
  <div class="crud-header">
    <h2>📸 Képgaléria</h2>
    <?php if(isset($_SESSION['user'])): ?>
      <a href="index.php?url=kepek/feltoltes" class="btn btn-success">+ Kép feltöltése</a>
    <?php else: ?>
      <span class="alert alert-info" style="padding:6px 12px">Képet feltölteni csak bejelentkezett felhasználó tölthet fel.</span>
    <?php endif; ?>
  </div>
  <?php if(empty($kepek)): ?>
    <p style="color:#888">Még nincs feltöltött kép.</p>
  <?php else: ?>
  <div class="gallery">
    <?php foreach($kepek as $k): ?>
    <div class="gallery-item">
      <img src="uploads/<?=htmlspecialchars($k['fajlnev'])?>" alt="<?=htmlspecialchars($k['cim'])?>">
      <p><?=htmlspecialchars($k['cim']?:'Névtelen kép')?><br>
      <small><?=$k['vezeteknev']?' Feltöltő: '.$k['vezeteknev'].' '.$k['keresztnev']:''?></small></p>
    </div>
    <?php endforeach; ?>
  </div>
  <?php endif; ?>
</div>
<?php require 'views/layout_bottom.php'; ?>
