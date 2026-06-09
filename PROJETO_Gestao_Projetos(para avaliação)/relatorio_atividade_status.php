<?php
    require_once('cabecalho.php');
    require_once('conexao.php');

    try{

        $sql = "
            SELECT
                status,
                COUNT(*) AS quantidade
            FROM atividades
            GROUP BY status
            ORDER BY status
        ";

        $stmt = $pdo->query($sql);
        $resultado = $stmt->fetchAll();

    }catch(Exception $e){

        echo "Erro: ".$e->getMessage();

    }
?>

<h1>Relatório de Atividades por Status</h1>

<table class="table table-hover table-striped">

```
<thead>

    <tr>
        <th>Status</th>
        <th>Quantidade de Atividades</th>
    </tr>

</thead>

<tbody>

    <?php foreach($resultado as $r): ?>

    <tr>

        <td><?= $r['status'] ?></td>

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
