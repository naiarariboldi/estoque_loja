<!doctype html>
<html>
<head><meta charset="utf-8"><title>Produtos - Estoque</title><link rel="stylesheet" href="css/style.css"></head>
<body>
<div class="container">
  <h2>Produtos</h2>
  <p>Usuário: <?=htmlspecialchars($_SESSION['user_name'])?> | <a href="index.php?page=logout">Sair</a></p>
  <form method="get" action="index.php">
    <input type="hidden" name="page" value="produtos">
    <input type="text" name="search" placeholder="Buscar nome ou categoria" value="<?=htmlspecialchars($_GET['search'] ?? '')?>">
    <button type="submit">Buscar</button>
    <a href="index.php?page=produtos_create">Novo produto</a>
    <a href="index.php?page=export_csv">Exportar CSV</a>
  </form>

  <?php if(empty($produtos)): ?>
    <p>Nenhum produto encontrado.</p>
  <?php else: ?>
    <table class="table">
      <thead><tr><th>ID</th><th>Nome</th><th>Categoria</th><th>Qtd</th><th>Preço</th><th>Ações</th></tr></thead>
      <tbody>
        <?php foreach($produtos as $p): ?>
          <tr>
            <td><?=htmlspecialchars($p['id'])?></td>
            <td><?=htmlspecialchars($p['nome'])?></td>
            <td><?=htmlspecialchars($p['categoria'])?></td>
            <td><?=htmlspecialchars($p['quantidade'])?></td>
            <td><?=number_format($p['preco'],2,',','.')?></td>
            <td>
              <a href="index.php?page=produtos_edit&id=<?= $p['id'] ?>">Editar</a> |
              <a href="index.php?page=produtos_delete&id=<?= $p['id'] ?>" onclick="return confirm('Excluir?')">Excluir</a>
            </td>
          </tr>
        <?php endforeach;?>
      </tbody>
    </table>
  <?php endif; ?>
  <p><a href="index.php">Voltar</a></p>
</div>
</body>
</html>
