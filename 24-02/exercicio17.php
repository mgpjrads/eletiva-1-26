<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercício 17</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-3">
        <h1>Exercício 17</h1>
        <form method="post">
            <div class="mb-3">
                <label for="valor1" class="form-label">Digite o valor do capital que deseja investir (R$):</label>
                <input type="number" id="valor1" name="valor1" class="form-control" required="" step="any">
            </div>
            <div class="mb-3">
                <label for="valor2" class="form-label">informe a taxa de juros (%): </label>
                <input type="number" id="valor2" name="valor2" class="form-control" required="" step="any">
            </div>
            <div class="mb-3">
                <label for="valor3" class="form-label">Informe o período da aplicação (meses):</label>
                <input type="number" id="valor3" name="valor3" class="form-control" required="" step="any">
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
        <?php
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                $capital = $_POST['valor1'];
                $taxa = $_POST['valor2'];
                $periodo = $_POST['valor3'];

                if($capital > 0 && $taxa > 0 && $periodo > 0){
                    $percentual = $capital * ($taxa / 100);
                    $montante = $capital + ($percentual * $periodo);
                    echo "Montante: R$" .number_format($montante, 2);
                }
                else{
                    echo "Não inserir 0 ou valores negativos";
                }

            }
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    </div>
</body>

</html>