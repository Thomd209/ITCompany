<?php //Страница админки сайта, на которой можно создать работника ?>
<?php session_start(); ?>
<?php if (!empty($_SESSION['auth'] && $_SESSION['login'] == "admin")) { ?>
<?php require_once '../app/config.php'; ?>
<?php require_once '../app/validation.php'; ?>
<?php require_once 'app/create_worker_script.php'; ?>
<?php require_once 'app/layouts/header.php'; ?>

<main class="content">
    <p class="worker-title">Создать работника</p>
    <?php if ($num_empty_fields > 0) { ?>
    <div class="worker__empty-fields-message">
        <p>Пожалуйста, исправьте следующие ошибки:</p>
        <ul>
            <li><strong>Имя:</strong> Это поле должно быть заполнено</li>
            <li><strong>Возраст:</strong> Это поле должно быть заполнено</li>
            <li><strong>Зарплата:</strong> Это поле должно быть заполнено</li>
        </ul>
    </div>
    <?php } ?>
    <form class="worker-form" action="create_worker.php" method="POST">
        <div class="form-group">
            <label for="name">Имя:</label>
            <input class="form-control worker-form__worker-input" type="text" value="<?php echo $_POST['name']; ?>" name="name" id="name">
        </div>
        <div class="form-group">
            <label for="age">Возраст:</label>
            <input class="form-control worker-form__worker-input" type="text" value="<?php echo $_POST['age']; ?>" name="age" id="age">
        </div>
        <div class="form-group">
            <label for="salary">Зарплата:</label>
            <input class="form-control worker-form__worker-input" type="text" value="<?php echo $_POST['salary']; ?>" name="salary" id="salary">
        </div>
        <button type="submit" class="btn btn-success" name="submit">Отправить</button>
    </form>
</main>

<?php require_once '../../ITCompany/app/layouts/footer.php'; ?>

<?php } else {
    header('Location: ../index.php');
}
?>