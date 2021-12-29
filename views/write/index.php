<!doctype html>
<head>
<meta charset="UTF-8">
<title>게시판</title>
<link rel="stylesheet" type="text/css" href="/assets/css/style.css" />
</head>
<body>
<div style="width: 1000px;position: relative;margin-top:50px;">
  <h1>글쓰기</h1>
    <div style="margin-top:20px;margin-left:50px;">
        <label>제목</label>
        <input type="text" style="width:95%;height:20px;border-radius: 5px;" />
    </div>
    <div style="margin-top:20px;margin-left:50px;">
        <label style="vertical-align: top;">내용</label>
        <textarea style="width:95%;height:450px;border-radius: 5px;resize: none;"></textarea>
    </div>
    <div style="float:right;margin-top: 20px;">
        <a href="javascript:void(0);" onclick="chkCancel();"><button class="w-btn w-btn-gray">취소</button></a>
        <a onclick="javascript:save();"><button class="w-btn w-btn-blue">저장</button></a>
    </div>
</div>
</body>
</html>
<?php
    $check = file_exists($_SERVER["DOCUMENT_ROOT"].'/views/write/jquery.php');
    if ($check) {
        ob_start();

        include $_SERVER["DOCUMENT_ROOT"].'/views/write/jquery.php';
        $contents = ob_get_contents();
        ob_end_clean();
        echo $contents;
    }
    return false;
?>