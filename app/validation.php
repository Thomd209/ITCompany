<?php 
    //Валидация данных, введённых пользователем сайта в поля формы

    function check_fields_for_emptiness($field) {
        if (empty($field)) {
            $num_empty_fields = 1;
            return $num_empty_fields;
        }
    }

    function clean_data($field) {
        $field = trim($field);
        $field = strip_tags($field);
        return $field;
    }

    function check_data() {
        $login = find_login();
        if (empty($login)) {
            if (preg_match('#^[a-zA-Z][a-zA-Z0-9]{2,20}$#', $_POST['login']) == 1) {
                if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) != false) {
                    if (preg_match('#^[a-zA-Z0-9-_]{8,}$#', $_POST['pass']) == 1) {
                        if ($_POST['pass'] == $_POST['pass_confirm']) {
                            $error_message = "";
                        } else {
                            $error_message = "Пароль и его подтверждение должны быть одинаковыми";
                        }

                    } else {
                        $error_message = "Пароль может состоять из латинских букв, чисел от 0 до 9 и символа _ . Минимальная длина пароля - 8 символов";
                    }

                } else {
                    $error_message = "Введите корректный email";
                }

            } else {
                $error_message = "Первым символом логина должна быть латинская буква. Логин может содержать только латинские буквы и числа от 0 до 9. Длина логина должна быть от 3 до 20 символов";
            }

        } else {
            $error_message = "Данный логин занят";
        }

        return $error_message;
    }

    function find_login() {
        global $pdo;
        $query = "SELECT login FROM users WHERE login = ?";
        $query_result = $pdo->prepare($query);
        $query_result->execute([$_POST['login']]);
        $login_result = $query_result->fetchAll();
        return $login_result;
    }
?>