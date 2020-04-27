<?php
    if (empty($_GET['page']) || ctype_digit($_GET['page']) === false) {
        $page = 1;
    } else {
        $page = $_GET['page'];
    }

    function count_rows() {
        global $pdo;
        $query = "SELECT COUNT(*) FROM workers";
        $query_result = $pdo->query($query);
        $num_rows_arr = $query_result->fetch();
        $num_rows = (int) $num_rows_arr["COUNT(*)"];
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
        global $pdo, $offset, $limit;
        $query = "SELECT * FROM workers WHERE id > 0 LIMIT ?, ?";
        $query_result = $pdo->prepare($query);
        $query_result->execute([$offset, $limit]);
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