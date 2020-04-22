<?php require_once 'app/header.php'; ?>
<?php require_once 'app/get_positions.php'; ?>
<?php require_once 'app/search_worker.php'; ?>

<main class="content">
    <span class="content__title">Результаты поиска:</span>
    <table class="table table-responsive content__information-table">
        <tr>
            <th>Имя</th>
            <th>Должность</th>
            <th>Возраст</th>
            <th>Зарплата</th>
        </tr>
        <?php while ($row = $search_result->fetch()) { ?>
            <tr>
                <td><a href="worker.php?worker=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></td>
                <td><?php echo $row['position']; ?></td>
                <td><?php echo $row['age']; ?></td>
                <td> <?php echo $row['salary']; ?></td>
            </tr>
        <?php } ?>
    </table>
</main>

<?php require_once 'app/footer.php'; ?>