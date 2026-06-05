<?php
    require_once('cabecalho.php');
    require_once('conexao.php');
    $mensagem = "";
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $titulo = $_POST['titulo'];
        $descrcao = $_POST['descrcao'];
        $status = $_POST['status'];
        $id = $_GET['id'];

        try{
          $sql = "UPDATE tarefas SET titulo = ?, descrcao = ?, status = ? WHERE id = ?";
          $stmt = $pdo->prepare($sql);
          if($stmt->execute([$titulo, $descrcao, $status, $id])){
            $mensagem = "<p>Alteração realizada!</p>";
          } else {
            $mensagem = "<p>Erro ao alterar! Tente novamente</p>";
          }
        } catch(Exception $e){
          echo "Erro: ".$e->getMessage();
        }
      }
    try{
        $stmt = 
            $pdo->prepare("SELECT * from tarefas WHERE id = ?");
        $stmt->execute([$_GET['id']]);
        $resultado = $stmt->fetch();
    } catch (Exception $e){
        echo "Erro: ".$e->getMessage();
    }
?>

<h1>Alterar Dados Cadastrais</h1>
    <form method="post" 
        action="editar_tarefa.php?id=<?= $resultado['id']?>">

        <div class="mb-3">
            <label for="titulo" class="form-label">titulo </label>
            <input type="text" id="titulo" name="titulo" class="form-control" value="<?= $resultado['titulo'] ?>" required="">
        </div>

        <div class="mb-3">
            <label for="descrcao" class="form-label">Descrição</label>
            <textarea id="descrcao" name="descrcao" class="form-control" rows="4" required><?= $resultado['descrcao'] ?></textarea>
    </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>

            <select id="status" name="status" class="form-select" required>

                <option value="Pendente"
                    <?= $resultado['status'] == 'Pendente' ? 'selected' : '' ?>>
                    Pendente
                </option>

                <option value="Em andamento"
                    <?= $resultado['status'] == 'Em andamento' ? 'selected' : '' ?>>
                    Em andamento
                </option>

                <option value="Concluída"
                    <?= $resultado['status'] == 'Concluída' ? 'selected' : '' ?>>
                    Concluída
                </option>

        </select>


        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">Enviar</button>

            <a href="tarefas.php" class="btn btn-secondary">Voltar</a>
        </div>

    </form>

    <?php
      echo $mensagem;
    ?>

<?php
    require_once('rodape.php');
