<?php
require_once '../src/funcoes-fabricantes.php';
require_once '../src/funcoes-produtos.php';
$listaDeFabricantes = lerFabricantes($conexao);

// Pegando o valor do id e sanitizando
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

// Chamando a função e recebendo os dados do produto
$produto = lerUmProduto($conexao, $id);

dump($produto);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - Atualizar</title>
</head>
<body>
    <div class="container">
        <h1>Produtos | SELECT/UPDATE</h1>
        <hr>

        <form action="" method="post">
            <p>
                <label for="nome">Nome:</label>
                <input value="<?=$produto['nome']?>" type="text" name="nome" id="nome" required>
            </p>

            <p>
                <label for="preco">Preço:</label>
                <input type="number" name="preco" id="preco" 
                min="0" max="10000" step="0.01" required>
            </p>    

            <p>
                <label for="quantidade">Quantidade:</label>
                <input type="number" name="quantidade" id="quantidade" 
                min="0" max="100" required>
            </p>    
            <p>
                <label for="fabricante">Fabricante:</label>
        <select name="fabricante" id="fabricante" required>
            <option value=""></option>
            <?php foreach($listaDeFabricantes as $fabricante) { ?>
                <option value="<?=$fabricante['id']?>">
                    <?=$fabricante['nome']?>
                </option>
            <?php } ?>
        </select>
            </p>
            <p>
                <label for="descricao">Descrição:</label> <br>
                <textarea required name="descricao" id="descricao" cols="30" rows="3"><?=$produto['descricao']?></textarea>
            </p>
            <button type="submit" name="atualizar">
                Atualizar produto</button>
        </form>

        <p><a href="listar.php">
        Voltar para lista de produtos</a></p>

        <p><a href="../index.php">Home</a></p>
    </div>
</body>
</html>