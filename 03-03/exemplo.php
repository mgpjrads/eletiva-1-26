<!doctype html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Exemplo estruturas de controle e repetição</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body> 
<div class="container py-3">
<h1>Exemplo estruturas de controle e repetição</h1>
<form method="post">
<div class="mb-3">
              <label for="valor" class="form-label">Informe um valor:</label>
              <input type="text" id="valor" name="valor" class="form-control" required="">
            </div>
<button type="submit" class="btn btn-primary">Enviar</button>
</form>
<?php
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $valor = $_POST['valor'];

        /*if($valor == "+")
            echo "<p>Sinal de soma</p>";
        elseif($valor == "-")
            echo "<p>Sinal de subtração</p>";
        elseif($valor == "*")
            echo " <p>Sinal de multiplicação</p>";
        elseif($valor == "/")
            echo "<p>Sinal de divisão</p>";
        else
            echo "<p>Sinal inválido</p>";*/

        

        switch($valor){
            case "+":
                echo "Sinal de soma!";
                //
                break;
            case "-":
                echo "Sinal de subtração!";
                break;
            case "*":
                echo "Sinal de multiplicação";
                break;
            case "/":
                echo "Sinal de divisão";
                break;
            default:
                echo "Sinal inválido!";
                break;
        }

        for($i = 1; $i<=10; $i++){
            $resultado = $valor * $i;
            echo "<p> $valor * $i = $resultado</p>";
        }

    }
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</div>
</body>
</html>