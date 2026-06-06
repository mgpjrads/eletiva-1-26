<?php
    require_once('cabecalho.php');
?>

<h1>Novo Projeto</h1>
    <form method="post">

        <div class="mb-3">
              <label for="nome" class="form-label">Nome do projeto</label>
              <input type="text" id="nome" name="nome" class="form-control" required="">
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea id="descricao" name="descricao" class="form-control" rows="4" required></textarea>
        </div>

        <div class="mb-3">
            <label for="data_inicio" class="form-label">Data de Início</label>
            <input type="date" id="data_inicio" name="data_inicio" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="data_fim" class="form-label">Data Prevista para Término</label>
            <input type="date" id="data_fim" name="data_fim" class="form-control" required>
        </div>


        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">Enviar</button>

            <a href="projetos.php" class="btn btn-secondary">
                 Voltar
            </a>
</div>
    </form>
    <?php
      if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        require_once('conexao.php');
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $data_inicio = $_POST['data_inicio'];
        $data_fim = $_POST['data_fim'];

        try{
          $stmt = $pdo->prepare('INSERT INTO projetos (nome, descricao, data_inicio, data_fim) VALUES (?, ?, ?, ?);');
          if($stmt->execute([$nome, $descricao, $data_inicio, $data_fim])){
            echo "<p>Cadastro realizado!</p>";
          } else {
            echo "<p>Erro ao cadastrar! Tente novamente</p>";
          }
        } catch(Exception $e){
          echo "Erro: ".$e->getMessage();
        }
      }
    ?>

<?php
    require_once('rodape.php');