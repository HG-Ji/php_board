<!doctype html>
<head>
<meta charset="UTF-8">
<title>게시판</title>
<link rel="stylesheet" type="text/css" href="/assets/css/style.css" />
</head>
<body>
<div style="width: 400px;height:300px;position: relative;margin-top:100px;background-color:gray;">
  <h1 style="text-align: center;">Login</h1>
    <div style="margin-top:20px;margin-left:50px;">
        <label>아이디</label>
        <input type="text" style="width:80%;height:20px;border-radius: 5px;" />
    </div>
    <div style="margin-top:20px;margin-left:50px;">
        <label>비밀번호</label>
        <input type="text" style="width:76.6%;height:20px;border-radius: 5px;" />
    </div>
    <div style="text-align:center;margin-top: 20px;">
        <a href="javascript:void(0);" onclick="chkCancel();"><button class="w-btn w-btn-gray">회원가입</button></a>
        <a onclick="javascript:save();"><button class="w-btn w-btn-blue">로그인</button></a>
    </div>
  </div>
</body>
</html>
<?php
    $check = file_exists($_SERVER["DOCUMENT_ROOT"].'/views/board/jquery.php');
    if ($check) {
        ob_start();

        include $_SERVER["DOCUMENT_ROOT"].'/views/board/jquery.php';
        $contents = ob_get_contents();
        ob_end_clean();
        echo $contents;
    }
    return false;
?>