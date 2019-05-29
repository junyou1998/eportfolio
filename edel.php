<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <title>資料刪除 DEL</title>
</head>

<body>
  <?php

  // 寫入資料庫
  $pdo = new PDO('mysql:host=localhost;dbname=adt106102_eportfolio; charset=utf8', 'root', '');
  $sql = $pdo->prepare('delete from data where id=?');
  if ($sql->execute([$_REQUEST['id']])) {
    echo '刪除成功 ! ' . '<br>';

    echo $_REQUEST['filelink'];
    //    header('Location: eshow.php'); 
    if (file_exists($_REQUEST['filelink'])) {
      echo '檔案存在' . '<br>';
    } else {
      echo '檔案不存在' . '<br>';
    }

    if ($_REQUEST['filelink'] != '')
      unlink($_REQUEST['filelink']); //將檔案刪除
  } else {
    echo '刪除失敗 !'  . '<br>';
  }


  ?>
  <a href="eshow.php">顯示所有資料</a>
</body>

</html>