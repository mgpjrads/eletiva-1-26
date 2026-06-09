<?php
require_once('cabecalho.php');
require_once('conexao.php');

try{

    $sql = "
        SELECT
            a.id,
            p.nome AS projeto,
            t.titulo AS tarefa,
            m.nome AS responsavel,
            a.data_comeco,
            a.data_termino,
            a.status

        FROM atividades a

        INNER JOIN projetos p
            ON a.projetos_id = p.id

        INNER JOIN tarefas t
            ON a.tarefas_id = t.id

        INNER JOIN membros m
            ON a.membros_id = m.id
    ";

    $stmt = $pdo->query($sql);
    $resultado = $stmt->fetchAll();

    }catch(Exception $e){
        echo "Erro: ".$e->getMessage();
    }
?>

<h2>Atividades</h2>

<a href="nova_atividade.php" class="btn btn-success mb-3">
    Novo Registro
</a>

<table class="table table-hover table-striped">


<thead>
    <tr>
        <th>Projeto</th>
        <th>Tarefa</th>
        <th>Responsável</th>
        <th>Período</th>
        <th>Status</th>
        <th>Ações</th>
    </tr>
</thead>

<tbody>

<?php foreach($resultado as $r): ?>

    <tr>

        <td><?= $r['projeto'] ?></td>

        <td><?= $r['tarefa'] ?></td>

        <td><?= $r['responsavel'] ?></td>

        <td>
            <?= $r['data_comeco'] ?>
            até
            <?= $r['data_termino'] ?>
        </td>

        <td><?= $r['status'] ?></td>

        <td class="d-flex gap-2">

            <a href="editar_atividade.php?id=<?= $r['id'] ?>"class="btn btn-sm btn-warning">Editar</a>

            <a href="consulta_atividade.php?id=<?= $r['id'] ?>" class="btn btn-sm btn-info">Consultar</a>

        </td>

    </tr>

<?php endforeach; ?>

</tbody>
</table>

<?php
require_once('rodape.php');
?>
