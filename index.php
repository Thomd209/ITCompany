<?php require_once 'app/header.php'; ?>
<?php require_once 'app/get_all_workers.php'; ?>

<main class="content">
    <table class="table table-responsive content__table-all-workers">
        <tr>
            <th>Имя</th>
            <th>Возраст</th>
            <th>Зарплата</th>
        </tr>
        <?php while ($row = $all_workers->fetch()) { ?>
            <tr>
                <td><?php echo $row['name'] ?></td>
                <td><?php echo $row['age'] ?></td>
                <td><?php echo $row['salary'] ?></td>
            </tr>
        <?php } ?>
    </table>
</main>
    
<?php require_once 'app/footer.php'; ?>