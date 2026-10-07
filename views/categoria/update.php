<?php
    require "../../autoload.php";

    // Instanciar um objeto da classe Categoria (bean)
    $categoria = new Categoria();

    // Definir os valores dos atributos a partir dos dados do form
    $categoria->setNome($_POST['nome']);
    $categoria->setId($_POST['id']);

    // Instanciar um objeto da classe CategoriaDAO
    $dao = new CategoriaDAO();

    // Invocar o método update da classe CategoriaDAO
    $dao->update($categoria);

    // Redirecionar para o index
    header('Location: index.php');