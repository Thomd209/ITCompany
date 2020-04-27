<?php
    //Поиск работника в таблице workers

    function search_worker($search) {
        global $pdo;
        $arr_search = explode(" ", $search);
        if (count($arr_search) === 1) {
            $str_search = implode("", $arr_search);
            $query = "SELECT * FROM workers WHERE position LIKE ? OR name LIKE ?";
            $search_result = $pdo->prepare($query);
            $search_result->execute(['%' . $str_search . '%', '%' . $str_search . '%']);
        } else if (count($arr_search) === 2) {
            $query = "SELECT * FROM workers WHERE position LIKE ? AND name LIKE ? 
            OR name LIKE ? AND position LIKE ?";
            $search_result = $pdo->prepare($query);
            $search_result->execute(['%' . $arr_search[0] . '%', '%' . $arr_search[1] . '%', 
            '%' . $arr_search[0] . '%', '%' . $arr_search[1] . '%']);
        }

        return $search_result;
    }
    
    if (isset($_POST['submit_search'])) {
        $search_result = search_worker($_POST['search']);
    } 
?>