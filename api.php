<?php

header('content-type: application/json');

$request=$_SERVER['REQUEST_METHOD'];

switch ($request){
    case 'GET':
        //echo '{"name":" get...Md Towfiqul Islam"}';
        getMethod();
        break;
    case 'POST':
        echo '{"name":" post...Md Towfiqul Islam"}';
        break;
    case 'PUT':
        echo '{"name":" put...Md Towfiqul Islam"}';
        break;
    case 'PATCH':
        echo '{"name":" patch...Md Towfiqul Islam"}';
        break;
    case 'DELETE':
        echo '{"name":" delete...Md Towfiqul Islam"}';
        break;
    default:
        echo '{"name":" Data Not Found"}';
        break;
}

function getMethod(){
    include "db.php";
$sql="SELECT * FROM demoapi";
    $result=mysqli_query($conn, $sql);
    if (mysqli_num_rows($result)>0){
    $rows=array();
    while ($r= mysqli_fetch_assoc($result)){
        $rows['result'][]=$r;
    }
    echo json_encode($rows);
    }else{
        echo '{"Result":" Data Not Found"}';
    }
}