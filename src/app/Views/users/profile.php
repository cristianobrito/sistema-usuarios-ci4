<?= view('layout/header', ['title' => 'Perfil do Usuário']) ?>

<h1>Perfil do Usuário</h1>

<p>Nome: <strong><?= esc($username) ?></strong></p>

<?= view('layout/footer') ?>
