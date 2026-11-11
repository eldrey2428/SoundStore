<?php
    //Incluir o arquivo de autoload
    require "../../autoload.php";

    //Instanciar um objeto da classe pedidos (bean)
    $pedidos = new Pedidos();

    //Definir os valores dos atributos a partir do form
    $pedidos->setDataPedido($_POST['dataPedido']);
    $pedidos->setStatus($_POST['status']);
    $pedidos->setValorTotal($_POST['valorTotal']);

    //Instanciar um objeto da classe Cliente
    $cliente = new Cliente();
    $cliente->setId($_POST['id_cliente']);

    //Definir o Cliente do Pedido
    $pedidos->setCliente($cliente);

    //Instanciar um objeto da classe CuponsDAO
    $cupons = new Cupons();
    $cupons->setId($_POST['id_cupons']);

    //Definir o Cupons do Pedido
    $pedidos->setCupons($cupons);

    //Instanciar um objeto da classe ProdutosDAO
    $produtos = new Produtos();
    $produtos->setId($_POST['id_produtos']);

    //Definir o Produtos do Pedido
    $pedidos->setProdutos($produtos);

    //Instanciar um objeto da classe PedidosDAO
    $dao = new PedidosDAO();

    //Instanciar o método create
    $dao->create($pedidos);

    //Redirecionar para o index (COMENTAR CASO NÃO FUNCIONE)
    header('location: index.php');