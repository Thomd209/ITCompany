<?php require_once 'app/config.php' ?>
<?php require_once 'app/get_positions.php' ?>
<?php require_once 'app/header.php' ?>
<?php require_once 'app/get_worker.php' ?>

<main class="content">
    <span class="content__title">Информация о работнике:</span>
    <div class="content__worker-inform">
        <?php while ($row = $worker->fetch()) { ?>
            <span class="content__worker-row"><span class="content__worker-description">Имя:</span> <?php echo $row['name'] ?></span>
            <span class="content__worker-row"><span class="content__worker-description">Должность:</span> <?php echo $row['position'] ?></span>
            <span class="content__worker-row"><span class="content__worker-description">Возраст:</span> <?php echo $row['age'] ?></span>
            <span class="content__worker-row"><span class="content__worker-description">Зарплата:</span> <?php echo $row['salary'] ?></span>
        <?php } ?>
    </div>
</main>

<?php require_once 'app/footer.php'; ?>