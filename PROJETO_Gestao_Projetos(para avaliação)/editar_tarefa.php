<?php
    require_once('cabecalho.php');
    require_once('conexao.php');
    $mensagem = "";
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $titulo = $_POST['titulo'];
        $descrcao = $_POST['descrcao'];
        $id = $_GET['id'];

        try{
          $sql = "UPDATE tarefas SET titulo = ?, descrcao = ? WHERE id = ?";
          $stmt = $pdo->prepare($sql);
          if($stmt->execute([$titulo, $descrcao, $id])){
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
