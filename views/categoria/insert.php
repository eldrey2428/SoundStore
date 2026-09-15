<?php
    //Incluir o arquivo de autoload
    require "../../autoload.php";

    //Instanciar um objeto da classe categoria (bean)
    $categoria = new Categoria();

    //Definir os valores dos atributos a partir do form
    $categoria->setNome($_POST['nome']);

    //Instanciar um objeto da classe CategoriaDAO
    $dao = new CategoriaDAO();

    //Instanciar o método create
    $dao->create($categoria);

    //Redirecionar para o index (COMENTAR CASO NÃO FUNCIONE)
    header('location: index.php');