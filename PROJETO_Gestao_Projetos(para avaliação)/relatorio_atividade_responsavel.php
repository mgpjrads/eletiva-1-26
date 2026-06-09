<?php
    require_once('cabecalho.php');
    require_once('conexao.php');

    try{

        $sql = "
            SELECT

                m.nome AS responsavel,

                p.nome AS projeto,

                t.titulo AS tarefa,

                a.status

            FROM atividades a

            INNER JOIN membros m
                ON a.membros_id = m.id

            INNER JOIN projetos p
                ON a.projetos_id = p.id

            INNER JOIN tarefas t
                ON a.tarefas_id = t.id

            ORDER BY m.nome, p.nome
        ";

        $stmt = $pdo->query($sql);
        $resultado = $stmt->fetchAll();

    }catch(Exception $e){

        echo "Erro: ".$e->getMessage();

    }
?>

<h1>Relatório de Atividades por Responsável</h1>

<table class="table table-hover table-striped">

```
<thead>

    <tr>

        <th>Responsável</th>
        <th>Projeto</th>
        <th>Tarefa</th>
        <th>Status</th>

    </tr>

</thead>

<tbody>

    <?php foreach($resultado as $r): ?>

    <tr>

        <td><?= $r['responsavel'] ?></td>

        <td><?= $r['projeto'] ?></td>

        <td><?= $r['tarefa'] ?></td>

        <td><?= $r['status'] ?></td>

    </tr>

    <?php endforeach; ?>

</tbody>
```

</table>

<div class="d-flex gap-2">

```
<a href="atividades.php"
   class="btn btn-secondary">
    Voltar
</a>
```

</div>

<?php
    require_once('rodape.php');
?>
