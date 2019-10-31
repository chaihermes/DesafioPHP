<?php include_once("config/variaveis.php")?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="cadastroEstilizado.css" />
    <title>Produtos Cadastrados</title>
</head>

<body class="cadastro">
    <div>
        <!-- div pro botão -->
        <button type="submit" class="botaoCadastro card btn btn-light"><a class="ancoraCadastrados" href = "cadastroDeProduto.php">&#x2190 Voltar para a lista de produtos</a></button>
    </div>
    <div class="destaqueProduto card">
        <!--div que engloba a foto e as informações -->
        <div class="row ">
            <?php if(isset($produtos) && $produtos != []) { ?>
            <?php foreach ($produtos as $produto) { 
                if($_GET["id"] == $produto["id"]){
                ?>
            <div class="imgProduto col-md-4 img-fluid">
                <!--div pra imagem -->
                <img src="<?php echo $produto["fotoProduto"];?>" class="card-img" alt="imagemDoProduto" />
            </div>
            <div class="col-md-8">
                <!--div pras informações de texto -->
                <div class="card-body">
                    <h1><?php echo $produto["nomeProduto"] ?></h1>
                    <p><small class="text-mutted">Categoria </small></p>
                    <p><?php echo $produto["categoriaProduto"]?></p>
                    <p for="descricao"><small class="text-mutted">Descrição </small></p>
                    <p><?php echo $produto["descricaoProduto"]?></p>
                    <div class="row mt-5">
                        <div class="col-lg-5">
                            <p for="quantidade"><small class="text-mutted">Quantidade em estoque</small></p>
                            <p><?php echo $produto["quantidadeProduto"]?></p>
                        </div>
                        <div class="col-lg-5">
                            <p for="preco"><small class="text-mutted">Preço </small></p>
                            <p><b><?php echo "R$".$produto["precoProduto"]?></b></p>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <?php } ?>
                <?php } ?>

            </div>
        </div>
</body>

</html>