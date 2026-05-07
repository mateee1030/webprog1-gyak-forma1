<?php require 'views/layout_top.php'; ?>
<div class="crud-box">
  <h2>Üzenetek</h2>
  <div class="table-responsive">
  <table>
    <tr>
      <th>Küldő</th>
      <th>E-mail</th>
      <th>Tárgy</th>
      <th>Üzenet</th>
      <th>Küldés ideje</th>
    </tr>
    <?php foreach ($uzenetek as $u): ?>
    <tr>
      <td><?= htmlspecialchars($u['felh_id'] ? ($u['vezeteknev'].' '.$u['keresztnev']) : $u['nev']) ?></td>
      <td><?= htmlspecialchars($u['email']) ?></td>
      <td><?= htmlspecialchars($u['targy']) ?></td>
      <td><?= htmlspecialchars($u['uzenet']) ?></td>
      <td><?= htmlspecialchars($u['kuldes_ideje']) ?></td>
    </tr>
    <?php endforeach; ?>
  </table>
  </div>
</div>
<?php require 'views/layout_bottom.php'; ?>