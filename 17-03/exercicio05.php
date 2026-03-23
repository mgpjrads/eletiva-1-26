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
                <label for="titulo[]" class="form-label">Informe o título do livro:</label>
                <input type="text" id="titulo[]" name="titulo[]" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="qtde[]" class="form-label">Informe a quantidade em estoque: </label>
                <input type="number" id="qtde[]" name="qtde[]" class="form-control" required="">
            </div>

            <div class="mb-3">
                <label for="titulo[]" class="form-label">Informe o título do livro:</label>
                <input type="text" id="titulo[]" name="titulo[]" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="qtde[]" class="form-label">Informe a quantidade em estoque: </label>
                <input type="number" id="qtde[]" name="qtde[]" class="form-control" required="">
            </div>

            <div class="mb-3">
                <label for="titulo[]" class="form-label">Informe o título do livro:</label>
                <input type="text" id="titulo[]" name="titulo[]" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="qtde[]" class="form-label">Informe a quantidade em estoque: </label>
                <input type="number" id="qtde[]" name="qtde[]" class="form-control" required="">
            </div>

            <div class="mb-3">
                <label for="titulo[]" class="form-label">Informe o título do livro:</label>
                <input type="text" id="titulo[]" name="titulo[]" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="qtde[]" class="form-label">Informe a quantidade em estoque: </label>
                <input type="number" id="qtde[]" name="qtde[]" class="form-control" required="">
            </div>

            <div class="mb-3">
                <label for="titulo[]" class="form-label">Informe o título do livro:</label>
                <input type="text" id="titulo[]" name="titulo[]" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="qtde[]" class="form-label">Informe a quantidade em estoque: </label>
                <input type="number" id="qtde[]" name="qtde[]" class="form-control" required="">
            </div>


            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
        <?php
            if($_SERVER['REQUEST_METHOD'] == "POST")
            {
                $livros = $_POST['titulo'];
                $qtde = $_POST['qtde'];

                $mapa = array_combine($livros, $qtde);

                ksort($mapa);

                foreach($mapa as $chave => $valor)
                {
                    echo "<p>O título: $chave, Possui $valor em estoque</p>";
                } 
            }
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    </div>
</body>

</html>