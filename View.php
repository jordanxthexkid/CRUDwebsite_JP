<?php

if(isset($_Post['VIEW']))
{
    $valueToSearch = $_POST['valueToSearch'];
    $query = "SELECT * FROM 'Disc' WHERE CONCAT('Type', 'Name', 'Game')LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
}
else {
    $query = "SELECT *  FROM 'Disc'";
    $search_result = filterTable($query);
}

function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "Gamestop");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>