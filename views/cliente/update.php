<?php
    require "../../autoload.php";

    // Instanciar um objeto da classe Cliente (bean)
    $cliente = new Cliente();

    // Definir os valores dos atributos a partir dos dados do form
    $cliente->setNome($_POST['nome']);
    $cliente->setEmail($_POST['email']);
    $cliente->setCpf($_POST['cpf']);
    $cliente->setTelefone($_POST['telefone']);
    $cliente->setSenha($_POST['senha']);
    $cliente->setId($_POST['id']);

    // Instanciar um objeto da classe ClienteDAO
    $dao = new ClienteDAO();

    // Invocar o método update da classe ClienteDAO
    $dao->update($cliente);

    // Redirecionar para o index
    header('Location: index.php');