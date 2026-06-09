<?php
require_once('cabecalho.php');
require_once('conexao.php');

$mensagem = "";

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $projeto = $_POST['projeto'];
    $tarefa = $_POST['tarefa'];
    $membro = $_POST['membro'];
    $data_comeco = $_POST['data_comeco'];
    $data_termino = $_POST['data_termino'];
    $status = $_POST['status'];
    $id = $_GET['id'];

    try{

        $sql = "
            UPDATE atividades
            SET
                projetos_id = ?,
                tarefas_id = ?,
                membros_id = ?,
                data_comeco = ?,
                data_termino = ?,
                status = ?
            WHERE id = ?
        ";

        $stmt = $pdo->prepare($sql);

        if($stmt->execute([
            $projeto,
            $tarefa,
            $membro,
            $data_comeco,
            $data_termino,
            $status,
            $id
        ])){
            $mensagem = "<p>Alteração realizada!</p>";
        }

    }catch(Exception $e){
        echo "Erro: ".$e->getMessage();
    }
}

$stmt = $pdo->prepare("SELECT * FROM atividades WHERE id = ?");
$stmt->execute([$_GET['id']]);
$resultado = $stmt->fetch();

$projetos = $pdo->query("SELECT * FROM projetos")->fetchAll();
$tarefas = $pdo->query("SELECT * FROM tarefas")->fetchAll();
$membros = $pdo->query("SELECT * FROM membros")->fetchAll();
?>

<h1>Alterar Atividade</h1>

<form method="post"
      action="editar_atividade.php?id=<?= $resultado['id'] ?>">

```
<!-- Projeto -->
<div class="mb-3">
    <label class="form-label">Projeto</label>

    <select name="projeto" class="form-select">

        <?php foreach($projetos as $p): ?>

        <option value="<?= $p['id'] ?>"
            <?= $resultado['projetos_id'] == $p['id'] ? 'selected' : '' ?>>

            <?= $p['nome'] ?>

        </option>

        <?php endforeach; ?>

    </select>
</div>

<!-- Tarefa -->
<div class="mb-3">
    <label class="form-label">Tarefa</label>

    <select name="tarefa" class="form-select">

        <?php foreach($tarefas as $t): ?>

        <option value="<?= $t['id'] ?>"
            <?= $resultado['tarefas_id'] == $t['id'] ? 'selected' : '' ?>>

            <?= $t['titulo'] ?>

        </option>

        <?php endforeach; ?>

    </select>
</div>

<!-- Responsável -->
<div class="mb-3">
    <label class="form-label">Responsável</label>

    <select name="membro" class="form-select">

        <?php foreach($membros as $m): ?>

        <option value="<?= $m['id'] ?>"
            <?= $resultado['membros_id'] == $m['id'] ? 'selected' : '' ?>>

            <?= $m['nome'] ?>

        </option>

        <?php endforeach; ?>

    </select>
</div>

<div class="mb-3">
    <label class="form-label">Data de Início</label>

    <input type="date"
           name="data_comeco"
           value="<?= $resultado['data_comeco'] ?>"
           class="form-control">
</div>

<div class="mb-3">
    <label class="form-label">Data de Término</label>

    <input type="date"
           name="data_termino"
           value="<?= $resultado['data_termino'] ?>"
           class="form-control">
</div>

<div class="mb-3">
    <label class="form-label">Status</label>

    <select name="status" class="form-select">

        <option <?= $resultado['status']=='Não Iniciada' ? 'selected' : '' ?>>
            Não Iniciada
        </option>

        <option <?= $resultado['status']=='Em Andamento' ? 'selected' : '' ?>>
            Em Andamento
        </option>

        <option <?= $resultado['status']=='Concluída' ? 'selected' : '' ?>>
            Concluída
        </option>

        <option <?= $resultado['status']=='Cancelada' ? 'selected' : '' ?>>
            Cancelada
        </option>

    </select>
</div>

<div class="d-flex gap-2">

    <button type="submit"
            class="btn btn-primary">
        Salvar
    </button>

    <a href="atividades.php"
       class="btn btn-secondary">
        Voltar
    </a>

</div>
```

</form>

<?= $mensagem ?>

<?php
require_once('rodape.php');
?>
