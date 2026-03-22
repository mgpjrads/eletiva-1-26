<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercício 03 </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-3">
        <h1>Exercício 03 </h1>
        <form method="post">
            <?php
            for($i = 0; $i < 5; $i++)
            
                echo'<div class="mb-3">
                <label for="cod[]" class="form-label">Informe o código do produto</label>
                <input type="number" id="cod[]" name="cod[]" class="form-control" required="">
                </div>
                <div class="mb-3">
                <label for="prod[]" class="form-label">Informe o nome do produto:</label>
                <input type="text" id="prod[]" name="prod[]" class="form-control" required="">
                </div>
                <div class="mb-3">
                <label for="preco[]" class="form-label">Informe o preço do produto R$:</label>
                <input type="number" id="preco[]" name="preco[]" class="form-control" required="">
                </div>';
            
            ?>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
        <?php
            if ($_SERVER['REQUEST_METHOD'] == "POST")
            {
                $codigo = $_POST['cod'];
                $produto = $_POST['prod'];
                $preco = $_POST['preco'];

                $mapa = [];
                $mapaa = [];

                for ($i = 0; $i < 5; $i ++)
                {
                    $mapa[$codigo[$i]] = $produto[$i];
                    if ($preco[$i] > 100)
                    {
                        $preco[$i] = ($preco[$i] - ($preco[$i] * (20/100)));
                        $mapaa[$produto[$i]] = $preco[$i];
                    }
                    else
                        $mapaa[$produto[$i]] = $preco[$i];

                }
                
                foreach ($mapa as $chave => $valor) 
                {
                    echo "<p>Código: $chave - Produto:$valor - Preço: R$ " . number_format($mapaa[$valor], 2, ',', '.') . "</p>";
                    
                }
            }
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    </div>
</body>

</html>