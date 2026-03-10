<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Atividade 9</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-3">
        <h1>Atividade 9</h1>
        <form method="post">
            <div class="mb-3">
                <label for="valor1" class="form-label">Digite um número:</label>
                <input type="number" id="valor1" name="valor1" class="form-control" required="">
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
        <?php
            if($_SERVER['REQUEST_METHOD'] == "POST")
                {
                    $num = $_POST['valor1'];
                    
                    $fatorial = 1;
                    echo "$num! = ";
                    for ($i = 1; $i <= $num; $i++)
                        if ($i == $num)
                        {
                            echo "$i = ";
                            $fatorial = $fatorial * $i;
                        }
                        else
                        {   
                            echo "$i x ";
                            $fatorial = $fatorial * $i; 
                        }
                            echo "$fatorial";
                }
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    </div>
</body>

</html>