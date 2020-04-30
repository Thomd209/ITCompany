<?php 
    function check_form_data($data) {
        if (empty($data)) {
            $data = 'Это поле обязательно для заполнения';
        } else {
            $data = '';
        }

        return $data;
    }
?>