<?php session_start(); ?>
<?php require_once '../app/config.php'; ?>
<?php require_once 'app/check_form_data.php'; ?>
<?php require_once 'app/clean_data.php'; ?>
<?php require_once 'app/create_worker_script.php'; ?>
<?php require_once 'app/header.php'; ?>

<main class="content">
    <span class="worker-title">Создать работника</span>
    <form class="worker-form" action="create_worker.php" method="POST">
        <div class="form-group">
            <label for="name">Имя:</label>
            <input class="form-control worker-form__worker-input" type="text" value="<?php echo $_POST['name']; ?>" name="name" id="name">
            <span class="worker-form__empty-field"><?php echo $name_checked; ?></span>
        </div>
        <div class="form-group">
            <label for="age">Возраст:</label>
            <input class="form-control worker-form__worker-input" type="text" value="<?php echo $_POST['age']; ?>" name="age" id="age">
            <span class="worker-form__empty-field"><?php echo $age_checked; ?></span>
        </div>
        <div class="form-group">
            <label for="salary">Зарплата:</label>
            <input class="form-control worker-form__worker-input" type="text" value="<?php echo $_POST['salary']; ?>" name="salary" id="salary">
            <span class="worker-form__empty-field"><?php echo $salary_checked; ?></span>
        </div>
        <button type="submit" class="btn btn-success" name="submit">Отправить</button>
    </form>
</main>

<?php require_once 'app/footer.php'; ?>