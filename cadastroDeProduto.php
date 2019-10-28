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
    <main class="container row">
        <!-- Lista de novos produtos cadastrados -->
        <section class="col-lg-7 col-md-6 col-sm-6 col-xs-6 p-3">
            <h2 class="titulo p-3">Todos os produtos</h2>
            <table class="p-3">
                <tr class="p-2">
                    <th class="p-2">Nome</th>
                    <th class="p-2">Categoria</th>
                    <th class="p-2" >Preço</th>
                </tr>
            </table>

            <!-- <ul class="list-group list-group-flush list-group-horizontal">
                <li class="list-group-item">Nome</li>
                <li class="list-group-item">Categoria</li>
                <li class="list-group-item">Preço</li>
            </ul>
            <ul class="list-group list-group-flush list-group-horizontal">
                <li class="list-group-item">Nome</li>
                <li class="list-group-item">Categoria</li>
                <li class="list-group-item">Preço</li>
            </ul>
            <ul class="list-group list-group-flush list-group-horizontal">
                <li class="list-group-item">Nome</li>
                <li class="list-group-item">Categoria</li>
                <li class="list-group-item">Preço</li>
            </ul> -->
        </section>
        <!-- Formulário de cadastro de novos produtos -->
        <section class="card col-lg-5 col-md-6 col-sm-6 col-xs-6 p-5">
            <form action="" method="">
                <div>
                    <h3>Cadastrar produto</h3><hr />
                </div>
                <div class="form-group">
                    <label for="nomeProduto">Nome</label>
                    <input type="text" class="form-control" name="nomeProduto" id="nomeProduto">
                </div>
                <div class="form-group">
                    <label for="categoria">Categoria</label>
                    <select class="form-control" name="categoriaProduto" id="categoria">
                        <option>Selecione uma categoria</option>
                        <option>camiseta</option>
                        <option>caneca</option>
                        <option>boné</option>
                        <option>moletom</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <textarea class="form-control" name="descricaoProduto" id="descricao" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="quantidade">Quantidade</label>
                    <input type="number" class="form-control" name="quantidadeProduto" id="quantidade">
                </div>
                <div class="form-group">
                    <label for="preco">Preço</label>
                    <input type="number" class="form-control" name="precoProduto" id="preco">
                </div>
                <div class="form-group">
                    <label for="foto">Foto do produto</label>
                    <input type="file" class="form-control-file" name="fotoProduto" id="foto">
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </section>
    </main>
</body>

</html>