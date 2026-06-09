<?php
    require_once('cabecalho.php');
    require_once('conexao.php');

    try{

        $sql = "

            SELECT

                p.nome AS projeto,

                t.titulo AS tarefa,

                m.nome AS responsavel,

                a.status,

                a.data_comeco,

                a.data_termino

            FROM atividades a

            INNER JOIN projetos p
                ON a.projetos_id = p.id

            INNER JOIN tarefas t
                ON a.tarefas_id = t.id

            INNER JOIN membros m
                ON a.membros_id = m.id

            ORDER BY p.nome, a.data_termino

        ";

        $stmt = $pdo->query($sql);

        $resultado = $stmt->fetchAll();

    }catch(Exception $e){

        echo "Erro: ".$e->getMessage();

    }
?>

<h1>Relatório de Atividades por Projeto</h1>

<table class="table table-hover table-striped">


<thead>

    <tr>

        <th>Projeto</th>
        <th>Tarefa</th>
        <th>Responsável</th>
        <th>Data Início</th>
        <th>Data Término</th>
        <th>Status</th>

    </tr>

</thead>

<tbody>

    <?php foreach($resultado as $r): ?>

    <tr>

        <td><?= $r['projeto'] ?></td>

        <td><?= $r['tarefa'] ?></td>

        <td><?= $r['responsavel'] ?></td>

        <td><?= $r['data_comeco'] ?></td>

        <td><?= $r['data_termino'] ?></td>

        <td><?= $r['status'] ?></td>

    </tr>

    <?php endforeach; ?>

</tbody>


</table>

<div class="d-flex gap-2">


<a href="atividades.php"
   class="btn btn-secondary">
    Voltar
</a>


</div>

<?php
    require_once('rodape.php');
?>
