<?php //Страница входа на сайт ?>
<?php session_start(); ?>
<?php require_once 'app/config.php'; ?>
<?php require_once 'app/validation.php'; ?>
<?php require_once 'app/signin_script.php'; ?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signin</title>
    <link rel="stylesheet" href="public/libs/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/includes/signin.css">
</head>
<body>
    <div class="signin">
        <h2 class="signin__title">Вход</h2>
        <p class="signin__question">Нет аккаунта? <a href="signup.php">Зарегистрироваться</a></p>
        <?php if ($num_empty_fields > 0) { ?>
        <div class="signin__empty_fields_message">
            <p>Пожалуйста, исправьте следующие ошибки:</p>
            <ul>
                <li><strong>Логин:</strong> Это поле должно быть заполнено</li>
                <li><strong>Пароль:</strong> Это поле должно быть заполнено</li>
            </ul>
        </div>
        <?php } ?>
        <p class="signin__bad-input-data"><?php echo $bad_input_data; ?></p>
        <form class="signin__form" action="signin.php" method="post">
            <div class="form-group">
                <label for="login">Логин:</label>
                <input class="form-control signin__input" type="text" value="<?php echo $_POST['login']; ?>" name="login" id="login">
            </div>
            <div class="form-group">
                <label for="pass">Пароль:</label>
                <input class="form-control signin__input" type="password" value="<?php echo $_POST['pass']; ?>" name="pass" id="pass">
            </div>
            <input class="signin__submit" type="submit" name="submit" value="Войти">
        </form>
    </div>
</body>
</html>