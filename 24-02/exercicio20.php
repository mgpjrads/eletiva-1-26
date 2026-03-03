<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercício 20</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-3">
        <h1>Exercício 20</h1>
        <form method="post">
            <div class="mb-3">
                <label for="valor1" class="form-label">Km ou m</label>
                <input type="text" id="valor1" name="valor1" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="valor2" class="form-label">Informe o valor</label>
                <input type="number" id="valor2" name="valor2" class="form-control" required="" step="any">
            </div>
            <div class="mb-3">
                <label for="valor3" class="form-label">h ou s </label>
                <input type="text" id="valor3" name="valor3" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="valor4" class="form-label">Informe o valor: </label>
                <input type="number" id="valor4" name="valor4" class="form-control" required="" step="any">
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
        <?php
            if($_SERVER["REQUEST_METHOD"] == "POST")
                {
                    $medida_comprimento = $_POST['valor1'];
                    $valor_comprimento = $_POST['valor2'];
                    $medida_tempo = $_POST['valor3'];
                    $valor_tempo = $_POST['valor4'];

                    if(($medida_comprimento == "km" || $medida_comprimento == "KM") && ($medida_tempo == "h" || $medida_tempo == "H") && ($valor_tempo != 0))
                    {
                        $media_velocidade = $valor_comprimento / $valor_tempo;
                        echo "Velocidade Média é $media_velocidade Km/h";
                    }
                    elseif(($medida_comprimento == "m" || $medida_comprimento == "M") && ($medida_tempo == "s" || $medida_tempo == "S") && ($valor_tempo != 0))
                    {
                        $media_velocidade = $valor_comprimento / $valor_tempo;
                        echo "Velocidade Média é $media_velocidade m/s";
                    }
                    elseif(($medida_comprimento == "km" || $medida_comprimento == "KM") && ($medida_tempo == "s" || $medida_tempo == "S") && ($valor_tempo != 0))
                    {
                        $media_velocidade = $valor_comprimento / $valor_tempo;
                        echo "Velocidade Média é $media_velocidade km/s";
                    }
                    elseif(($medida_comprimento == "m" || $medida_comprimento == "M") && ($medida_tempo == "h" || $medida_tempo == "H") && ($valor_tempo != 0))
                    {
                        $media_velocidade = $valor_comprimento / $valor_tempo;
                        echo "Velocidade Média é $media_velocidade m/h";
                    }
                    else
                    {
                        echo "Erro!";
                    }
                }
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    </div>
</body>

</html>