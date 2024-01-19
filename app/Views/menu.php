<!-- Archivo: app/Views/menu.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú</title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="<?= base_url('1') ?>">Pantalla 1</a></li>
            <li><a href="<?= base_url('2') ?>">Pantalla 2</a></li>
            <li><a href="<?= base_url('3') ?>">Pantalla 3</a></li>
            <li><a href="<?= base_url('4') ?>">Pantalla 4</a></li>
        </ul>
    </nav>
    <?= $this->renderSection('content') ?>
</body>
</html>