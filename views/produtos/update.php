<?php
    require "../../autoload.php";

    // Instanciar um objeto da classe Produtos (bean)
    $produtos = new Produtos();

    // Definir os valores dos atributos a partir dos dados do form
    $produtos->setNome($_POST['nome']);
    $produtos->setPreco($_POST['preco']);
    $produtos->setEstoque($_POST['estoque']);
    $produtos->setId($_POST['id']);

    // Instanciar um objeto da classe ProdutosDAO
    $dao = new ProdutosDAO();

    // Invocar o método update da classe ProdutosDAO
    $dao->update($produtos);

    // Redirecionar para o index
    header('Location: index.php');