<?php 
    include "../controllers/include/DB_helper.php";
    include "../controllers/include/config.php";
//    date_default_timezone_set('Asia/Seoul');
//    echo "<pre>";
//    print_r($_REQUEST);
//    die(1);
    $type = $_REQUEST['type'];
    $db_helper = new DB_helper;

    if($type=="signUp")
    {
        $db_helper->Connect();
        $id=$_REQUEST['user_id'];
        $pw=$_REQUEST['user_pw'];
        $name=$_REQUEST['user_name'];
        $query = " insert into user (id, pw, name, reg_dttm) values ('".$id."', sha2('".$pw."', 256), '".$name."', sysdate())";
        $result = $db_helper->Insert($query);
        echo $result;
    }
    else if($type=="login")
    {
        $db_helper->Connect();
        $user_id=$_REQUEST['user_id'];
        $user_pw=$_REQUEST['user_pw'];
        $query="select * from user where id = '".$user_id."' and pw = sha2('".$user_pw."', 256)";
        $result=$db_helper->Select($query);
        if(count($result)>0){
            session_start(); //세션 시작 및 생성
            $_SESSION['user_id']= $user_id;
            $_SESSION['user_pw']= $user_pw;
            echo json_encode($result);
        }else{
            echo 0;
        }
    }
?>