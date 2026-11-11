<?php
    class PedidosDAO {
        public function create($pedidos) {
            try {
                $query = BD::getConexao()->prepare(
                    "INSERT INTO pedidos (data_pedido, status, valor_total, id_cliente, id_cupons, id_produtos) 
                    VALUES (:d, :s, :v, :c, :u, :p)"
                );
                $query->bindValue(':d', $pedidos->getDataPedido(), PDO::PARAM_STR);
                $query->bindValue(':s', $pedidos->getStatus(), PDO::PARAM_STR);
                $query->bindValue(':v', $pedidos->getValorTotal(), PDO::PARAM_STR);
                // Bind para a chave estrangeira
                $query->bindValue(':c', $pedidos->getCliente()->getId(), PDO::PARAM_INT);
                $query->bindValue(':u', $pedidos->getCupons()->getId(), PDO::PARAM_INT);
                $query->bindValue(':p', $pedidos->getProdutos()->getId(), PDO::PARAM_INT);

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
                $query = BD::getConexao()->prepare("SELECT * FROM pedidos");
                
                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }

                $listaPedidos = array();
                foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                    $pedidos = new Pedidos(); // Classe bean
                    $pedidos->setId($linha['id']);
                    $pedidos->setDataPedido($linha['data_pedido']);
                    $pedidos->setStatus($linha['status']);
                    $pedidos->setValorTotal($linha['valor_total']);
                    // Atributo da associação
                    $daoCliente = new ClienteDAO();
                    $cliente = $daoCliente->find($linha['id_cliente']);
                    $pedidos->setCliente($cliente);
                    
                    $daoCupons = new CuponsDAO();
                    $cupons = $daoCupons->find($linha['id_cupons']);
                    $pedidos->setCupons($cupons);
                    
                    $daoProdutos = new ProdutosDAO();
                    $produtos = $daoProdutos->find($linha['id_produtos']);
                    $pedidos->setProdutos($produtos);
                }
                
                return $pedidos;
            } 
            catch(PDOException $e) {
                echo "Erro #2: " . $e->getMessage();
            }            
        }

        public function find($id) {
            try {
                $query = BD::getConexao()->prepare(
                    "SELECT * FROM pedidos WHERE id = :i"
                );
                $query->bindValue(':i', $id, PDO::PARAM_INT);
                
                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }

                if($linha = $query->fetch(PDO::FETCH_ASSOC)) {
                    $pedidos = new Pedidos(); // Classe bean
                    $pedidos->setId($linha['id']);
                    $pedidos->setDataPedido($linha['data_pedido']);
                    $pedidos->setStatus($linha['status']);
                    $pedidos->setValorTotal($linha['valor_total']);

                }
                
                return $pedidos;
            } 
            catch(PDOException $e) {
                echo "Erro #3: " . $e->getMessage();
            }            
        }
        public function update($pedidos) {
            try {
                $query = BD::getConexao()->prepare(
                    "UPDATE pedidos
                    SET data_pedido = :d, status = :s, valor_total = :v
                    WHERE id = :i"
                );
                $query->bindValue(':d', $pedidos->getDataPedido(), PDO::PARAM_STR);
                $query->bindValue(':s', $pedidos->getStatus(), PDO::PARAM_STR);
                $query->bindValue(':v', $pedidos->getValorTotal(), PDO::PARAM_STR);
                $query->bindValue(':i', $pedidos->getId(), PDO::PARAM_STR);

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
                    "DELETE FROM pedidos
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