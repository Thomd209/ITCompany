<?php require_once '../app/config.php'; ?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ITCompany</title>
    <link rel="stylesheet" href="../public/libs/bootstrap.min.css">
    <link rel="stylesheet" href="../public/libs/font-awesome/css/all.min.css">
    <link rel="stylesheet" href="../public/css/admin/style.css">
</head>
<body>
    <div class="wrapper">
        <header class="header">
            <div class="login">
                <span>Вы вошли как <?php echo $_SESSION['login']; ?></span>
                <?php if ($_SESSION['login'] == "admin") { ?>
                    <a class="login__link-admin-page" href="../index.php">Главная</a>
                <?php } ?>
            </div>
            <div class="header__content">
                <a href="index.php" class="header__logo">ITCompany</a>
                <ul class="main-nav__logout">
                    <li class="main-nav__item-logout">
                        <a href="../logout.php" class="main-nav__link main-nav__link-admin-logout"><i class="fas fa-sign-out-alt"></i> Выход</a>
                    </li>
                </ul>
            </div>
        </header>