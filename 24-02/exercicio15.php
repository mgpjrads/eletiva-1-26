<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercício 15 </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-3">
        <h1>Exercício 15 </h1>
        <form method="post">
            <div class="mb-3">
                <label for="valor1" class="form-label">Informe sua altura (m):</label>
                <input type="number" id="valor1" name="valor1" class="form-control" required="" step="any">
            </div>
            <div class="mb-3">
                <label for="valor2" class="form-label">informe seu peso (kg):</label>
                <input type="number" id="valor2" name="valor2" class="form-control" required="" step="any">
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
        <?php
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                $valor1 = $_POST['valor1'];
                $valor2 = $_POST['valor2'];

                if($valor1 > 0 && $valor2 > 0){
                    $imc = ($valor2 / ($valor1 ** 2));
                    echo "IMC: " .number_format($imc,2);
                }
                else{
                    echo "Não é possivel calcular o IMC!";
                }
            }
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    </div>
</body>

</html>