<?php
    require_once('cabecalho.php');
    require_once('conexao.php');

    try{

        $sql = "
            SELECT
                a.*,

                p.nome AS projeto,
                p.descricao AS descricao_projeto,

                t.titulo AS tarefa,
                t.descrcao AS descricao_tarefa,
                t.status,

                m.nome AS responsavel,
                m.email,
                m.telefone

            FROM atividades a

            INNER JOIN projetos p
                ON a.projetos_id = p.id

            INNER JOIN tarefas t
                ON a.tarefas_id = t.id

            INNER JOIN membros m
                ON a.membros_id = m.id

            WHERE a.id = ?
        ";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([$_GET['id']]);

        $resultado = $stmt->fetch();

    }catch(Exception $e){
        echo "Erro: ".$e->getMessage();
    }
?>

<h1>Consultar Atividade</h1>

<form method="post"
      action="consultar_atividade.php?id=<?= $resultado['id'] ?>">

```
<div class="mb-3">

    <p>
        <strong>Projeto:</strong>
        <?= $resultado['projeto'] ?>
    </p>

    <p>
        <strong>Descrição do Projeto:</strong>
        <?= $resultado['descricao_projeto'] ?>
    </p>

    <p>
        <strong>Tarefa:</strong>
        <?= $resultado['tarefa'] ?>
    </p>

    <p>
        <strong>Descrição da Tarefa:</strong>
        <?= $resultado['descricao_tarefa'] ?>
    </p>

    <p>
        <strong>Status:</strong>
        <?= $resultado['status'] ?>
    </p>

    <p>
        <strong>Responsável:</strong>
        <?= $resultado['responsavel'] ?>
    </p>

    <p>
        <strong>Email:</strong>
        <?= $resultado['email'] ?>
    </p>

    <p>
        <strong>Telefone:</strong>
        <?= $resultado['telefone'] ?>
    </p>

    <p>
        <strong>Data de Início:</strong>
        <?= $resultado['data_comeco'] ?>
    </p>

    <p>
        <strong>Data de Término:</strong>
        <?= $resultado['data_termino'] ?>
    </p>

</div>

<div class="d-flex gap-2">

    <button
        type="submit"
        class="btn btn-danger"
        onclick="return confirm('Tem certeza que deseja excluir esta atividade?')">
        Excluir
    </button>

    <a href="atividades.php" class="btn btn-secondary">
        Voltar
    </a>

</div>
```

</form>

<?php

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $id = $_GET['id'];

        try{

            $stmt = $pdo->prepare(
                "DELETE FROM atividades WHERE id = ?"
            );

            if($stmt->execute([$id])){
                header("Location: atividades.php");
                exit;
            }else{
                echo "Erro ao excluir!";
            }

        }catch(Exception $e){
            echo "Erro: ".$e->getMessage();
        }
    }

?>

<?php
    require_once('rodape.php');
?>
