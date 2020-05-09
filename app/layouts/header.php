<?php require_once 'app/config.php'; ?>
<?php require_once 'app/get_positions.php'; ?>

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
            <div class="login">
                <span>Вы вошли как <?php echo $_SESSION['login']; ?></span>
                <?php if ($_SESSION['login'] == "admin") { ?>
                    <a class="login__link-admin-page" href="admin/index.php">Админка</a>
                <?php } ?>
            </div>
            <div class="header__content">
                <a href="index.php" class="header__logo">ITCompany</a>
                <nav class="main-nav">
                    <ul class="main-nav__menu">
                        <?php foreach ($positions as $row) { ?>
                            <li class="main-nav__item">
                                <a href="position.php?position=<?php echo $row['id']; ?>" class="main-nav__link main-nav__link-menu"><?php echo $row['position']; ?></a>
                            </li>
                        <?php } ?>
                    </ul>
                    <ul class="main-nav__logout">
                        <li class="main-nav__item-logout">
                            <a href="logout.php" class="main-nav__link main-nav__link-logout"><i class="fas fa-sign-out-alt"></i> Выход</a>
                        </li>
                    </ul>
                </nav>
                <div class="header__burger">
                    <span class="header__burger-item"></span>
                </div>
            </div>
        </header>