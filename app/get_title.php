<?php 
    //Скрипт, выводящий название одной должности, на страницу position.php

    function get_title($position) {
        global $pdo;
        $query = "SELECT position FROM positions WHERE id = ?";
        $query_result = $pdo->prepare($query);
        $query_result->execute([$position]);
        return $query_result;
    }

    $title = get_title($_GET['position']);
?>