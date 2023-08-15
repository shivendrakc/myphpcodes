<?php
    include('db.php');
    $obj = new Query();
    $condition_arr = ["id"=>"13", "name"=>"Shivendra", "mobile"=>"9841781923"];
    $result = $obj->getData('users', '', $condition_arr, '', '', '');
    //$result = $obj->InsertData('users', $condition_arr);
    //$result = $obj->DeleteData('users', $condition_arr);
    //$result = $obj->UpdateData('users', $condition_arr, 'id', '2');
    echo '<pre>';
    print_r($result);
?>