<?php
    //Скрипт, позволяющий зарегистрироваться пользователю на сайте
    $num_empty_fields = "";

    if (isset($_POST['submit'])) {
        $num_empty_fields = check_fields_for_emptiness($_POST['email']);
        $num_empty_fields = check_fields_for_emptiness($_POST['login']);
        $num_empty_fields = check_fields_for_emptiness($_POST['pass']);
        $num_empty_fields = check_fields_for_emptiness($_POST['pass_confirm']);
    }

    $error_message = "";

    if (isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['login']) && !empty($_POST['pass']) && !empty($_POST['pass_confirm'])) {
        $error_message = check_data();
        if (empty($error_message)) {
            $query_result = count_rows();
            while ($row = $query_result->fetch()) {
                $num_rows = $row['COUNT(*)'];
            }

            if (empty($num_rows)) {
                $status = 1;
            } else {
                $status = 2;
            }

            $password = password_hash($_POST['pass'], PASSWORD_DEFAULT);
            create_user($password, $status);
        }
    }

    function count_rows() {
        global $pdo;
        $query = "SELECT COUNT(*) FROM users";
        $query_result = $pdo->query($query);
        return $query_result;
    }

    function create_user($password, $status) {
        global $pdo;
        $login = clean_data($_POST['login']);
        $query = "INSERT INTO users SET email = ?, login = ?, password = ?, status_id = ?";
        $query_result = $pdo->prepare($query);
        $query_result->execute([$_POST['email'], $_POST['login'], $password, $status]);
        $_SESSION['auth'] = true;
        $_SESSION['login'] = $_POST['login'];
        header("Location: index.php");
    }
?>