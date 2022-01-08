<!doctype html>
<head>
<meta charset="UTF-8">
<title>게시판</title>
<link rel="stylesheet" type="text/css" href="/assets/css/style.css" />
</head>
<body style="background-color: #F7FBFC;">
<div style="width: 400px;height:300px;position: relative;margin-top:200px;background-color: #D6E6F2;border-radius: 10px;">
  <h1 style="text-align: center;padding-top:20px;">Login</h1>
    <div style="margin-top:30px;margin-left:50px;">
        <label style="margin-right: 16px;">아이디</label>
        <input type="text" id="user_id" style="width:65%;height:20px;border-radius: 5px;" />
    </div>
    <div style="margin-top:20px;margin-left:50px;">
        <label>비밀번호</label>
        <input type="password" id="user_pw" style="width:65%;height:20px;border-radius: 5px;" />
    </div>
    <div style="text-align:center;margin-top: 50px;">
        <a href="/views/signup/index.php"><button class="w-btn w-btn-gray">회원가입</button></a>
        <a onclick="javascript:login();"><button class="w-btn w-btn-blue">로그인</button></a>
    </div>
  </div>
</body>
</html>
<?php
    $check = file_exists($_SERVER["DOCUMENT_ROOT"].'/views/login/jquery.php');
    if ($check) {
        ob_start();

        include $_SERVER["DOCUMENT_ROOT"].'/views/login/jquery.php';
        $contents = ob_get_contents();
        ob_end_clean();
        echo $contents;
    }
    return false;
?>