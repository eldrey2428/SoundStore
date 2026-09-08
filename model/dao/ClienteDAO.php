<?php
    class ClienteDAO {
        public function read() {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM clientes");
                
                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }

                $listaClientes = array();
                foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                    $cliente = new Cliente(); // Classe bean
                    $cliente->setId($linha['id']);
                    $cliente->setNome($linha['nome']);
                    $cliente->setEmail($linha['email']);
                    $cliente->setCpf($linha['cpf']);
                    $cliente->setTelefone($linha['telefone']);
                    $cliente->setSenha($linha['senha']);

                    array_push($listaClientes, $cliente);
                }
                
                return $listaClientes;
            } 
            catch(PDOException $e) {
                echo "Erro #2: " . $e->getMessage();
            }            
        }
    }