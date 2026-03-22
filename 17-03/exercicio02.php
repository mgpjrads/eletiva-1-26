<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercício 2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-3">
        <h1>Exercício 2</h1>
        <form method="post">

            <div class="mb-3">
                <label for="nome[]" class="form-label">Digite o nome do primeiro aluno:</label>
                <input type="text" id="nome[]" name="nome[]" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="p1[]" class="form-label">Digite a nota da p1:</label>
                <input type="number" id="p1[]" name="p1[]" class="form-control" required="" step="any">
            </div>
            <div class="mb-3">
                <label for="p2[]" class="form-label">Digite a nota da p2:</label>
                <input type="number" id="p2[]" name="p2[]" class="form-control" required="" step="any">
            </div>
            <div class="mb-3">
                <label for="p3[]" class="form-label">Digite a nota da p3:</label>
                <input type="number" id="p3[]" name="p3[]" class="form-control" required="" step="any">
            </div>

            <div class="mb-3">
                <label for="nome[]" class="form-label">Digite o nome do segundo aluno:</label>
                <input type="text" id="nome[]" name="nome[]" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="p1[]" class="form-label">Digite a nota da p1:</label>
                <input type="number" id="p1[]" name="p1[]" class="form-control" required="" step="any">
            </div>
            <div class="mb-3">
                <label for="p2[]" class="form-label">Digite a nota da p2:</label>
                <input type="number" id="p2[]" name="p2[]" class="form-control" required="" step="any">
            </div>
            <div class="mb-3">
                <label for="p3[]" class="form-label">Digite a nota da p3:</label>
                <input type="number" id="p3[]" name="p3[]" class="form-control" required="" step="any">
            </div>

            <div class="mb-3">
                <label for="nome[]" class="form-label">Digite o nome do terceiro aluno:</label>
                <input type="text" id="nome[]" name="nome[]" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="p1[]" class="form-label">Digite a nota da p1:</label>
                <input type="number" id="p1[]" name="p1[]" class="form-control" required="" step="any">
            </div>
            <div class="mb-3">
                <label for="p2[]" class="form-label">Digite a nota da p2:</label>
                <input type="number" id="p2[]" name="p2[]" class="form-control" required="" step="any">
            </div>
            <div class="mb-3">
                <label for="p3[]" class="form-label">Digite a nota da p3:</label>
                <input type="number" id="p3[]" name="p3[]" class="form-control" required="" step="any">
            </div>

            <div class="mb-3">
                <label for="nome[]" class="form-label">Digite o nome do quarto aluno:</label>
                <input type="text" id="nome[]" name="nome[]" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="p1[]" class="form-label">Digite a nota da p1:</label>
                <input type="number" id="p1[]" name="p1[]" class="form-control" required="" step="any">
            </div>
            <div class="mb-3">
                <label for="p2[]" class="form-label">Digite a nota da p2:</label>
                <input type="number" id="p2[]" name="p2[]" class="form-control" required="" step="any">
            </div>
            <div class="mb-3">
                <label for="p3[]" class="form-label">Digite a nota da p3:</label>
                <input type="number" id="p3[]" name="p3[]" class="form-control" required="" step="any">
            </div>

            <div class="mb-3">
                <label for="nome[]" class="form-label">Digite o nome do quinto aluno:</label>
                <input type="text" id="nome[]" name="nome[]" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="p1[]" class="form-label">Digite a nota da p1:</label>
                <input type="number" id="p1[]" name="p1[]" class="form-control" required="" step="any">
            </div>
            <div class="mb-3">
                <label for="p2[]" class="form-label">Digite a nota da p2:</label>
                <input type="number" id="p2[]" name="p2[]" class="form-control" required="" step="any">
            </div>
            <div class="mb-3">
                <label for="p3[]" class="form-label">Digite a nota da p3:</label>
                <input type="number" id="p3[]" name="p3[]" class="form-control" required="" step="any">
            </div>

            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
        <?php
            if ($_SERVER['REQUEST_METHOD'] == "POST")
            {
                $nomes = $_POST['nome'];
                $p1 = $_POST['p1'];
                $p2 = $_POST['p2'];
                $p3 = $_POST['p3'];

                $media = [];
                $mapa = [];

                for ($i = 0; $i < 5; $i++)
                {
                    $media[$i] = (($p1[$i] + $p2[$i] + $p3[$i]) / 3);

                    $mapa[$nomes[$i]] = $media[$i];
                }

                arsort($mapa);

                foreach ($mapa as $chave => $valor) 
                {
                    echo "<p>Nome: $chave - Média:". number_format($valor, 2, ',', '.')."</p>";
                }
            }
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    </div>
</body>

</html>