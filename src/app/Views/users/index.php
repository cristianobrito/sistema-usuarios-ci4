<h1>Lista de Usuários</h1>

<?php foreach ($users as $user): ?>

    <p>
        <?= esc($user['id']) ?> -
        <?= esc($user['name']) ?>

        <a href="/users/<?= $user['id'] ?>">Ver</a>
    </p>

<?php endforeach; ?>