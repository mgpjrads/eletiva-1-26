<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container py-3">
    <h1></h1>
    <form method="post">
      <div class="mb-3">
        <label for="nome[]" class="form-label">Digite o nome do contato:</label>
        <input type="text" id="nome[]" name="nome[]" class="form-control" required="">
      </div>
      <div class="mb-3">
        <label for="num[]" class="form-label">Informe o número do contato:</label>
        <input type="number" id="num[]" name="num[]" class="form-control" required="">
      </div>
      <div class="mb-3">
        <label for="nome[]" class="form-label">Digite o nome do contato:</label>
        <input type="text" id="nome[]" name="nome[]" class="form-control" required="">
      </div>
      <div class="mb-3">
        <label for="num[]" class="form-label">Informe o número do contato:</label>
        <input type="number" id="num[]" name="num[]" class="form-control" required="">
      </div>
      <div class="mb-3">
        <label for="nome[]" class="form-label">Digite o nome do contato:</label>
        <input type="text" id="nome[]" name="nome[]" class="form-control" required="">
      </div>
      <div class="mb-3">
        <label for="num[]" class="form-label">Informe o número do contato:</label>
        <input type="number" id="num[]" name="num[]" class="form-control" required="">
      </div>
      <div class="mb-3">
        <label for="nome[]" class="form-label">Digite o nome do contato:</label>
        <input type="text" id="nome[]" name="nome[]" class="form-control" required="">
      </div>
      <div class="mb-3">
        <label for="num[]" class="form-label">Informe o número do contato:</label>
        <input type="number" id="num[]" name="num[]" class="form-control" required="">
      </div>
      <div class="mb-3">
        <label for="nome[]" class="form-label">Digite o nome do contato:</label>
        <input type="text" id="nome[]" name="nome[]" class="form-control" required="">
      </div>
      <div class="mb-3">
        <label for="num[]" class="form-label">Informe o número do contato:</label>
        <input type="number" id="num[]" name="num[]" class="form-control" required="">
      </div>

      <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") 
    {
      $contato = $_POST['nome'];
      $numeros = $_POST['num'];

      $mapa = [];
      $erro = false;

      for ($i = 0; $i < 5; $i++) 
      {
          $nome = trim($contatos[$i]);
          $telefone = trim($numeros[$i]);

        if (isset($mapa[$nome])) 
        {
            echo "Nome duplicado: $nome";
            $erro = true;
            break;
        }

        if (in_array($telefone, $mapa))
        {
            echo "Telefone duplicado: $telefone";
            $erro = true;
            break;
        }

        $mapa[$nome] = $telefone;
      }

      if ($erro = false) {
        ksort($mapa);
      }

      echo "<h2> Lista ordenada de Contatos </h2>";

      foreach ($mapa as $chave => $valor) {
        echo "<p>Nome: $chave - Telefone: $valor</p>";
      }
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
  </div>
</body>

</html>