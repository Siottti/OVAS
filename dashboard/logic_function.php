<?php 
@include 'config.php';


if(isset($_POST))
{
    $select = " SELECT s.* FROM service_list s where s.delete_flag = 0 and FIND_IN_SET((select type from pet where id = ".$_POST["id"]."), category_ids) > 0";
    $result = $conn->query($select);

    $services = [];
    while ($row = $result->fetch_assoc()) {
        array_push($services, $row);
    }

    echo json_encode($services);
}