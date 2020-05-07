<?php 
    //Скрипт, позволяющий осуществить пользователю вход на сайт
    if (isset($_POST['submit'])) {
        $num_empty_fields = check_fields_for_emptiness($_POST['login']);
        $num_empty_fields = check_fields_for_emptiness($_POST['pass']);
    }

    if (isset($_POST['submit']) && !empty($_POST['login']) && !empty($_POST['pass'])) {
        $user = get_user_data($_POST['login']);
        $bad_input_data = check_user($user);
    }

    function get_user_data($login) {
        global $pdo;
        $query = "SELECT * FROM users WHERE login = ?";
        $query_result = $pdo->prepare($query);
        $query_result->execute([$login]);
        $user = $query_result->fetchAll();
        return $user;
    }

    function check_user($user) {
        if (!empty($user)) {
            foreach ($user as $row) {
                $hash = $row['password'];
            }

            if (password_verify($_POST['pass'], $hash)) {
                $_SESSION['auth'] = true;
                $_SESSION['login'] = $_POST['login'];
                header('Location: index.php');
            } else {
                $bad_input_data = "Введённые вами логин или пароль являются неправильными";
            }
        }

        return $bad_input_data;
    }
?>