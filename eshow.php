<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <title>資料檢視</title>
</head>

<body>
  <p>數位系E-Portfolio 系統 檢視資料</p>
  <hr />
  <table width="1332" border="1">
    <tbody>
      <tr>
        <td width="13">id</td>
        <td width="42">學號</td>
        <td width="43">姓名</td>
        <td width="48">學年度</td>
        <td width="59">班級</td>
        <td width="189">課程名稱</td>
        <td width="322">檔案</td>
        <td width="286">說明</td>
        <td width="142">上傳日期</td>
        <td width="50">&nbsp;</td>
        <td width="68">&nbsp;</td>
      </tr>

      <?php
      $pdo = new PDO('mysql:host=localhost;dbname=adt106102_eportfolio; charset=utf8', 'root', '');
      $sql = $pdo->prepare('select * from data');
      $sql->execute();

      foreach ($sql->fetchAll() as $row) {
        echo '<tr>';
        echo '<td>' . $row['id'] . '</td>';
        echo '<td>' . $row['Student_id'] . '</td>';
        echo '<td>' . $row['Name'] . '</td>';
        echo '<td>' . $row['Year'] . '</td>';
        echo '<td>' . $row['Class'] . '</td>';
        echo '<td>' . $row['Course'] . '</td>';
        echo '<td><a href= "./' . $row['Filelink'] . '">' . $row['Filelink'] . '</a></td>';
        echo '<td>' . $row['Content'] . '</td>';
        echo '<td>' . $row['Edate'] . '</td>';
        echo '<td>' . '<a href="eedit.php?id=' . $row['id'] . '">編輯</a>' . '</td>';
        echo '<td><a href=' . '"' . 'edel.php?id=' . $row['id'] . '&filelink=' . $row['Filelink'] . '">' . '刪除' . '</a></td>';
        echo '</tr>';
      }
      ?>
    </tbody>
  </table>
  <p>總共幾 筆資料。</p>
  <p>&nbsp;</p>
</body>

</html>