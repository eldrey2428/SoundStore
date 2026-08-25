<?php
    class Cupons {
        private $id;
        private $codigo;
        private $desconto;
        private $validade;

        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function getCodigo() {
            return $this->codigo;
        }

        public function setCodigo($codigo) {
            $this->codigo = $codigo;
        }

        public function getDesconto() {
            return $this->desconto;
        }

        public function setDesconto($desconto) {
            $this->desconto = $desconto;
        }

        public function getValidade() {
            return $this->validade;
        }

        public function setValidade($validade) {
            $this->validade = $validade;
        }
    }