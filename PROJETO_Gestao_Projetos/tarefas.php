<?php
    require_once('cabecalho.php');
    require_once('conexao.php');
    try{
        $stmt = $pdo->query('SELECT * FROM tarefas');
        $resultado = $stmt->fetchAll();
    } catch(Exception $e){
        echo "Erro: ".$e->getMessage();
    }
?>

<h2>Tarefas</h2>
    <a href="nova_tarefa.php" class="btn btn-success mb-3">Novo Registro</a>
    <table class="table table-hover table-striped">
    <thead>
        <tr>
        <th>ID</th>
        <th>Título</th>
        <th>Descrição</th>

        </tr>
    </thead>
    <tbody>
        <?php foreach ($resultado as $r): ?>
        <tr>
            <td><?= $r['id'] ?></td>
            <td><?= $r['titulo'] ?></td>
            <td><?= $r['descrcao'] ?></td>
            
            <td class="d-flex gap-2">
            <a href="editar_tarefa.php?id=<?= $r['id'] ?>" class="btn btn-sm btn-warning">Editar</a>
            <a href="consultar_tarefa.php?id=<?= $r['id'] ?>" class="btn btn-sm btn-info">Consultar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
    </table>

<?php
    require_once('rodape.php');