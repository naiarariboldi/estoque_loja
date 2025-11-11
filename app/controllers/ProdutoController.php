<?php
require_once __DIR__.'/../models/Produto.php';
class ProdutoController {
    private $pdo;
    public function __construct($pdo){ $this->pdo = $pdo; $this->model = new Produto($pdo); }

    public function index($search = null){
        return $this->model->all($search);
    }

    public function create($data){
        // basic server-side validation
        if(empty($data['nome'])) throw new Exception('Nome é obrigatório');
        return $this->model->create($data);
    }

    public function edit($id, $data){
        if(empty($data['nome'])) throw new Exception('Nome é obrigatório');
        return $this->model->update($id, $data);
    }

    public function delete($id){
        return $this->model->delete($id);
    }

    public function find($id){
        return $this->model->find($id);
    }
}

