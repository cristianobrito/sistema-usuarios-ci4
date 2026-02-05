<?= view('layout/header', ['title' => $title]) ?>

<h1>Lista de Usuários</h1>

<ul>
    <?php foreach ($users as $user): ?>
        <li>
            <?= esc($user['id']) ?> -
            <?= esc($user['name']) ?>
        </li>
    <?php endforeach; ?>
</ul>

<?= view('layout/footer') ?>
