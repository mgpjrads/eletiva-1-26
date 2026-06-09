<?php
    require_once('cabecalho.php');
    require_once('conexao.php');
    try{
        $stmt = 
            $pdo->prepare('SELECT * FROM tarefas WHERE id=?');
        $stmt->execute([$_GET['id']]);
        $resultado = $stmt->fetch();
    } catch(Exception $e){
        echo "Erro! ".$e->getMessage();
    }
?>

<h1>Consultar Tarefa</h1>
    <form method="post" 
        action="consultar_tarefa.php?id=<?= $resultado['id'] ?>">

        <div class="mb-3">
            <p><strong>Titulo:</strong> <?= $resultado['titulo'] ?></p>
            <p><strong>Descrição:</strong> <?= $resultado['descrcao'] ?></p>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este projeto?')">Excluir</button>
            <a href="tarefas.php" class="btn btn-secondary">Voltar</a>
        </div>
    </form>

    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = $_GET['id'];
            try{
                $sql = "DELETE FROM tarefas WHERE id = ?";
                $stmt = $pdo->prepare($sql);
                if($stmt->execute([$id])){
                    header('Location: tarefas.php');
                } else {
                    echo "Erro ao excluir!";
                }
            } catch(Exception $e){
                echo "Erro: ".$e->getMessage();
            }
        }
    ?>
<?php
    require_once('rodape.php');
