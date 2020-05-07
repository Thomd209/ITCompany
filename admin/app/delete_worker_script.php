<?php 
    //Скрипт, позволяющий удалить работника
    
    function delete_worker($worker_id) {
        global $pdo;
        $query = "DELETE FROM workers WHERE id = ?";
        $query_result = $pdo->prepare($query);
        $query_result->execute([$worker_id]);
    }

    delete_worker($_GET['worker_id']);
?>