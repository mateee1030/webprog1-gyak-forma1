<?php require 'views/layout_top.php'; ?>
<div class="crud-box">
  <div class="crud-header">
    <h2>🏎️ Pilóták (CRUD)</h2>
    <a href="index.php?url=pilota/new" class="btn btn-success">+ Új pilóta</a>
  </div>
  <div class="search-box">
    <input type="text" id="srch" placeholder="Keresés név, nemzetiség szerint..." oninput="filterTable()">
  </div>
  <div class="table-responsive">
    <table id="ptbl">
      <thead><tr><th>Az.</th><th>Név</th><th>Nem</th><th>Születési dátum</th><th>Nemzetiség</th><th>Műveletek</th></tr></thead>
      <tbody>
        <?php foreach($pilotak as $p): ?>
        <tr>
          <td><?=htmlspecialchars($p['az'])?></td>
          <td><?=htmlspecialchars($p['nev'])?></td>
          <td><?=$p['nem']==='F'?'Férfi':'Nő'?></td>
          <td><?=htmlspecialchars($p['szuldat'])?></td>
          <td><?=htmlspecialchars($p['nemzet'])?></td>
          <td class="actions">
            <a href="index.php?url=pilota/edit/<?=$p['az']?>" class="btn btn-warning btn-sm">Szerkesztés</a>
            <a href="index.php?url=pilota/delete/<?=$p['az']?>" class="btn btn-danger btn-sm"
               onclick="return confirm('Biztosan törlöd: <?=addslashes($p['nev'])?>?')">Törlés</a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
<script>
function filterTable(){
  const q=document.getElementById('srch').value.toLowerCase();
  document.querySelectorAll('#ptbl tbody tr').forEach(r=>{
    r.style.display=r.textContent.toLowerCase().includes(q)?'':'none';
  });
}
</script>
<?php require 'views/layout_bottom.php'; ?>
