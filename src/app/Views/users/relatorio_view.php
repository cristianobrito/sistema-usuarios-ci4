<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title><?= $titulo ?></title>
    <style>
        body { font-family: sans-serif; background: #f4f4f4; padding: 20px; }
        .box { background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        .total-highlight { color: #d9534f; font-weight: bold; background: #ffe6e6; padding: 10px; margin-top: 20px; border-radius: 4px; }
        pre { background: #333; color: #a6e22e; padding: 15px; border-radius: 5px; overflow-x: auto; }
    </style>
</head>
<body>
    <?php if (session()->getFlashdata('mensagem')): ?>
    <div style="color: green; font-weight: bold; margin-bottom: 15px;">
        <?= session()->getFlashdata('mensagem') ?>
    </div>
<?php endif; ?>

<form action="<?= site_url('seguranca/disparar') ?>" method="post">
    <button type="submit" style="background: #0275d8; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer;">
        Executar Nova Varredura Agora
    </button>
</form>

<hr>
    <div class="box">
        <h1><?= $titulo ?></h1>
        
        <h3>Resumo dos Totais:</h3>
        <div class="total-highlight">
            <?php foreach($totais as $t): ?>
                <?= esc($t) ?><br>
            <?php endforeach; ?>
        </div>

        <h3>Log Completo:</h3>
        <pre><?php foreach($conteudo as $linha) echo esc($linha); ?></pre>
    </div>
</body>
</html>