<?php
    require_once('cabecalho.php');
    require_once('conexao.php');

    try{

        $sql = "
            SELECT
                m.nome,
                COUNT(a.id) AS quantidade

            FROM membros m

            LEFT JOIN atividades a
                ON m.id = a.membros_id

            GROUP BY m.id, m.nome

            ORDER BY quantidade DESC
        ";

        $stmt = $pdo->query($sql);
        $resultado = $stmt->fetchAll();

    }catch(Exception $e){

        echo "Erro: ".$e->getMessage();

    }
?>

<h1>Relatório de Carga de Trabalho</h1>

<table class="table table-hover table-striped">

```
<thead>

    <tr>
        <th>Responsável</th>
        <th>Quantidade de Atividades</th>
    </tr>

</thead>

<tbody>

    <?php foreach($resultado as $r): ?>

    <tr>

        <td><?= $r['nome'] ?></td>

        <td><?= $r['quantidade'] ?></td>

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
