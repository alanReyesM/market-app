<?php
$icon_path = __DIR__ . '/icons/market_main.png';
$icon_web_path = 'icons/market_main.png';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Marquek-home</title>
    <?php if (file_exists($icon_path)): ?>
        <link rel="icon" type="image/png" href="<?= $icon_web_path ?>" />
    <?php else: ?>
        <link rel="icon" href="default_favicon.ico" />
    <?php endif; ?>
</head>
<body>
<?php
echo "welcome to main";
?>
</body>
</html>
