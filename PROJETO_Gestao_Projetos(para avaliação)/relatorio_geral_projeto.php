<?php
    require_once('cabecalho.php');
    require_once('conexao.php');

    try{

        $sql = "

            SELECT

                p.nome AS projeto,

                COUNT(a.id) AS total_atividades,

                SUM(
                    CASE
                        WHEN a.status = 'Concluída'
                        THEN 1
                        ELSE 0
                    END
                ) AS concluidas,

                SUM(
                    CASE
                        WHEN a.status = 'Em Andamento'
                        THEN 1
                        ELSE 0
                    END
                ) AS andamento,

                SUM(
                    CASE
                        WHEN a.status = 'Não Iniciada'
                        THEN 1
                        ELSE 0
                    END
                ) AS nao_iniciadas,

                SUM(
                    CASE
                        WHEN a.status = 'Cancelada'
                        THEN 1
                        ELSE 0
                    END
                ) AS canceladas

            FROM projetos p

            LEFT JOIN atividades a
                ON p.id = a.projetos_id

            GROUP BY p.id, p.nome

            ORDER BY p.nome

        ";

        $stmt = $pdo->query($sql);

        $resultado = $stmt->fetchAll();

    }catch(Exception $e){

        echo "Erro: ".$e->getMessage();

    }
?>

<h1>Relatório Geral dos Projetos</h1>

<table class="table table-hover table-striped">


<thead>

    <tr>

        <th>Projeto</th>
        <th>Total de Atividades</th>
        <th>Concluídas</th>
        <th>Em Andamento</th>
        <th>Não Iniciadas</th>
        <th>Canceladas</th>

    </tr>

</thead>

<tbody>

    <?php foreach($resultado as $r): ?>

    <tr>

        <td><?= $r['projeto'] ?></td>

        <td><?= $r['total_atividades'] ?></td>

        <td><?= $r['concluidas'] ?></td>

        <td><?= $r['andamento'] ?></td>

        <td><?= $r['nao_iniciadas'] ?></td>

        <td><?= $r['canceladas'] ?></td>

    </tr>

    <?php endforeach; ?>

</tbody>


</table>

<div class="d-flex gap-2">


<a href="projetos.php"
   class="btn btn-secondary">
    Voltar
</a>


</div>

<?php
    require_once('rodape.php');
?>
