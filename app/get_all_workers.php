<?php 
    //Получение всех работников компании

    function get_all_workers() {
        global $pdo;
        $query = "SELECT * FROM workers ORDER BY id DESC";
        $query_result = $pdo->query($query);
        return $query_result;
    }

    $all_workers = get_all_workers();

?>