<?php
    //Скрипт, выводящий информацию об одном работнике, на страницу worker.php
    
    function get_worker($worker) {
        global $pdo;
        $query = "SELECT * FROM workers WHERE id = ?";
        $query_result = $pdo->prepare($query);
        $query_result->execute([$worker]);
        return $query_result;
    }

    if (isset($_GET['worker'])) {
        $worker = get_worker($_GET['worker']);
    }
?>