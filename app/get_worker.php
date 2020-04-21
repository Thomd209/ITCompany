<?php
    function get_worker($worker) {
        global $pdo;
        $query = "SELECT * FROM workers WHERE id = ?";
        $query_result = $pdo->prepare($query);
        $query_result->execute([$worker]);
        return $query_result;
    }

    $worker = get_worker($_GET['worker']);
?>