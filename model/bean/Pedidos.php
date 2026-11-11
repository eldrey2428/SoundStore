<?php
    class Pedidos {
        private $id;
        private $dataPedido;
        private $status;
        private $valorTotal;
        private $cliente; //Associação com a classe Cliente
        private $cupons; //Associação com a classe Cupons
        private $produtos; //Associação com a classe Produtos

        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function getDataPedido() {
            return $this->dataPedido;
        }

        public function setDataPedido($dataPedido) {
            $this->dataPedido = $dataPedido;
        }

        public function getStatus() {
            return $this->status;
        }

        public function setStatus($status) {
            $this->status = $status;
        }

        public function getValorTotal() {
            return $this->valorTotal;
        }

        public function setValorTotal($valorTotal) {
            $this->valorTotal = $valorTotal;
        }
        
        //Get e Set do atributo de associação
        public function getCliente() {
            return $this->cliente;
        }

        public function setCliente($cliente) {
            $this->cliente = $cliente;
        }
        
        public function getCupons() {
            return $this->cupons;
        }

        public function setCupons($cupons) {
            $this->cupons = $cupons;
        }
        
        public function getProdutos() {
            return $this->produtos;
        }

        public function setProdutos($produtos) {
            $this->produtos = $produtos;
        }
    }