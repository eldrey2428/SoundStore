<?php
    require "../../autoload.php";

    // Instanciar um objeto da classe Pedidos (bean)
    $pedidos = new Pedidos();

    // Definir os valores dos atributos a partir dos dados do form
    $pedidos->setDataPedido($_POST['dataPedido']);
    $pedidos->setStatus($_POST['status']);
    $pedidos->setValorTotal($_POST['valorTotal']);
    $pedidos->setId($_POST['id']);

    // Instanciar um objeto da classe PedidosDAO
    $dao = new PedidosDAO();

    // Invocar o método update da classe PedidosDAO
    $dao->update($pedidos);

    // Redirecionar para o index
    header('Location: index.php');