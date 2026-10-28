<?php
    class Produtos {
        private $id;
        private $nome;
        private $preco;
        private $estoque;
        private $categoria; //Associação com a classe Categoria

        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function getNome() {
            return $this->nome;
        }

        public function setNome($nome) {
            $this->nome = $nome;
        }

        public function getPreco() {
            return $this->preco;
        }

        public function setPreco($preco) {
            $this->preco = $preco;
        }

        public function getEstoque() {
            return $this->estoque;
        }

        public function setEstoque($estoque) {
            $this->estoque = $estoque;
        }
        
        //Get e Set do atributo de associação
        public function getCategoria() {
            return $this->categoria;
        }

        public function setCategoria($categoria) {
            $this->categoria = $categoria;
        }
    }