<!doctype html>
<html>
<head><meta charset="utf-8"><title>Produto - Estoque</title><link rel="stylesheet" href="css/style.css"></head>
<body>
<div class="container">
  <h2><?= isset($produto) ? 'Editar' : 'Novo' ?> Produto</h2>
  <?php if(!empty($error)): ?><div class="error"><?=htmlspecialchars($error)?></div><?php endif; ?>
  <form method="post" action="">
    <label>Nome</label><br>
    <input type="text" name="nome" required value="<?=htmlspecialchars($produto['nome'] ?? '')?>"><br>
    <label>Categoria</label><br>
    <input type="text" name="categoria" value="<?=htmlspecialchars($produto['categoria'] ?? '')?>"><br>
    <label>Quantidade</label><br>
    <input type="number" name="quantidade" value="<?=htmlspecialchars($produto['quantidade'] ?? 0)?>"><br>
    <label>Preço</label><br>
    <input type="text" name="preco" value="<?=htmlspecialchars($produto['preco'] ?? '0.00')?>"><br>
    <label>Descrição</label><br>
    <textarea name="descricao"><?=htmlspecialchars($produto['descricao'] ?? '')?></textarea><br><br>
    <button type="submit"><?= isset($produto) ? 'Atualizar' : 'Cadastrar' ?></button>
    <a href="index.php?page=produtos">Cancelar</a>
  </form>
</div>
</body>
</html>
