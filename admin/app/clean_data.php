<?php 
    function clean_data($data) {
        $data = trim($data);
        $data = strip_tags($data);
        return $data;
    }
?>