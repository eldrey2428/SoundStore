<?php
    //Incluir o arquivo de autoload
    require "../../autoload.php";

    //Instanciar um objeto da classe cliente (bean)
    $cliente = new Cliente();

    //Definir os valores dos atributos a partir do form
    $cliente->setNome($_POST['nome']);
    $cliente->setEmail($_POST['email']);
    $cliente->setCpf($_POST['cpf']);
    $cliente->setTelefone($_POST['telefone']);
    $cliente->setSenha($_POST['senha']);

    //Instanciar um objeto da classe ClienteDAO
    $dao = new ClienteDAO();

    //Instanciar o método create
    $dao->create($cliente);

    //Redirecionar para o index (COMENTAR CASO NÃO FUNCIONE)
    header('location: index.php');