<?php require_once 'app/config.php' ?>
<?php require_once 'app/get_positions.php' ?>
<?php require_once 'app/header.php' ?>
<?php require_once 'app/get_title.php'; ?>
<?php require_once 'app/get_position.php'; ?>

<main class="content">
        <?php while ($row = $title->fetch()) { ?>
            <span class="content__title"><?php echo $row['position']; ?></span>
        <?php } ?>
    </span>
    <table class="table table-responsive content__information-table">
        <tr>
            <th>Имя</th>
            <th>Должность</th>
            <th>Возраст</th>
            <th>Зарплата</th>
        </tr>
        <?php while ($row = $workers->fetch()) { ?>
            <tr>
                <td><a href="worker.php?worker=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></td>
                <td><?php echo $row['position']; ?></td>
                <td><?php echo $row['age']; ?></td>
                <td><?php echo $row['salary']; ?></td>
            </tr>
        <?php } ?>
    </table>
</main>

<?php require_once 'app/footer.php'; ?>