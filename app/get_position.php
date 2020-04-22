<?php
    //Получение работников, которые занимают одну определённую должность
    
    function get_position($position) {
        global $pdo;
        $query = "SELECT * FROM workers WHERE position_id = ?";
        $query_result = $pdo->prepare($query);
        $query_result->execute([$position]);
        return $query_result;
    }

    $workers = get_position($_GET['position']);
?>