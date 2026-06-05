<?php
    require_once('cabecalho.php');
?>

<h1>Novo Tarefa</h1>
    <form method="post">

        <div class="mb-3">
              <label for="titulo" class="form-label">Título</label>
              <input type="text" id="titulo" name="titulo" class="form-control" required="">
        </div>

        <div class="mb-3">
            <label for="descrcao" class="form-label">Descrição</label>
            <textarea id="descrcao" name="descrcao" class="form-control" rows="4" required></textarea>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select id="status" name="status" class="form-select" required>
                <option value="">Selecione</option>
                <option value="Pendente">Pendente</option>
                <option value="Em andamento">Em andamento</option>
                <option value="Concluída">Concluída</option>
            </select>
        </div>



        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">Enviar</button>

            <a href="tarefas.php" class="btn btn-secondary">Voltar</a>
        </div>

    </form>
    <?php
      if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        require_once('conexao.php');
        $titulo = $_POST['titulo'];
        $descrcao = $_POST['descrcao'];
        $status = $_POST['status'];


        try{
          $stmt = $pdo->prepare('INSERT INTO tarefas (titulo, descrcao, status) VALUES (?, ?, ?);');
          if($stmt->execute([$titulo, $descrcao, $status])){
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