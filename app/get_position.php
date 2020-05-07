<?php
    //Скрипт, позволяющий осуществить вывод данных на страницу position.php
    
    function get_position($position) {
        global $pdo;
        $query = "SELECT * FROM workers WHERE position_id = ?";
        $query_result = $pdo->prepare($query);
        $query_result->execute([$position]);
        return $query_result;
    }

    if (isset($_GET['position'])) {
        $workers = get_position($_GET['position']);
    }
?>