<?php
    require_once('cabecalho.php');
    require_once('conexao.php');
    $mensagem = "";
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $nome = $_POST['descricao'];
        $descricao = $_POST['descricao'];
        $data_inicio = $_POST['data_inicio'];
        $data_fim = $_POST['data_fim'];
        $id = $_GET['id'];

        try{
          $sql = "UPDATE projetos SET nome = ?, descricao = ?, data_inicio = ?, data_fim = ?
          WHERE id = ?";
          $stmt = $pdo->prepare($sql);
          if($stmt->execute([$nome, $descricao, $data_inicio, $data_fim, $id])){
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
            $pdo->prepare("SELECT * from projetos WHERE id = ?");
        $stmt->execute([$_GET['id']]);
        $resultado = $stmt->fetch();
    } catch (Exception $e){
        echo "Erro: ".$e->getMessage();
    }
?>

<h1>Alterar Projeto</h1>
    <form method="post" 
        action="editar_categoria.php?id=<?= $resultado['id']?>">

        <div class="mb-3">
            <label for="nome" class="form-label">Nome do Projeto</label>
            <input type="text" id="nome" name="nome" class="form-control" value="<?= $resultado['nome'] ?>" required="">
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea id="descricao" name="descricao" class="form-control" required><?= $resultado['descricao'] ?></textarea>
        </div>

        <div class="mb-3">
            <label for="data_inicio" class="form-label">Data de Início</label>
            <input type="date" id="data_inicio" name="data_inicio" class="form-control" value="<?= $resultado['data_inicio'] ?>" required>
        </div>

        <div class="mb-3">
            <label for="data_fim" class="form-label">Data Prevista Para o Término</label>
            <input type="date" id="data_fim" name="data_fim" class="form-control" value="<?= $resultado['data_fim'] ?>">
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">Enviar</button>

            <a href="projetos.php" class="btn btn-secondary">Voltar</a>
        </div>

    </form>

    <?php
      echo $mensagem;
    ?>

<?php
    require_once('rodape.php');
