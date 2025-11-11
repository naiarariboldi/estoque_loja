<?php
require_once __DIR__ . '/../app/bootstrap.php';
require_once __DIR__ . '/../app/controllers/AuthController.php';
require_once __DIR__ . '/../app/controllers/ProdutoController.php';

$auth = new AuthController($pdo);
$prodCtrl = new ProdutoController($pdo);

// rota simples via query param 'page'
$page = $_GET['page'] ?? 'home';

// rotas públicas
if($page === 'login'){
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $email = $_POST['email'] ?? '';
        $senha = $_POST['senha'] ?? '';
        if($auth->login($email, $senha)){
            header('Location: index.php?page=produtos');
            exit;
        } else {
            $error = 'Credenciais inválidas';
            require __DIR__ . '/views/login.php';
        }
    } else {
        require __DIR__ . '/views/login.php';
    }
    exit;
}

if($page === 'logout'){
    $auth->logout();
    header('Location: index.php?page=login');
    exit;
}

// rotas protegidas
if(!AuthController::check()){
    header('Location: index.php?page=login');
    exit;
}

if($page === 'produtos'){
    $search = $_GET['search'] ?? null;
    $produtos = $prodCtrl->index($search);
    require __DIR__ . '/views/produtos_list.php';
    exit;
}

if($page === 'produtos_create'){
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        try{
            $prodCtrl->create($_POST);
            header('Location: index.php?page=produtos');
            exit;
        } catch (Exception $e){
            $error = $e->getMessage();
        }
    }
    require __DIR__ . '/views/produtos_form.php';
    exit;
}

if($page === 'produtos_edit'){
    $id = $_GET['id'] ?? null;
    if(!$id) header('Location: index.php?page=produtos');
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        try{
            $prodCtrl->edit($id, $_POST);
            header('Location: index.php?page=produtos');
            exit;
        } catch (Exception $e){
            $error = $e->getMessage();
        }
    }
    $produto = $prodCtrl->find($id);
    require __DIR__ . '/views/produtos_form.php';
    exit;
}

if($page === 'produtos_delete'){
    $id = $_GET['id'] ?? null;
    if($id){
        $prodCtrl->delete($id);
    }
    header('Location: index.php?page=produtos');
    exit;
}

if($page === 'export_csv'){
    $produtos = $prodCtrl->index();
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=produtos.csv');
    $out = fopen('php://output', 'w');
    fputcsv($out, ['ID','Nome','Categoria','Quantidade','Preco','Descricao','Criado Em']);
    foreach($produtos as $p) fputcsv($out, [$p['id'],$p['nome'],$p['categoria'],$p['quantidade'],$p['preco'],$p['descricao'],$p['criado_em']]);
    fclose($out);
    exit;
}

require __DIR__ . '/views/home.php';
