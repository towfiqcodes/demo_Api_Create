<?php

header('content-type: application/json');

$request=$_SERVER['REQUEST_METHOD'];

switch ($request){
    case 'GET':
        //echo '{"name":" get...Md Towfiqul Islam"}';
        getMethod();
        break;
    case 'POST':
      //  echo '{"name":" post...Md Towfiqul Islam"}';
       $data=json_decode(file_get_contents('php://input'),true);
        postMethod($data);
        break;
    case 'PUT':
       // echo '{"name":" put...Md Towfiqul Islam"}';
        $data=json_decode(file_get_contents('php://input'),true);
        putMethod($data);
        break;
    case 'DELETE':
       // echo '{"name":" delete...Md Towfiqul Islam"}';
        $data=json_decode(file_get_contents('php://input'),true);
        deleteMethod($data);
        break;
    default:
        echo '{"name":" Data Not Found"}';
        break;
}
//get data
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
// Insert the data
function postMethod($data){
   include "db.php";

    $name=$data["name"];
    $email=$data["email"];
    $sql="INSERT INTO demoapi(name,email,created_at) VALUES('$name' ,'$email', NOW())";

    if (mysqli_query($conn , $sql)){
        echo '{"result":" Data Inserted"}';
    }else{
        echo '{"result":" Data not Inserted"}';
    }

}
//update the data
function putMethod($data){
   include "db.php";
    $id=$data["id"];
   $name=$data["name"];
    $email=$data["email"];
    $sql="UPDATE demoapi SET name='$name', email='$email', created_at=NOW() WHERE id='$id' ";

    if (mysqli_query($conn , $sql)){
        echo '{"result":" Update Successfully"}';
    }else{
        echo '{"result":"not Updated"}';
    }

}
//Delete the data
function deleteMethod($data){
    include "db.php";
    $id=$data["id"];
    $sql="DELETE FROM demoapi WHERE id='$id'";

    if (mysqli_query($conn , $sql)){
        echo '{"result":" Delete Successfully"}';
    }else{
        echo '{"result":"not Deleted"}';
    }

}
