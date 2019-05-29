<!DOCTYPE html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>註冊檢查</title>
</head>

<body>
  <?php
  $Student_id = $_REQUEST['Student_id'];
  $Name = $_REQUEST['Name'];
  $Email = $_REQUEST['Email'];
  $Address = $_REQUEST['Address'];
  $Password = $_REQUEST['Password'];
  $Telephone = $_REQUEST['Telephone'];
  $Account = $_REQUEST['Account'];
  if (preg_match('/^[a-z]{3}[0-9]{6}$/', $Student_id)) {
    echo "符合學號規定" . '<br>';
  } else {
    echo "不符合學號規定" . '<br>';
  }
  if (preg_match('/(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])[a-zA-Z0-9]{6,}/', $Password)) {
    echo "符合密碼規定  " . '<br>';
    echo md5($Password) . '<br>';
  } else {
    echo "不符合密碼規定" . '<br>';
  }
  if (preg_match('/09[0-9]{2}-[0-9]{6}$/', $Telephone)) {
    echo "符合電話規定" . '<br>';
  } else {
    echo "不符合電話規定" . '<br>';
  }
  // $file = 'member.txt';
  // if (file_exists($file)) {
  //   $member_data = json_decode(file_get_contents($file));
  // }
  // $member_data[] = $student_id . PHP_EOL . $Name . PHP_EOL . $Account . PHP_EOL . $Password;
  // file_put_contents($file, json_encode($member_data));
  // echo "<pre>";
  // foreach ($member_data as $message) {
  //   echo '<p>' . $message . '</p><hr>';
  // }


  echo '暫存檔名 : ' . ($_FILES['Photo_file']['tmp_name']) . '<br>';
  if (is_uploaded_file($_FILES['Photo_file']['tmp_name'])) {
    if (!file_exists('images')) {
      mkdir('images');
    }
    $Photo_file = 'images/' . basename($_FILES['Photo_file']['name']);
    if (move_uploaded_file($_FILES['Photo_file']['tmp_name'], $Photo_file)) {
      echo '上傳檔案:' . $Photo_file . '上傳成功' . "<br>";
      echo '<p><img src="' . $Photo_file . '"/></p>';
    } else {
      echo '上傳失敗' . '<br>';
    }
  } else {
    echo '請選擇檔案!' . '<br>';
  }

  $pdo = new PDO('mysql:host=localhost;dbname=adt106102_eportfolio;charset=utf8', 'root', '');
  $sql = $pdo->prepare('insert into member values(null,?,?,?,?,?,?,?,?,?)');
  if ($sql->execute([$Student_id, $Name, $Account, md5($Password), $Telephone, $Email, $Address, $_REQUEST['Create_date'], $Photo_file])) {
    echo 'success!' . '<br>';
  } else {
    echo 'failure' . '<br>';
  }
  ?>

</body>

</html>