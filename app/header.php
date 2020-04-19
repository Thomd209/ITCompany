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
            <nav class="header__top-menu">
                <a class="header__logo" href="index.php">ITCompany</a>
                <div class="header__menu-btn">
                    <span class="header__menu-btn-item header__menu-btn-first-item"></span>
                    <span class="header__menu-btn-item"></span>
                    <span class="header__menu-btn-item"></span>
                </div>
                <!--<span class="header__menu-btn"><i class="fas fa-bars"></i></span>-->
                <ul class="header__menu-list">
                    <?php foreach ($positions as $row) { ?>
                        <li class="header__list-item"><a class="header__list-link" href="?position=<?php echo $row['id']; ?>"><?php echo $row['position']; ?></a></li>
                    <?php } ?>
                </ul>
            </nav>
        </header>