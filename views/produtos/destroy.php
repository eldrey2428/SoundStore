<?php
    require "../../autoload.php";

    // Coletar o valor do id pela URL
    $id = $_GET['id'];

    // Instanciar um objeto da classe ProdutoDAO
    $dao = new ProdutosDAO();

    // Invocar o método para excluir
    $dao->destroy($id);

    // Redirecionar para o index
    header('Location: index.php');