<?php
require_once('cabecalho.php');
require_once('conexao.php');

try{

    $projetos = $pdo->query("SELECT * FROM projetos")->fetchAll();

    $tarefas = $pdo->query("SELECT * FROM tarefas")->fetchAll();

    $membros = $pdo->query("SELECT * FROM membros")->fetchAll();

}catch(Exception $e){

    die("Erro: ".$e->getMessage());

}
?>

<h1>Nova Atividade</h1>

<form method="post">

```
<div class="mb-3">
    <label class="form-label">Projeto</label>

    <select name="projeto" class="form-select" required>

        <?php foreach($projetos as $p): ?>

            <option value="<?= $p['id'] ?>">
                <?= $p['nome'] ?>
            </option>

        <?php endforeach; ?>

    </select>
</div>

<div class="mb-3">
    <label class="form-label">Tarefa</label>

    <select name="tarefa" class="form-select" required>

        <?php foreach($tarefas as $t): ?>

            <option value="<?= $t['id'] ?>">
                <?= $t['titulo'] ?>
            </option>

        <?php endforeach; ?>

    </select>
</div>

<div class="mb-3">
    <label class="form-label">Responsável</label>

    <select name="membro" class="form-select" required>

        <?php foreach($membros as $m): ?>

            <option value="<?= $m['id'] ?>">
                <?= $m['nome'] ?>
            </option>

        <?php endforeach; ?>

    </select>
</div>

<div class="mb-3">
    <label class="form-label">Data de Início</label>

    <input type="date"
           name="data_comeco"
           class="form-control"
           required>
</div>

<div class="mb-3">
    <label class="form-label">Data de Término</label>

    <input type="date"
           name="data_termino"
           class="form-control"
           required>
</div>

<div class="mb-3">
    <label class="form-label">Status</label>

    <select name="status"
            class="form-select"
            required>

        <option value="Não Iniciada">Não Iniciada</option>
        <option value="Em Andamento">Em Andamento</option>
        <option value="Concluída">Concluída</option>
        <option value="Cancelada">Cancelada</option>

    </select>
</div>

<div class="d-flex gap-2">

    <button type="submit"
            class="btn btn-primary">
        Enviar
    </button>

    <a href="atividades.php"
       class="btn btn-secondary">
        Voltar
    </a>

</div>
```

</form>

<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $projeto = $_POST['projeto'];
    $tarefa = $_POST['tarefa'];
    $membro = $_POST['membro'];
    $data_comeco = $_POST['data_comeco'];
    $data_termino = $_POST['data_termino'];
    $status = $_POST['status'];

    try{

        $sql = "
            INSERT INTO atividades
            (
                projetos_id,
                tarefas_id,
                membros_id,
                data_comeco,
                data_termino,
                status
            )
            VALUES (?, ?, ?, ?, ?, ?)
        ";

        $stmt = $pdo->prepare($sql);

        if($stmt->execute([
            $projeto,
            $tarefa,
            $membro,
            $data_comeco,
            $data_termino,
            $status
        ])){
            echo "<p>Cadastro realizado!</p>";
        }

    }catch(Exception $e){

        echo "Erro: ".$e->getMessage();

    }
}

?>

<?php
require_once('rodape.php');
?>
