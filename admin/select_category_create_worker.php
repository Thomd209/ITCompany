<?php require_once '../app/config.php'; ?>
<?php require_once 'app/header.php'; ?>
<?php require_once '../app/get_positions.php'; ?>

<main class="content">
    <span class="content__title-select-category">Категория</span>
    <div class="content__categories-container">
        <?php foreach ($positions as $row) { ?>
            <a href="create_worker.php?position_id=<?php echo $row['id']; ?>" class="content__category"><?php echo $row['position']; ?></a>
        <?php } ?>
    </div>
</main>

<?php require_once 'app/footer.php'; ?>