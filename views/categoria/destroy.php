<?php
    require "../../autoload.php";

    // Coletar o valor do id pela URL
    $id = $_GET['id'];

    // Instanciar um objeto da classe CategoriaDAO
    $dao = new CategoriaDAO();

    // Invocar o método para excluir
    $dao->destroy($id);

    // Redirecionar para o index
    header('Location: index.php');