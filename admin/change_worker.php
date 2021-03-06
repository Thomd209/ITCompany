<?php //Страница админки сайта, на которой можно изменить работника ?>
<?php session_start(); ?>
<?php if (!empty($_SESSION['auth'] && $_SESSION['login'] == "admin")) { ?>
<?php require_once '../app/config.php'; ?>
<?php require_once '../app/validation.php'; ?>
<?php require_once 'app/change_worker_script.php'; ?>
<?php require_once 'app/layouts/header.php'; ?>

<main class="content">
    <span class="worker-title">Изменить работника</span>
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
    <form class="worker-form" action="change_worker.php?worker_id=<?php echo $_GET['worker_id']; ?>" method="POST">
        <div class="form-group">
            <label for="name">Имя:</label>
            <input class="form-control worker-form__worker-input" type="text" value="<?php if (!empty($_POST['name'])) echo $_POST['name']; ?>" name="name" id="name">
        </div>
        <div class="form-group">
            <label for="age">Возраст:</label>
            <input class="form-control worker-form__worker-input" type="text" value="<?php if (!empty($_POST['age'])) echo $_POST['age']; ?>" name="age" id="age">
        </div>
        <div class="form-group">
            <label for="salary">Зарплата:</label>
            <input class="form-control worker-form__worker-input" type="text" value="<?php if (!empty($_POST['salary'])) echo $_POST['salary']; ?>" name="salary" id="salary">
        </div>
        <button type="submit" class="btn btn-success" name="submit">Отправить</button>
    </form>
</main>

<?php require_once 'app/layouts/footer.php'; ?>

<?php } else {
    header('Location: ../index.php');
}
?>