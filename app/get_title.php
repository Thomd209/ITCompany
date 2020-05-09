<?php 
    //Скрипт, выводящий название одной должности, на страницу position.php

    $title = [];

    if (!empty($_GET['position'])) {
        $title = get_title($_GET['position']);
    }

    function get_title($position) {
        global $pdo;
        $query = "SELECT position FROM positions WHERE id = ?";
        $query_result = $pdo->prepare($query);
        $query_result->execute([$position]);
        $title = $query_result->fetchAll();
        return $title;
    }
?>