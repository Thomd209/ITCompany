<?php
    //Получение всех существующих должностей в компании

    function get_positions() {
        global $pdo;
        $query = "SELECT * FROM positions";
        $query_result = $pdo->query($query);
        $positions = $query_result->fetchAll();
        return $positions;
    }

    $positions = get_positions();
?>