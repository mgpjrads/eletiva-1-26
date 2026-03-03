<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercício 19</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-3">
        <h1>Exercício 19</h1>
        <form method="post">
            <div class="mb-3">
                <label for="valor1" class="form-label">Informe quantos dias deseja converter: </label>
                <input type="number" id="valor1" name="valor1" class="form-control" required="" step="any">
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
        <?php
            if($_SERVER['REQUEST_METHOD'] == "POST")
            {
                $dias = $_POST['valor1'];

                $h = $dias * 24;
                $m = $h * 60;
                $s = $m * 60;

                $horas = (int) ($s / 3600);
                $minutos = (int) (($s % 3600) / 60);
                $segundos = $s % 60;

                echo "<p>$dias dias equivalem a:</p> ";
                echo "<p> $h horas </p>";
                echo "<p> $m minutos </p>";
                echo "<p> $s segundos </p>";

                echo "<p> $dias dias têm $horas:$minutos:$segundos";
                
            }
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    </div>
</body>

</html>