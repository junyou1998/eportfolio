<!DOCTYPE html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>註冊帳號</title>
</head>

<body>
  <?php date_default_timezone_set("Asia/Taipei"); ?>
  <form action="checkmember.php" method="post" enctype="multipart/form-data">
    <p>註冊帳號</p>
    <table width="774" border="1">
      <tbody>
        <tr>
          <td>學號:</td>
          <td><input type="text" name="Student_id" id="Student_id" placeholder="ex. dct106102"></td>
        </tr>
        <tr>
          <td>姓名:</td>
          <td>
            <input type="text" name="Name" id="Name">
          </td>
        </tr>
        <tr>
          <td>帳號:</td>
          <td><input type="text" name="Account" id="Account"></td>
        </tr>
        <tr>
          <td>密碼:</td>
          <td><input type="text" name="Password" id="Password"></td>
        </tr>
        <tr>
          <td>電話號碼:</td>
          <td><input type="text" name="Telephone" id="Telephone"></td>
        </tr>
        <tr>
          <td>Email:</td>
          <td><input type="email" name="Email" id="Email"></td>
        </tr>
        <tr>
          <td>地址:</td>
          <td><input type="text" name="Address" id="Address"></td>
        </tr>
        <tr>
          <td>帳號建立日期</td>
          <td><input type="date" name="Create_date" id="Create_date" ></td>
        </tr>
        <tr>
          <td>大頭照:</td>
          <td><input type="file" name="Photo_file" id="Photo_file"></td>
        </tr>
      </tbody>
    </table>
    <p>
      <input type="submit" name="submit" id="submit" value="送出">
      <input type="reset" name="reset" id="reset" value="重設">
    </p>
  </form>
</body>

</html>