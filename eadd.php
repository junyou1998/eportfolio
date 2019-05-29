<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>上傳資料</title>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.7.6/tinymce.min.js"></script>

</head>

<body>
  <p>數位系E-Portfolio 系統 上傳資料</p>
  <hr />
  <form action="upload.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
    <table width="446" border="1" style="width: 700px;">
      <tr>
        <td width="98">學號：</td>
        <td width="332"><label for="student_id"></label>
          <input name="student_id" type="text" id="student_id" /></td>
      </tr>
      <tr>
        <td>姓名：</td>
        <td><label for="name"></label>
          <input name="name" type="text" id="name" /></td>
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
            <option value="數位一甲" selected="selected">數位一甲</option>
            <option value="數位二甲">數位二甲</option>
            <option value="數位三甲">數位三甲</option>
            <option value="數位四甲">數位四甲</option>
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
        <td><input type="file" name="myfile" id="myfile" /></td>
      </tr>
      <tr>
        <td>檔案內容說明</td>
        <td>
          <textarea name="content" id="content"></textarea>
        </td>
      </tr>
      <tr>
        <td>上傳日期</td>
        <td><label for="content"></label>
          <label for="edate">
            <input name="edate" type="text" id="edate" value="<?php echo date('Y-m-d'); ?>" />
          </label></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input type="submit" name="button" id="button" value="送出" />
          <input type="reset" name="button2" id="button2" value="重設" /></td>
      </tr>
    </table>
  </form>
  <script>
    tinyMCE.init({
      // 初始化參數設定[註1]
      selector: "textarea",
      plugins: "advlist autolink link image lists charmap print preview", // 目標物件

    });
  </script>
  <style>
    #mceu_35{
      display: none;
    }
  </style>
</body>

</html>