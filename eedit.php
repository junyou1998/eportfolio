<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>無標題文件</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.7.6/tinymce.min.js"></script>
</head>

<body>
  <p>數位系E-Portfolio 系統 修改資料</p>
  <hr />

  <?php
  // 取得資料

  // 利用 $_GET['id'] 取得eshowamdin.php傳來的網頁參數

  $pdo = new PDO('mysql:host=localhost;dbname=adt106102_eportfolio; charset=utf8', 'root', '');
  $sql = $pdo->prepare('select * from data where id=?');
  $sql->execute([$_GET['id']]);

  foreach ($sql->fetchAll() as $row) {
    $myid = $row['id'];
    $myStudent_id = $row['Student_id'];
    $myName = $row['Name'];
    $myYear = $row['Year'];
    $myClass = $row['Class'];
    $myCourse = $row['Course'];
    $myFilelink = $row['Filelink'];
    $myContent = $row['Content'];
    $myEdate = $row['Edate'];
  }
  ?>
  <form action="eeditsave.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
    <table width="446" border="1">
      <tr>
        <td width="98">學號：</td>
        <td width="332"><label for="student_id"></label>
          <input name="student_id" type="text" id="student_id" value=<?php echo $myStudent_id; ?>></td>
      </tr>
      <tr>
        <td>姓名：</td>
        <td><label for="name"></label>
          <input name="name" type="text" id="name" value=<?php echo $myName; ?>></td>
      </tr>
      <tr>
        <td>學年度</td>
        <td><label for="year"></label>
          <select name="year" id="year">
            <option value="10601">10601</option>
            <option value="10602" selected="selected">10602</option>
          </select></td>
      </tr>
      <tr>
        <td>班級:</td>
        <td><select name="class" id="class">
            <option value="數位一甲" <?php if ($myClass == "數位一甲") echo 'selected="' . 'selected"' ?>>數位一甲</option>
            <option value="數位二甲" <?php if ($myClass == "數位二甲") echo 'selected="' . 'selected"' ?>>數位二甲</option>
            <option value="數位三甲" <?php if ($myClass == "數位三甲") echo 'selected="' . 'selected"' ?>>數位三甲</option>
            <option value="數位四甲" <?php if ($myClass == "數位四甲") echo 'selected="' . 'selected"' ?>>數位四甲</option>
          </select></td>
      </tr>
      <tr>
        <td>課程名稱:</td>
        <td><label for="myfile"></label>
          <label for="myfile">
            <select name="course" id="course">
              <option value="網頁程式設計" selected="selected">網頁程式設計</option>
              <option value="課程一">課程一</option>
              <option value="課程二">課程二</option>
              <option value="課程三">課程三</option>
            </select>
          </label></td>
      </tr>
      <tr>
        <td>檔案</td>
        <td>
          <p>
            <input type="file" name="myfile" id="myfile" value="<?php echo $myFilelink; ?>" />
          </p>
          <p>原始檔案=&gt;</p>
          <p><a href="<?php echo $myFilelink; ?>"><?php echo $myFilelink;
                                                  $myfile = $myFilelink ?></a></p>
        </td>
      </tr>
      <tr>
        <td>檔案內容說明</td>
        <td><textarea name="content" id="content" cols="45" rows="5"><?php echo $myContent; ?>
      </textarea></td>
      </tr>
      <tr>
        <td>上傳日期</td>
        <td><label for="content"></label>
          <label for="edate">
            <input name="edate" type="text" id="edate" value="<?php echo $myEdate; ?>" />
          </label></td>
      </tr>
      <tr>
        <td><input type="hidden" name="id" value=<?php echo $myid; ?> /></td>
        <td><input type="hidden" name="myFilelink" value=<?php echo $myFilelink; ?> /></td>
        <td><input type="submit" name="button" id="button" value="送出" />
          <input type="reset" name="button2" id="button2" value="重設" /></td>
      </tr>
    </table>
  </form>
  <hr />
  <p>&nbsp;</p>



  <script>
    tinyMCE.init({
      // 初始化參數設定[註1]
      selector: "textarea",
      plugins: "advlist autolink link image lists charmap print preview", // 目標物件

    });
  </script>
</body>

</html>