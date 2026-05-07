<!DOCTYPE html>
<html lang="hu">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Forma-1 Adatbázis</title>
<style>
*{margin:0;padding:0;box-sizing:border-box}
body{font-family:'Segoe UI',sans-serif;background:#f5f5f5;color:#333;display:flex;flex-direction:column;min-height:100vh}
/* HEADER */
header{background:linear-gradient(135deg,#b71c1c,#d32f2f);color:#fff;padding:15px 30px;display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:10px}
header h1{font-size:1.4em}
.user-info{font-size:.9em;opacity:.9}
/* NAV */
nav{background:#c62828;display:flex;flex-wrap:wrap}
nav a{color:#fff;text-decoration:none;padding:12px 18px;font-size:.95em;transition:background .2s}
nav a:hover,nav a.active{background:#8d0000}
/* MAIN */
main{max-width:1100px;margin:30px auto;padding:0 20px;flex:1}
/* CARDS on homepage */
.cards{display:flex;flex-wrap:wrap;gap:20px;margin-top:20px}
.card{background:#fff;border-radius:10px;padding:24px;flex:1;min-width:220px;box-shadow:0 2px 10px rgba(0,0,0,.08);border-top:4px solid #c62828}
.card h3{color:#b71c1c;margin-bottom:8px}
/* CRUD */
.crud-box{background:#fff;border-radius:10px;padding:25px;box-shadow:0 2px 12px rgba(0,0,0,.08)}
.crud-header{display:flex;justify-content:space-between;align-items:center;margin-bottom:18px}
.crud-header h2,.crud-box h2{color:#b71c1c}
.search-box{margin-bottom:14px}
.search-box input{width:100%;max-width:400px;padding:9px 13px;border:1px solid #ccc;border-radius:6px;font-size:.95em}
.table-responsive{overflow-x:auto}
table{width:100%;border-collapse:collapse}
th{background:#c62828;color:#fff;padding:11px 13px;text-align:left}
td{padding:9px 13px;border-bottom:1px solid #eee}
tr:hover td{background:#fce4ec}
.actions{display:flex;gap:6px}
/* BUTTONS */
.btn{display:inline-block;padding:9px 18px;border-radius:6px;text-decoration:none;border:none;cursor:pointer;font-size:.9em;font-weight:500;transition:opacity .2s}
.btn:hover{opacity:.85}
.btn-success{background:#2e7d32;color:#fff}
.btn-warning{background:#e65100;color:#fff}
.btn-danger{background:#c62828;color:#fff}
.btn-secondary{background:#607d8b;color:#fff}
.btn-sm{padding:5px 10px;font-size:.82em}
/* FORMS */
.form-group{margin-bottom:16px}
.form-group label{display:block;font-weight:600;margin-bottom:5px;color:#555}
.form-group input,.form-group select,.form-group textarea{width:100%;max-width:450px;padding:9px 12px;border:1px solid #ccc;border-radius:6px;font-size:.95em}
.form-group textarea{height:120px;resize:vertical}
.form-group small{color:#888;font-size:.82em}
.form-actions{display:flex;gap:10px;margin-top:20px}
.req{color:#c62828}
/* ALERTS */
.alert{padding:12px 16px;border-radius:6px;margin-bottom:16px}
.alert-danger{background:#ffebee;color:#c62828;border-left:4px solid #c62828}
.alert-success{background:#e8f5e9;color:#2e7d32;border-left:4px solid #2e7d32}
.alert-info{background:#e3f2fd;color:#1565c0;border-left:4px solid #1565c0}
/* GALLERY */
.gallery{display:flex;flex-wrap:wrap;gap:14px;margin-top:16px}
.gallery-item{width:260px;border-radius:8px;overflow:hidden;box-shadow:0 2px 8px rgba(0,0,0,.1);transition:box-shadow .3s}
.gallery-item:hover{box-shadow:0 6px 20px rgba(0,0,0,.2)}
.gallery-item img{width:100%;height:200;object-fit:cover;display:block;transition:transform .3s ease;cursor:pointer}
.gallery-item img:hover{transform:scale(1.08)}
.gallery-item p{padding:6px 8px;font-size:.82em;color:#555;background:#fff}
/* CONTACT FORM */
.contact-wrap{display:flex;gap:30px;flex-wrap:wrap}
.contact-info{flex:1;min-width:220px}
.contact-form{flex:2;min-width:280px}
/* VIDEO */
.video-wrap{display:flex;gap:20px;flex-wrap:wrap;margin:20px 0}
.video-wrap>div{flex:1;min-width:280px}
.video-wrap video,.video-wrap iframe{width:100%;border-radius:8px}
/* MAP */
.map-wrap{margin-top:20px;border-radius:8px;overflow:hidden}
/* FOOTER */
footer{background:#b71c1c;color:#fff;text-align:center;padding:14px;margin-top:50px;font-size:.9em}
@media(max-width:700px){nav{flex-direction:column}.crud-header{flex-direction:column;gap:10px}}
</style>
</head>
<body>
<header>
  <h1>🏎️ Forma-1 Adatbázis</h1>
  <div class="user-info">
    <?php if(isset($_SESSION['user'])): ?>
      Bejelentkezett: <strong><?=htmlspecialchars($_SESSION['user_fullname']??$_SESSION['user'])?></strong>
      (<?=htmlspecialchars($_SESSION['user'])?>)
    <?php endif; ?>
  </div>
</header>
<nav>
  <a href="index.php?url=fooldal">Főoldal</a>
  <a href="index.php?url=kepek">Képek</a>
  <a href="index.php?url=kapcsolat">Kapcsolat</a>
  <?php if(isset($_SESSION['user'])): ?>
    <a href="index.php?url=uzenetek">Üzenetek</a>
  <?php endif; ?>
  <a href="index.php?url=pilota/list">CRUD</a>
  <?php if(isset($_SESSION['user'])): ?>
    <a href="index.php?url=kilepes">Kilépés</a>
  <?php else: ?>
    <a href="index.php?url=belepes">Belépés</a>
  <?php endif; ?>
</nav>
<main>
