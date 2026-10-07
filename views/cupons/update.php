<?php
    require "../../autoload.php";

    // Instanciar um objeto da classe cupons (bean)
    $cupons = new Cupons();

    // Definir os valores dos atributos a partir dos dados do form
    $cupons->setCodigo($_POST['codigo']);
    $cupons->setDesconto($_POST['desconto']);
    $cupons->setValidade($_POST['validade']);
    $cupons->setId($_POST['id']);

    // Instanciar um objeto da classe CuponsDAO
    $dao = new CuponsDAO();

    // Invocar o método update da classe CuponsDAO
    $dao->update($cupons);

    // Redirecionar para o index
    header('Location: index.php');