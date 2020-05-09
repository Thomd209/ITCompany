<?php //Страница регистрации пользователей ?>
<?php session_start(); ?>
<?php require_once 'app/config.php'; ?>
<?php require_once 'app/validation.php'; ?>
<?php require_once 'app/signup_script.php'; ?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="public/libs/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/includes/signup.css">
</head>
<body>
    <div class="signup">
        <h2 class="signup__title">Регистрация</h2>
        <p class="signup__question">Уже есть аккаунт? <a href="signin.php">Войти</a></p>
        <?php if ($num_empty_fields > 0) { ?>
            <div class="signup__empty_fields_message">
            <p>Пожалуйста, исправьте следующие ошибки:</p>
            <ul>
                <li><strong>Email:</strong> Это поле должно быть заполнено</li>
                <li><strong>Логин:</strong> Это поле должно быть заполнено</li>
                <li><strong>Пароль:</strong> Это поле должно быть заполнено</li>
                <li><strong>Подтверждение пароля:</strong> Это поле должно быть заполнено</li>
            </ul>
        </div>
        <?php } ?>
        <p class="signup__error-message"><?php echo $error_message;  ?></p>
        <form class="signup__form" action="signup.php" method="post">
            <div class="form-group">
                <label for="email">Email:</label>
                <input class="form-control worker-form__worker-input" type="text" value="<?php if (!empty($_POST["email"])) echo $_POST["email"]; ?>" name="email" id="email">
            </div>
            <div class="form-group">
                <label for="login">Логин:</label>
                <input class="form-control worker-form__worker-input" type="text" value="<?php if (!empty($_POST["login"])) echo $_POST["login"]; ?>" name="login" id="login">
            </div>
            <div class="form-group">
                <label for="pass">Пароль:</label>
                <input class="form-control worker-form__worker-input" type="password" value="<?php if (!empty($_POST["pass"])) echo $_POST["pass"]; ?>" name="pass" id="pass">
            </div>
            <div class="form-group">
                <label for="pass_confirm">Повторите пароль:</label>
                <input class="form-control worker-form__worker-input" type="password" value="<?php if (!empty($_POST["pass_confirm"])) echo $_POST["pass_confirm"]; ?>" name="pass_confirm" id="pass_confirm">
            </div>
            <input class="signup__submit" type="submit" name="submit" value="Зарегистрироваться">
        </form>
    </div>
</body>
</html>