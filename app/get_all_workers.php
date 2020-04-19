<?php 
    //Получение всех работников

    function get_all_workers() {
        global $pdo;
        $query = "SELECT * FROM workers";
        $query_result = $pdo->query($query);
        return $query_result;
    }

    $all_workers = get_all_workers();

?>