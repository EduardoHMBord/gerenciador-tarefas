<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de Tarefas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="mb-4">Gerenciador de Tarefas</h2>
        <a href="/tasks/create" class="btn btn-success mb-3">+ Nova Tarefa</a>
        
        <?php if (!empty($tasks)): ?>
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Título</th>
                        <th>Descrição</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($tasks as $task): ?>
                        <tr>
                            <td><?= esc($task['title']) ?></td>
                            <td class="text-wrap" style="word-break: break-word; max-width: 250px;">
                                <?= esc($task['description']) ?>
                            </td>
                            <td>
                                <span class="badge bg-info text-dark">
                                    <?= esc(ucfirst(match ($task['status']) {
                                        'pendente'      => 'Pendente',
                                        'em andamento'  => 'Em andamento',
                                        'concluida'     => 'Concluída',
                                        default         => ucfirst($task['status']),
                                    })) ?>
                                </span>
                            </td>
                            <td>
                                <a href="<?= base_url('/tasks/edit/' . $task['id']) ?>" class="btn btn-sm btn-warning">Editar</a>
                                <a href="<?= base_url('/tasks/delete/' . $task['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Deseja excluir essa tarefa?')">Deletar</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Nenhuma tarefa cadastrada.</p>
        <?php endif ?>
    </div>
    
</body>
</html>