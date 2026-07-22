<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title ?? 'Portfólió') ?></title>
    <style>
        body { font-family: sans-serif; margin: 0; padding: 0; background: #f4f4f9; }
        nav { background: #333; padding: 1rem; }
        nav a { color: #fff; margin-right: 1rem; text-decoration: none; }
        .container { padding: 2rem; max-width: 800px; margin: 0 auto; background: #fff; }
        footer { text-align: center; padding: 1rem; margin-top: 2rem; color: #666; }
    </style>
</head>
<body>
    <nav>
        <a href="/">Kezdőlap</a>
        <a href="/about">Rólam</a>
    </nav>

    <div class="container">
        <!-- Itt fog megjelenni a specifikus nézet tartalma -->
        <?php include $viewFile; ?>
    </div>

    <footer>
        <p>&copy; <?= date('Y') ?> - Saját PHP MVC Keretrendszer</p>
    </footer>
</body>
</html>