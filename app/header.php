<?php require_once 'app/config.php' ?>
<?php require_once 'app/get_positions.php' ?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ITCompany</title>
    <link rel="stylesheet" href="public/libs/bootstrap.min.css">
    <link rel="stylesheet" href="public/libs/font-awesome/css/all.min.css">
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    <div class="wrapper">
        <header class="header">
            <div class="header__content">
                <a href="index.php" class="header__logo">ITCompany</a>
                <div class="header__menu">
                    <ul class="header__list">
                        <?php foreach ($positions as $row) { ?>
                            <li class="header__list-item"><a href="position.php?position=<?php echo $row['id']; ?>" class="header__link"><?php echo $row['position']; ?></a></li>
                        <?php } ?>
                    <ul>
                </div>
                <div class="header__burger">
                    <span class="header__burger-item"></span>
                </div>
            </div>
        </header>