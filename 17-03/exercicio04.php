<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercício 4</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-3">
        <h1>Exercício 4</h1>
        <form method="post">
            <div class="mb-3">
                <label for="produto[]" class="form-label">Digite o nome do produto</label>
                <input type="text" id="produto[]" name="produto[]" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="preco[]" class="form-label">Digite o preço R$:</label>
                <input type="number" id="preco[]" name="preco[]" class="form-control" required="" step="any">
            </div>

            <div class="mb-3">
                <label for="produto[]" class="form-label">Digite o nome do produto</label>
                <input type="text" id="produto[]" name="produto[]" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="preco[]" class="form-label">Digite o preço R$:</label>
                <input type="number" id="preco[]" name="preco[]" class="form-control" required="" step="any">
            </div>

            <div class="mb-3">
                <label for="produto[]" class="form-label">Digite o nome do produto</label>
                <input type="text" id="produto[]" name="produto[]" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="preco[]" class="form-label">Digite o preço R$:</label>
                <input type="number" id="preco[]" name="preco[]" class="form-control" required="" step="any">
            </div>

            <div class="mb-3">
                <label for="produto[]" class="form-label">Digite o nome do produto</label>
                <input type="text" id="produto[]" name="produto[]" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="preco[]" class="form-label">Digite o preço R$:</label>
                <input type="number" id="preco[]" name="preco[]" class="form-control" required="" step="any">
            </div>

            <div class="mb-3">
                <label for="produto[]" class="form-label">Digite o nome do produto</label>
                <input type="text" id="produto[]" name="produto[]" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="preco[]" class="form-label">Digite o preço R$:</label>
                <input type="number" id="preco[]" name="preco[]" class="form-control" required="" step="any">
            </div>

            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
        <?php
            if($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                $produto = $_POST['produto'];
                $preco = $_POST['preco'];

                $mapa = array_combine($produto, $preco);

                echo "Mapa sem imposto";
                echo "<p></p>";
                print_r($mapa);
                echo "<p></p>";
                foreach($mapa as $chave => $valor)
                    echo "<p>Produto: $chave - Preço: R$ $valor</p>";

                echo "<p>Mapa com imposto</p>";

                $novoPreco = [];

                for ($i = 0; $i < 5; $i++)
                {
                    $novoPreco[$i] = $preco[$i] * 1.15;
                }

                $novoMapa = array_combine($produto, $novoPreco);
                asort($novoMapa);
                echo"<p></p>";
                print_r($novoMapa);
                echo"<p></p>";
                foreach($novoMapa as $chave => $valor)
                    echo "<p>Produto: $chave - Preço: R$". number_format($valor, 2, ",", "."). "</p>";
            }
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    </div>
</body>

</html>