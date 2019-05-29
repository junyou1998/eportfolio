<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <title>EditSave</title>
</head>

<body>
  <?php


  if ($_FILES['myfile']['error'] > 0) {
    switch ($_FILES['myfile']['error']) {
      case 1:
        die("檔案大小超出 php.ini:upload_max_filesize 限制 ");
      case 2:
        die("檔案大小超出 MAX_FILE_SIZE 限制");
      case 3:
        die("檔案大小僅被部份上傳");
      case 4:
        die("檔案未被上傳");
    }
  } else {
    if (is_uploaded_file($_FILES['myfile']['tmp_name'])) {
      $DestDIR = "upload";
      if (!is_dir($DestDIR) || !is_writeable($DestDIR))
        die("目錄不存在或無法寫入 ");

      $File_Extension = explode(".", $_FILES['myfile']['name']);     //取得檔案副檔名，以陣列形式來表示
      $File_Extension = $File_Extension[count($File_Extension) - 1];  //確保副檔名一定會在最後的位置，確保副檔名正確  
      $ServerFilename = date("YmdHis") . "." . $File_Extension;     //避免檔案名稱重複而使伺服器上的檔案被覆蓋，以上傳的  年月日時分秒.副檔名  作為檔名

      $ServerFilename = $_POST['year'] . "_" . $_POST['student_id'] . "_" . $_POST['name'] . "_" . $_POST['course'] . "." . $File_Extension;  // 自訂檔名  學年度_學號.pdf  ex. 10602_ADT105001.pdf

      move_uploaded_file($_FILES['myfile']['tmp_name'], iconv("UTF-8", "big5", $DestDIR . "/" . $ServerFilename)); //將上傳的暫存檔移動到指定目錄

      $Filelink = $DestDIR . "/" . $ServerFilename;
    }
  }

  // 寫入資料庫
  $pdo = new PDO('mysql:host=localhost;dbname=adt106102_eportfolio; charset=utf8', 'root', '');
  $sql = $pdo->prepare('update data set Student_id=?, Name=?, Year=?, Class=?, Course=?, Filelink=?, Content=?, Edate=? where id=?');
  if ($sql->execute([$_REQUEST['student_id'], $_REQUEST['name'], $_REQUEST['year'], $_REQUEST['class'], $_REQUEST['course'], $_REQUEST['myFilelink'], $_REQUEST['content'], $_REQUEST['edate'], $_REQUEST['id']])) {
    echo '更新成功 ! ' . '<br>';
  } else {
    echo '更新失敗 !'  . '<br>';
  }
  ?>

</body>

</html>