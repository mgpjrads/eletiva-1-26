<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Atividade 12</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-3">
        <h1>Atividade 12</h1>
        <form method="post">
            <div class="mb-3">
                <label for="valor1" class="form-label">Deseja gerar uma senha (Sim/Não): </label>
                <input type="text" id="valor1" name="valor1" class="form-control" required="">
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
        <?php 
            if($_SERVER['REQUEST_METHOD'] == "POST")

                $valor = strtoupper($_POST['valor1']);
                $letras = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $numeros = '0123456789';
                $senha = '';

                if ($valor == "SIM")
                    {
                        $senha .= $letras[random_int(0, strlen($letras)-1)];
                        $senha .= $numeros[random_int(0, strlen($numeros)-1)];
                        $caracteres = $letras . $numeros;
                        for ($i = 2; $i < 8; $i++)
                            {
                                $senha .= $caracteres[random_int(0, strlen($caracteres)-1)];
                            }
                        echo "Sua senha é $senha";
                        
                    }
                elseif ($valor == "NÃO" || $valor == "NAO")
                    {
                        
                    }
                else 
                    echo "Resposta inválida! Atualize a página por favor!"
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    </div>
</body>

</html>