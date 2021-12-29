<?php 
    include "../controllers/include/DB_helper.php";
    include "../controllers/include/config.php";
//    date_default_timezone_set('Asia/Seoul');
//    echo "<pre>";
//    print_r($_REQUEST);
//    die(1);
    $type = $_REQUEST['type'];
    $db_helper = new DB_helper;

    if($type=="new_user")
    {
        $db_helper->Connect();
        $id=$_REQUEST['id'];
        $pw=$_REQUEST['pw'];
        $name=$_REQUEST['name'];
    
        $sql="insert into test.user (id, pw, name) values ('$id','$pw','$name')";
        $db_helper->Insert($sql);
        $db_helper->Disconnect();
    }
    else if($type=="log_in")
    {
        $db_helper->Connect();
        $user_id=$_REQUEST['user_id'];
        $user_pw=$_REQUEST['user_pw'];
        $sql="select * from test.user where id=$user_id and pw=$user_pw";
            
        $user_list=$db_helper->Select($sql);
        if($user_list){
            session_start(); //세션 시작 및 생성
            $_SESSION['user_id']= $user_id;
            $_SESSION['user_pw']= $user_pw;
            echo json_encode($user_list);
        }else{
            echo 0;
        }
        $db_helper->Disconnect();
    }
    else if($type=="getList")
    {
        $db_helper->Connect();
        $query="select * from board";
        $result = $db_helper->Select($query);
        echo json_encode($result);
//        $db_helper->Disconnect();
    }
    else if($type=="get_user_list")
    {
        $db->Connect();
        $sql="select * from test.user";
        $user_list=$db->Select($sql);
        echo json_encode($user_list);
        $db->Disconnect();
    }
    else if($type=="save")
    {
        $db->Connect();
        $title=$_REQUEST['title'];
        $content=$_REQUEST['content'];
        $writer=$_REQUEST['writer'];
        $date=date('Y-m-d H:i:s');
    
        $sql="insert into test.notice (title, content, writer, wr_date) values('$title', '$content','$writer','$date')";
        $list=$db->Insert($sql);
        echo json_encode($list);
        $db->Disconnect();
    }
    else if($type=="read")
    {
        $db->Connect();
        $idx=$_REQUEST['idx'];
    
        $sql="select * from test.notice where idx=$idx";
        $list=$db->Select($sql);
        echo json_encode($list);
        $db->Disconnect();
    }
    else if($type=="del")
    {
        $db->Connect();
        $idx=$_REQUEST['idx'];
    
        $sql="delete from test.notice where idx=$idx";
        $db->Delete($sql);
        $db->Disconnect();
    }
    else if($type=="read_user")
    {
        $db->Connect();
        $num=$_REQUEST['num'];
    
        $sql="select * from test.user where num=$num";
        $list=$db->Select($sql);
        echo json_encode($list);
        $db->Disconnect();
    }
    else if($type=="del_user")
    {
        $db->Connect();
        $num=$_REQUEST['num'];
    
        $sql="delete from test.user where num=$num";
        $db->Delete($sql);
        $db->Disconnect();
    }
?>