<?php
    require_once('cabecalho.php');
    require_once('conexao.php');

    $resultado = [];

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $data_inicial = $_POST['data_inicial'];
        $data_final = $_POST['data_final'];

        try{

            $sql = "

                SELECT

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

                WHERE a.data_comeco
                BETWEEN ? AND ?

                ORDER BY a.data_comeco

            ";

            $stmt = $pdo->prepare($sql);

            $stmt->execute([
                $data_inicial,
                $data_final
            ]);

            $resultado = $stmt->fetchAll();

        }catch(Exception $e){

            echo "Erro: ".$e->getMessage();

        }

    }
?>

<h1>Relatório por Período</h1>

<form method="post">

```
<div class="mb-3">

    <label for="data_inicial"
           class="form-label">
        Data Inicial
    </label>

    <input
        type="date"
        id="data_inicial"
        name="data_inicial"
        class="form-control"
        required>

</div>

<div class="mb-3">

    <label for="data_final"
           class="form-label">
        Data Final
    </label>

    <input
        type="date"
        id="data_final"
        name="data_final"
        class="form-control"
        required>

</div>

<div class="d-flex gap-2">

    <button type="submit"
            class="btn btn-primary">
        Consultar
    </button>

    <a href="atividades.php"
       class="btn btn-secondary">
        Voltar
    </a>

</div>
```

</form>

<?php if(!empty($resultado)): ?>

```
<hr>

<h2>Resultado</h2>

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
```

<?php endif; ?>

<?php
    require_once('rodape.php');
?>
