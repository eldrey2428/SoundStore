<?php
    //Incluir o arquivo de autoload
    require "../../autoload.php";

    //Instanciar um objeto da classe produtos (bean)
    $produtos = new Produtos();

    //Definir os valores dos atributos a partir do form
    $produtos->setNome($_POST['nome']);
    $produtos->setPreco($_POST['preco']);
    $produtos->setEstoque($_POST['estoque']);

    //Instanciar um objeto da Categoria
    $categoria = new Categoria();
    $categoria->setId($_POST['id_categoria']);

    //Definir a Categoria do Produto
    $produtos->setCategoria($categoria);

    //Instanciar um objeto da classe ProdutosDAO
    $dao = new ProdutosDAO();

    //Instanciar o método create
    $dao->create($produtos);

    //Redirecionar para o index (COMENTAR CASO NÃO FUNCIONE)
    header('location: index.php');