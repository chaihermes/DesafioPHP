


<?php
    function cadastrarProdutos($nomeProduto, $categoriaProduto, $descricaoProduto, $quantidadeProduto, $precoProduto, $fotoProduto){
        $nomeArquivo = "cadastro.json";
        if(file_exists($nomeArquivo)){
            $arquivo = file_get_contents($nomeArquivo);
            $produtos = json_decode($arquivo, true);

            //criando o id dinâmico, assim para cada produto, abre uma nova página.
            if($produtos==[]){
            $produtos[] = ["id" => 1, "nomeProduto" => $nomeProduto, "categoriaProduto" => $categoriaProduto, "descricaoProduto" => $descricaoProduto, "quantidadeProduto" => $quantidadeProduto, "precoProduto" => $precoProduto, "fotoProduto" => $fotoProduto];
            } else {
                //o end retorna o último item do array. Depois soma 1 ao último id na lista de produtos já cadastrados, tornando o id dinâmico mesmo quando já se tem produtos cadastrados.
                $ultimoId = end($produtos);
                $acrescentandoId = $ultimoId["id"] + 1;
                $produtos[] = ["id" => $acrescentandoId, "nomeProduto" => $nomeProduto, "categoriaProduto" => $categoriaProduto, "descricaoProduto" => $descricaoProduto, "quantidadeProduto" => $quantidadeProduto, "precoProduto" => $precoProduto, "fotoProduto" => $fotoProduto];
            }



            $json = json_encode($produtos);
            $funcionou = file_put_contents($nomeArquivo, $json);
            if($funcionou){
                return "Produto cadastrado com sucesso";
            } else {
                return "Não foi possível cadastrar o produto";
            }
        } else {
            //id dinâmico para quando não tem nenhum produto cadastrado.
            $produtos = [];
            $produtos[] = ["id" => 1, "nomeProduto" => $nomeProduto, "categoriaProduto" => $categoriaProduto, "descricaoProduto" => $descricaoProduto, "quantidadeProduto" => $quantidadeProduto, "precoProduto" => $precoProduto, "fotoProduto" => $fotoProduto];
            $json = json_encode($produtos);
            $funcionou = file_put_contents($nomeArquivo, $json);
            if($funcionou){
                return "Produto cadastrado com sucesso";
            } else {
                return "Não foi possível cadastrar o produto";
            }
        }
    }
    if($_POST){
        $nomeFoto = $_FILES['fotoProduto']['name'];
        $localTmp = $_FILES['fotoProduto']['tmp_name'];
        $caminhoSalvo = 'imagens/'.$nomeFoto;
        
        $funcionou = move_uploaded_file($localTmp, $caminhoSalvo);
        echo cadastrarProdutos($_POST['nomeProduto'], $_POST['categoriaProduto'], $_POST['descricaoProduto'], $_POST['quantidadeProduto'], $_POST['precoProduto'], $caminhoSalvo);
    }

    ?>

<?php include_once("config/variaveis.php")?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="cadastroEstilizado.css" />
    <title>Cadastro de Produtos</title>
</head>

<body>
    <main class="container row ">
        <!-- Lista de novos produtos cadastrados -->
        <section class="col-lg-7 col-md-6 col-sm-6 col-xs-6 p-5">
            <table class="table">
            <h2 class="titulo p-2 mb-4">Todos os produtos</h2>
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Preço</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(isset($produtos) && $produtos != []) { ?>
                        <?php foreach ($produtos as $produto) { ?>
                            <tr>
                                <!-- pra cada produto cadastrado, mostra uma tabela com nome, categoria e preço, sendo o nome um link que abre uma página nova pra cada produto -->
                                <td><a href = "produtosCadastrados.php?id=<?php echo $produto["id"];?>"> <?php echo $produto["nomeProduto"];?></td>
                                <td><?php echo $produto["categoriaProduto"];?></td>
                                <td><?php echo "R$".$produto["precoProduto"];?></td>
                            </tr>
                        <?php } ?>
                    <?php }?>    
                </tbody>
            </table>
        </section>
        <!-- Formulário de cadastro de novos produtos -->
        <section class="formulario card col-lg-5 p-5">
            <form action="" method="POST" enctype="multipart/form-data">
                <div>
                    <h4>Cadastrar produto</h4>
                    <hr />
                </div>
                <div class="form-group">
                    <label for="nomeProduto">Nome</label>
                    <input type="text" class="form-control" name="nomeProduto" id="nomeProduto" required>
                </div>
                <div class="form-group">
                    <label for="categoria">Categoria</label>
                    <select class="form-control" name="categoriaProduto" id="categoria" required>
                        <option>Selecione uma categoria</option>
                        <option>cervejas</option>
                        <option>copos</option>
                        <option>quadros</option>
                        <option>abridores de parede</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <textarea class="form-control" name="descricaoProduto" id="descricao" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="quantidade">Quantidade</label>
                    <input type="number" class="form-control" name="quantidadeProduto" id="quantidade" required>
                </div>
                <div class="form-group">
                    <label for="preco">Preço</label>
                    <input type="number" class="form-control" name="precoProduto"  min = "0" value = "0" step = "0.01" id="preco" required>
                </div>
                <div class="form-group">
                    <label for="foto">Foto do produto</label>
                    <input type="file" class="form-control-file" name="fotoProduto" id="foto" required>
                </div>
                <button type="submit" class="botao btn btn-primary">Enviar</button>
            </form>
        </section>
    </main>
</body>

</html>