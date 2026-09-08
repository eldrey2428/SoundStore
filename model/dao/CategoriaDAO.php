<?php
    class CategoriaDAO {
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
    }