<?php
    class CategoriaDAO {
        public function create($categoria) {
            try {
                $query = BD::getConexao()->prepare(
                    "INSERT INTO categorias(nome) 
                    VALUES (:n)"
                );
                $query->bindValue(':n', $categoria->getNome(), PDO::PARAM_STR);

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
                $query = BD::getConexao()->prepare("SELECT * FROM categorias");
                
                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }

                $listaCategorias = array();
                foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                    $categoria = new Categoria(); // Classe bean
                    $categoria->setId($linha['id']);
                    $categoria->setNome($linha['nome']);

                    array_push($listaCategorias, $categoria);
                }
                
                return $listaCategorias;
            } 
            catch(PDOException $e) {
                echo "Erro #2: " . $e->getMessage();
            }            
        }

         public function find($id) {
            try {
                $query = BD::getConexao()->prepare(
                    "SELECT * FROM categorias WHERE id = :i"
                );
                $query->bindValue(':i', $id, PDO::PARAM_INT);
                
                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }

                if($linha = $query->fetch(PDO::FETCH_ASSOC)) {
                    $categoria = new Categoria(); // Classe bean
                    $categoria->setId($linha['id']);
                    $categoria->setNome($linha['nome']);
                }
                
                return $categoria;
            } 
            catch(PDOException $e) {
                echo "Erro #3: " . $e->getMessage();
            }            
        }
        public function update($categoria) {
            try {
                $query = BD::getConexao()->prepare(
                    "UPDATE categorias(nome) 
                    SET nome = :n
                    WHERE id = :i"
                );
                $query->bindValue(':n', $categoria->getNome(), PDO::PARAM_STR);
                $query->bindValue(':i', $categoria->getId(), PDO::PARAM_STR);

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
                    "DELETE FROM categoria
                    WHERE id = :i"
                );
                $query->bindValue(':i', $categoria->getId(), PDO::PARAM_STR);

                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }
            }
            catch(PDOException $e) {
                echo "Erro #5: " . $e->getMessage();
            }
        }
    }