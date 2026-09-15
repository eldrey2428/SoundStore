<?php
    class ClienteDAO {
        public function create($cliente) {
            try {
                $query = BD::getConexao()->prepare(
                    "INSERT INTO clientes(nome, email, cpf, telefone, senha) 
                    VALUES (:n, :e, :c, :t, :s)"
                );
                $query->bindValue(':n', $cliente->getNome(), PDO::PARAM_STR);
                $query->bindValue(':e', $cliente->getEmail(), PDO::PARAM_STR);
                $query->bindValue(':c', $cliente->getCpf(), PDO::PARAM_STR);
                $query->bindValue(':t', $cliente->getTelefone(), PDO::PARAM_STR);
                $query->bindValue(':s', $cliente->getSenha(), PDO::PARAM_STR);

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