<?php
    class ProdutosDAO {
        public function create($produtos) {
            try {
                $query = BD::getConexao()->prepare(
                    "INSERT INTO produtos (nome, preco, estoque, id_categoria) 
                    VALUES (:n, :p, :e, :c)"
                );
                $query->bindValue(':n', $produtos->getNome(), PDO::PARAM_STR);
                $query->bindValue(':p', $produtos->getPreco(), PDO::PARAM_STR);
                $query->bindValue(':e', $produtos->getEstoque(), PDO::PARAM_STR);
                // Bind para a chave estrangeira
                $query->bindValue(':c', $produtos->getCategoria()->getId(), PDO::PARAM_INT);

                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }
            }
            catch(PDOException $e) {
                echo "Erro #1: " . $e->getMessage();
            }
        }

        public function read() {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM produtos");
                
                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }

                $listaProdutos = array();
                foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                    $produtos = new Produtos(); // Classe bean
                    $produtos->setId($linha['id']);
                    $produtos->setNome($linha['nome']);
                    $produtos->setPreco($linha['preco']);
                    $produtos->setEstoque($linha['estoque']);
                    // Atributo da associação
                    $daoCategoria = new CategoriaDAO();
                    $categoria = $daoCategoria->find($linha['id_categoria']);
                    $produtos->setCategoria($categoria);

                    array_push($listaProdutos, $produtos);
                }
                
                return $listaProdutos;
            } 
            catch(PDOException $e) {
                echo "Erro #2: " . $e->getMessage();
            }            
        }

         public function find($id) {
            try {
                $query = BD::getConexao()->prepare(
                    "SELECT * FROM produtos WHERE id = :i"
                );
                $query->bindValue(':i', $id, PDO::PARAM_INT);
                
                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }

                if($linha = $query->fetch(PDO::FETCH_ASSOC)) {
                    $produtos = new Produtos(); // Classe bean
                    $produtos->setId($linha['id']);
                    $produtos->setNome($linha['nome']);
                    $produtos->setPreco($linha['preco']);
                    $produtos->setEstoque($linha['estoque']);

                }
                
                return $produtos;
            } 
            catch(PDOException $e) {
                echo "Erro #3: " . $e->getMessage();
            }            
        }
        public function update($produtos) {
            try {
                $query = BD::getConexao()->prepare(
                    "UPDATE produtos
                    SET nome = :n, preco = :p, estoque = :e
                    WHERE id = :i"
                );
                $query->bindValue(':n', $produtos->getNome(), PDO::PARAM_STR);
                $query->bindValue(':p', $produtos->getPreco(), PDO::PARAM_STR);
                $query->bindValue(':e', $produtos->getEstoque(), PDO::PARAM_STR);
                $query->bindValue(':i', $produtos->getId(), PDO::PARAM_STR);

                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }
            }
            catch(PDOException $e) {
                echo "Erro #4: " . $e->getMessage();
            }
        }

        public function destroy($id) {
            try {
                $query = BD::getConexao()->prepare(
                    "DELETE FROM produtos
                    WHERE id = :i"
                );
                $query->bindValue(':i', $id, PDO::PARAM_STR);

                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }
            }
            catch(PDOException $e) {
                echo "Erro #5: " . $e->getMessage();
            }
        }
    }