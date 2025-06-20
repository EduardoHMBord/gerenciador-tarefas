<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tarefa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
        <h2 class="mb-4">Editar Tarefa</h2>
        <?php if (session()->get('errors')): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach (session()->get('errors') as $error): ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach ?>
                </ul>
            </div>
        <?php endif ?>
        
        <form method="post" action="<?= base_url('/tasks/update/' . $task['id']) ?>">
            <?= csrf_field() ?>

            <div class="mb-3">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" class="form-control" name="title" value="<?= esc($task['title']) ?>" required>
            </div> 

            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição</label>
                <input type="text" class="form-control" name="description" value="<?= esc($task['description']) ?>">
            </div> 

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-select">
                    <option value="pendente" <?= $task['status'] === 'pendente' ? 'selected' : '' ?>>Pendente</option>
                    <option value="em andamento" <?= $task['status'] === 'em andamento' ? 'selected' : '' ?>>Em andamento</option>
                    <option value="concluida" <?= $task['status'] === 'concluida' ? 'selected' : '' ?>>Concluída</option>
                </select>
            </div> 

            <button type="submit" class="btn btn-success">Atualizar</button>
            <a href="/tasks" class="btn btn-secondary">Cancelar</a>
        </form>

    </div>
    
</body>
</html>