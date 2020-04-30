<?php
    $name_checked = '';
    $age_checked = '';
    $salary_checked = '';

    if (isset($_POST['submit'])) {
        $name_checked = check_form_data($_POST['name']);
        $age_checked = check_form_data($_POST['age']);
        $salary_checked = check_form_data($_POST['salary']);
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
        create_worker($_SESSION['position'], $_POST['name'], $_POST['age'], $_POST['salary'], $_SESSION['position_id']);
    }

    function create_worker($position, $name, $age, $salary, $position_id) {
        global $pdo;
        $name = clean_data($name);
        $age = clean_data($age);
        $salary = clean_data($salary);
        $query = "INSERT INTO workers SET position = ?, name = ?, age = ?, salary = ?, position_id = ?";
        $query_result = $pdo->prepare($query);
        $query_result->execute([$position, $name, $age, $salary, $position_id]);
        header('Location: index.php');
    }   
?>