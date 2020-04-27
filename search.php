<?php require_once 'app/header.php'; ?>
<?php require_once 'app/search_workers.php'; ?>

<main class="content">
    <form class="search" action="search.php" method="POST">
        <div class="search__control">
            <input class="search__text" type="search" name="search" placeholder="Поиск работника">
            <button class="search__button" type="submit" name="submit_search">Найти</button>
        </div>
    </form>
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