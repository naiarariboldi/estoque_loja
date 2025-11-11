<!doctype html>
<html>
<head><meta charset="utf-8"><title>Home - Estoque</title><link rel="stylesheet" href="css/style.css"></head>
<body>
<div class="container">
  <h2>Bem-vindo, <?=htmlspecialchars($_SESSION['user_name'] ?? 'Usuário')?>!</h2>
  <p><a href="index.php?page=produtos">Ver produtos</a> | <a href="index.php?page=logout">Sair</a></p>
</div>
</body>
</html>
