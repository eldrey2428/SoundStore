<?php
    require "../../autoload.php";

    // Instanciar um objeto da classe Pedidos (bean)
    $pedidos = new Pedidos();

    // Definir os valores dos atributos a partir dos dados do form
    $pedidos->setDataPedido($_POST['dataPedido']);
    $pedidos->setStatus($_POST['status']);
    $pedidos->setValorTotal($_POST['valorTotal']);
    $pedidos->setId($_POST['id']);

    // Instanciar um objeto da classe Cliente
    $cliente = new Cliente();
    $cliente->setId($_POST['id_cliente']);

    // Definir o Cliente do Pedido
    $pedidos->setCliente($cliente);

    // Instanciar um objeto da classe Cupons
    $cupons = new Cupons();
    $cupons->setId($_POST['id_cupons']);

    // Definir o Cupons do Pedido
    $pedidos->setCupons($cupons);

    // Instanciar um objeto da classe Produtos
    $produtos = new Produtos();
    $produtos->setId($_POST['id_produtos']);

    // Definir o Produtos do Pedido
    $pedidos->setProdutos($produtos);

    // Instanciar um objeto da classe PedidosDAO
    $dao = new PedidosDAO();

    // Invocar o método update da classe PedidosDAO
    $dao->update($pedidos);

    // Redirecionar para o index
    header('Location: index.php');