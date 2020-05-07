<?php
    //Скрипт, позволяющий осуществить паджинацию на странице position.php

    if (empty($_SESSION['position'])) {
        $_SESSION['position'] = 0;
    }

    switch ($_GET['position']) {
        case 1:
            $_SESSION['position'] = 1;
            break;
        case 2:
            $_SESSION['position'] = 2;
            break;
        case 3:
            $_SESSION['position'] = 3;
            break;
        case 4:
            $_SESSION['position'] = 4;
            break;
    }

    if (empty($_GET['page']) || ctype_digit($_GET['page']) === false) {
        $position = $_GET['position'];
        $page = 1;
    } else {
        $position = $_GET['id'];
        $page = $_GET['page'];
    }

    function count_rows() {
        global $pdo, $position;
        $query = "SELECT COUNT(*) FROM workers WHERE position_id = ?";
        $query_result = $pdo->prepare($query);
        $query_result->execute([$position]);
        $num_rows_arr = $query_result->fetch();
        $num_rows = (int) $num_rows_arr["COUNT(*)"];
        var_dump($num_rows);
        return $num_rows;
    }

    function count_offset() {
        global $page, $limit;
        $offset = ($page * $limit) - $limit;
        return $offset;
    }

    function count_pages() {
        global $num_rows, $limit;
        $num_pages = ceil($num_rows / $limit);
        return $num_pages;
    }

    function make_pagination() {
        global $pdo, $position, $offset, $limit;
        $query = "SELECT * FROM workers WHERE id > 0 AND position_id = ? LIMIT ?, ?";
        $query_result = $pdo->prepare($query);
        $query_result->execute([$position, $offset, $limit]);
        return $query_result;
    }
    

    $num_rows = count_rows();
    $limit = 4;
    $offset = count_offset();
    $num_pages = count_pages();

    if ($page == 1) {
        $prev = '#';
    } else {
        $prev = $page - 1;
    }

    if ($page == $num_pages) {
        $next = 1;
    } else {
        $next = $page + 1;
    }

    $workers = make_pagination();
?>