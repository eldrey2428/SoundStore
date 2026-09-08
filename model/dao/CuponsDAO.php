<?php
    class CuponsDAO {
        public function read() {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM cupons");
                
                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }

                $listaCupons = array();
                foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                    $cupons = new Cupons(); // Classe bean
                    $cupons->setId($linha['id']);
                    $cupons->setCodigo($linha['codigo']);
                    $cupons->setDesconto($linha['desconto']);
                    $cupons->setValidade($linha['validade']);

                    array_push($listaCupons, $cupons);
                }
                
                return $listaCupons;
            } 
            catch(PDOException $e) {
                echo "Erro #2: " . $e->getMessage();
            }            
        }
    }