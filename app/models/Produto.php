<?php
class Produto {
    private $pdo;
    public function __construct($pdo){ $this->pdo = $pdo; }

    public function all($search = null){
        if($search){
            $stmt = $this->pdo->prepare('SELECT * FROM produtos WHERE nome LIKE ? OR categoria LIKE ? ORDER BY id DESC');
            $like = "%$search%";
            $stmt->execute([$like, $like]);
        } else {
            $stmt = $this->pdo->query('SELECT * FROM produtos ORDER BY id DESC');
        }
        return $stmt->fetchAll();
    }

    public function find($id){
        $stmt = $this->pdo->prepare('SELECT * FROM produtos WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function create($data){
        $stmt = $this->pdo->prepare('INSERT INTO produtos (nome,categoria,quantidade,preco,descricao) VALUES (?,?,?,?,?)');
        return $stmt->execute([$data['nome'],$data['categoria'],$data['quantidade'],$data['preco'],$data['descricao']]);
    }

    public function update($id, $data){
        $stmt = $this->pdo->prepare('UPDATE produtos SET nome=?, categoria=?, quantidade=?, preco=?, descricao=? WHERE id=?');
        return $stmt->execute([$data['nome'],$data['categoria'],$data['quantidade'],$data['preco'],$data['descricao'],$id]);
    }

    public function delete($id){
        $stmt = $this->pdo->prepare('DELETE FROM produtos WHERE id = ?');
        return $stmt->execute([$id]);
    }
}
