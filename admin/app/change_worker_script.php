<?php
    //Скрипт, позволяющий изменить работника

    if (isset($_POST['submit'])) {
        $num_empty_fields = check_fields_for_emptiness($_POST['name']);
        $num_empty_fields = check_fields_for_emptiness($_POST['age']);
        $num_empty_fields = check_fields_for_emptiness($_POST['salary']);
    }
    
    switch ($_GET['position_id']) {
        case 1:
            $_SESSION['position'] = 'менеджер';
            $_SESSION['position_id'] = 1;
            break;
        case 2:
            $_SESSION['position'] = 'дизайнер';
            $_SESSION['position_id'] = 2;
            break;
        case 3:
            $_SESSION['position'] = 'frontend-разработчик';
            $_SESSION['position_id'] = 3;
            break;
        case 4:
            $_SESSION['position'] = 'backend-разработчик';
            $_SESSION['position_id'] = 4;
            break;
    }

    if (isset($_POST['submit']) && $_POST['name'] !== '' && $_POST['age'] !== '' && $_POST['salary'] !== '') {
        change_worker($_SESSION['position'], $_POST['name'], $_POST['age'], $_POST['salary'], $_SESSION['position_id'], $_GET['worker_id']);
    }

    function change_worker($position, $name, $age, $salary, $position_id, $worker_id) {
        global $pdo;
        $name = clean_data($name);
        $age = clean_data($age);
        $salary = clean_data($salary);
        $query = "UPDATE workers SET position = ?, name = ?, age = ?, salary = ?, position_id = ? WHERE id = ?";
        $query_result = $pdo->prepare($query);
        $query_result->execute([$position, $name, $age, $salary, $position_id, $worker_id]);
        header('Location: index.php');
    }   
?>