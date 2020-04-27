<?php
    //Получение работников, которые занимают определённую должность
    
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