<!doctype html>
<head>
<meta charset="UTF-8">
<title>게시판</title>
<link rel="stylesheet" type="text/css" href="/assets/css/style.css" />
</head>
<body>
<div style="width: 1000px;position: relative;">
  <h1>자유게시판</h1>
    <table class="list-table">
      <thead>
          <tr>
              <th style="width:10%;">번호</th>
              <th style="width:*;">제목</th>
              <th style="width:15%;">작성자</th>
              <th style="width:15%;">작성일시</th>
              <th style="width:10%;">조회수</th>
          </tr>
        </thead>
      <tbody id="list_table">
<!--        <tr>-->
<!--          <td width="70">1</td>-->
<!--          <td width="500"><a href="">제목</a></td>-->
<!--          <td width="120"></td>-->
<!--          <td width="100">작성자</td>-->
<!--           <td width="100"></td> -->
<!--        </tr>-->
      </tbody>
    </table>
    <div id="write_btn">
      <a href="/page/board/write.php"><button>글쓰기</button></a>
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