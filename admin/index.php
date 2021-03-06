<?php //Главная страница админки сайта ?>
<?php session_start(); ?>
<?php if (!empty($_SESSION['auth']) && $_SESSION['login'] == "admin") { ?>
    <?php require_once '../app/config.php'; ?>
<?php require_once '../app/main_page_pagination.php'; ?>
<?php require_once 'app/delete_worker_script.php'; ?>
<?php require_once 'app/layouts/header.php'; ?>

<main class="content">
    <form class="search" action="../search.php" method="POST">
        <div class="search__control">
            <input class="search__text" type="search" name="search" placeholder="Поиск работника">
            <button class="search__button" type="submit" name="submit_search">Найти</button>
        </div>
    </form>
    <span class="content__title">Все работники компании:</span>
    <a class="content__btn-add-worker btn btn-success" href="select_category.php"><i class="fas fa-user-plus"></i></a>
    <table class="table table-responsive content__information-table">
        <tr>
            <th>Имя</th>
            <th>Должность</th>
            <th>Возраст</th>
            <th>Зарплата</th>
            <th>Изменить</th>
            <th>Удалить</th>
        </tr>
        <?php foreach ($workers as $row) { ?>
            <tr>
                <td><a href="worker.php?worker=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></td>
                <td><?php echo $row['position']; ?></td>
                <td><?php echo $row['age']; ?></td>
                <td><?php echo $row['salary']; ?></td>
                <td class="center"><a class="btn btn-primary" href="select_category.php?id=<?php echo $row['id']; ?>"><i class="fas fa-user-edit"></i></td>
                <td><a class="btn btn-danger" href="?worker_id=<?php echo $row['id']; ?>"><i class="fas fa-user-minus"></i></td>
            </tr>
        <?php } ?>
    </table>
    <div class="content__pagination">
        <ul class="content__pagination-control">
        <?php if ($page > 1) { ?>
            <a class="content__pagination-link" href="?page=<?php echo $prev; ?>">&laquo;</a>
        <?php } ?>
        <?php if ($num_pages <= 5) { ?>
            <?php foreach (range(1, $num_pages) as $p) { ?>
                <li class="content__pagination-item">
                    <a class="content__pagination-link" href="?page=<?php echo $p; ?>"><?php echo $p; ?></a>
                </li>
            <?php } ?>
        <?php } ?>

        <?php if ($num_pages > 5 && $page <= 5) { ?>
            <?php foreach (range(1, 5) as $p) { ?>
                <li class="content__pagination-item">
                    <a class="content__pagination-link" href="?page=<?php echo $p; ?>"><?php echo $p; ?></a>
                </li>
            <?php } ?>
        <?php } ?>

        <?php if ($num_pages - 5 <= 5 && $num_pages - 5 > 0 && $page > 5) { ?>
            <?php foreach (range($num_pages - 4, $num_pages) as $p) { ?>
                <li class="content__pagination-item">
                    <a class="content__pagination-link" href="?page=<?php echo $p; ?>"><?php echo $p; ?></a>
                </li>
            <?php } ?>
        <?php } ?>

        <?php if ($num_pages - 5 > 5 && $page > 5 && $page < $num_pages - 4) { ?>
            <?php foreach (range($page - 2, $page + 2) as $p) { ?>
                <li class="content__pagination-item">
                    <a class="content__pagination-link" href="?page=<?php echo $p; ?>"><?php echo $p; ?></a>
                </li>
            <?php } ?>
        <?php } ?>

        <?php if ($num_pages - 5 > 5 && $page >= $num_pages - 4) { ?>
            <?php foreach (range($num_pages - 4, $num_pages) as $p) { ?>
                <li class="content__pagination-item">
                    <a class="content__pagination-link" href="?page=<?php echo $p; ?>"><?php echo $p; ?></a>
                </li>
            <?php } ?>
        <?php } ?>
        <?php if ($page < $num_pages) { ?>
            <a class="content__pagination-link" href="?page=<?php echo $next; ?>">&raquo;</a>
        <?php } ?>
        </ul>
    </div>
</main>

<?php require_once 'app/layouts/footer.php'; ?>

<?php } else {
    header('Location: ../index.php');
}
?>