<?php //Страница админки сайта, на которой можно выбрать должность работника, которого нужно добавить или изменить ?>
<?php session_start(); ?>
<?php if (!empty($_SESSION['auth'] && $_SESSION['login'] == "admin")) { ?>
<?php require_once 'app/layouts/header.php'; ?>
<?php require_once '../app/get_positions.php'; ?>

<main class="content">
    <span class="content__title-select-category">Категория</span>
    <div class="content__categories-container">
        <?php foreach ($positions as $row) { ?>
            <?php if (empty($_GET['id'])) { ?>
                <a href="create_worker.php?position_id=<?php echo $row['id']; ?>" class="content__category"><?php echo $row['position']; ?></a>
            <?php } else { ?>
                <a href="change_worker.php?position_id=<?php echo $row['id']; ?>&worker_id=<?php echo $_GET['id']; ?>" class="content__category"><?php echo $row['position']; ?></a>
            <?php } ?> 
        <?php } ?>
    </div>
</main>

<?php require_once '../../ITCompany/app/layouts/footer.php'; ?>

<?php } else {
    header('Location: ../index.php');
}
?>