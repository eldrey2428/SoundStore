<?php
    //Incluir o arquivo de autoload
    require "../../autoload.php";

    //Instanciar um objeto da classe cupons (bean)
    $cupons = new Cupons();

    //Definir os valores dos atributos a partir do form
    $cupons->setCodigo($_POST['codigo']);
    $cupons->setDesconto($_POST['desconto']);
    $cupons->setValidade($_POST['validade']);

    //Instanciar um objeto da classe CuponsDAO
    $dao = new CuponsDAO();

    //Instanciar o método create
    $dao->create($cupons);

    //Redirecionar para o index (COMENTAR CASO NÃO FUNCIONE)
    header('location: index.php');