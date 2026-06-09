<?php
    require_once('cabecalho.php');
    require_once('conexao.php');
    $mensagem = "";
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $id = $_GET['id'];

        try{
          $sql = "UPDATE membros SET nome = ?, email = ?, telefone = ? WHERE id = ?";
          $stmt = $pdo->prepare($sql);
          if($stmt->execute([$nome, $email, $telefone, $id])){
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
            $pdo->prepare("SELECT * from membros WHERE id = ?");
        $stmt->execute([$_GET['id']]);
        $resultado = $stmt->fetch();
    } catch (Exception $e){
        echo "Erro: ".$e->getMessage();
    }
?>

<h1>Alterar Dados Cadastrais</h1>
    <form method="post" 
        action="editar_membro.php?id=<?= $resultado['id']?>">

        <div class="mb-3">
            <label for="nome" class="form-label">Nome </label>
            <input type="text" id="nome" name="nome" class="form-control" value="<?= $resultado['nome'] ?>" required="">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">email</label>
            <input id="email" name="email" class="form-control" required="" value="<?= $resultado['email'] ?>"> 
        </div>

        <div class="mb-3">
            <label for="telefone" class="form-label">telefone</label>
            <input type="text" id="telefone" name="telefone" class="form-control" value="<?= $resultado['telefone'] ?>" required="">
        </div>


        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">Enviar</button>

            <a href="membros.php" class="btn btn-secondary">Voltar</a>
        </div>

    </form>

    <?php
      echo $mensagem;
    ?>

<?php
    require_once('rodape.php');
