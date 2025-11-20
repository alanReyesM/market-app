<?php
$icon_path = __DIR__ . '/icons/market_main.png';
$icon_web_path = 'icons/market_main.png';
session_start();
if(!isset($_SESSION['session_user_id'])){
      header('refresh:0;url=error_403.html');

    }
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
//echo "welcome to main";
?>
<table border="0" align='center'>
 <tr>
    <td> <b>user: </b>
    <?php echo $_SESSION['session_user_fulname'];?></td>
    <td><?php echo "<img src='". $_SESSION['session_user_url_photo']."' width='30'>";?></td>
</tr>
</table>

<a href="list_users.php">list all users</a> |
<a href="logout.php">logout</a>
</body>
</html>
