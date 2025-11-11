<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Login - Estoque</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
  <h2>Login</h2>
  <?php if(!empty($error)): ?><div class="error"><?=htmlspecialchars($error)?></div><?php endif; ?>
  <form method="post" action="index.php?page=login">
    <label>Email</label><br>
    <input type="email" name="email" required><br>
    <label>Senha</label><br>
    <input type="password" name="senha" required><br><br>
    <button type="submit" name="botão_entrar">Entrar</button>
  </form>
</div>
</body>
</html>
