<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include './conn.php'; 
$json_data= array();
$q ="SELECT * FROM tbservice where serstatus != 'Fully Complete' ORDER by serid";
$result = $mysqli->query($q);
while ($rs = $result->fetch_object()) {
    if ($rs->timer == '') {
        $color = '#FFFFFF';
    }
    if ($rs->timer == 'ด่วน') {
        $color = '#FF9900';
    }
    
    if ($rs->timer == 'ปกติ') {
        $color = '#02d667';
    }
    
    $json_data[] = [
        'id' => $rs->serid,
        'title' =>
        $rs->timer . ',' . $rs->office . '-' . $rs->sername,
        'start' => $rs->startdate,
        'end' => $rs->startdate,
        'url' => 'showEventsData.php?serid=' . $rs->serid,
        'color' => $color,
    ];
}
$q1 ="SELECT * FROM tbnewwork where prostatus != 'Fully Complete' ORDER by newid";
$result1 = $mysqli->query($q1);
while ($rs1 = $result1->fetch_object()) {
    if ($rs1->project == '') {
        $color = '#FFFFFF';
    }
    if ($rs1->project != '') {
        $color = '#B22222';
    }

    $json_data[] = [
        'id' => $rs1->newid,
        'title' =>
        $rs1->project . ',' . $rs1->office,
        'start' => $rs1->startdate,
        'end' => $rs1->startdate,
        'url' => 'showEventsData.php?newid=' . $rs1->newid,
        'color' => $color,
    ];
}
$json = json_encode($json_data);
echo $json;
