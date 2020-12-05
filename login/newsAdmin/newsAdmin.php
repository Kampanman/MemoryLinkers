<?php
  session_start();
  require_once('../classes/UserLogic.php');
  require_once('../functions.php');
  
  //ログインしていなければ新規登録画面へ移す
  $result = UserLogic::checkLogin();
  
  if(!$result){
      $_SESSION['login_err'] = 'ユーザーを登録してログインして下さい。';
      header('Location: signup_form.php');
      return;
  }
  
  $login_user = $_SESSION['login_user'];

  $whatPage = '管理者ページ';

    require_once('config.php');
    /** 
     * PHPでは、<?php echo '〇〇'; ?>と<?= '〇〇'; ?>は同様の意味である。
     * <?= ?>と間違えて<?php (中身にechoつけてない) ?>を使ってしまわないように注意。
     * <?php ?>だけだとドキュメントに値は出力されない。
     * <?= ?>のフィールド内では、文字列（変数に格納している場合も同）どうし、或いは文字列と数値とは、.（ドット）で繋ぐことができる。
     * （これはJavaScriptの「+」にあたる）
    */
?>

<!-- このファイルがデータ一覧を表示する大元のファイルといえる -->
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= '閲覧してきた『'.$theme.'』一覧';?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link href="https://fonts.googleapis.com/css?family=Sawarabi+Gothic" rel="stylesheet">
    <style>
        body { font-family: "Sawarabi Gothic"; }
        
        a[href=""]{
          color: black;
          pointer-events:none;
        }
    </style>
</head>
<body>
  <h2 align="center"><?= $whatPage; ?></h2>
  <p align="right" class="container">ログインユーザー：<?= h($login_user['name']); ?></p>
<!--  <p>メールアドレス：<?= h($login_user['email']); ?></p> -->
<br>
<form action="logout.php" method="POST">
    <p class="container" align="right"><input type="submit" name="logout" class="btn btn-info" value="ログアウト"></p>
</form>
<div class="container" align="center">
    <a href="../bookAdmin/bookAdmin.php" style="text-decoration: none;"><button class="btn btn-danger btn-block">ググり本管理ページへ</button></a>
    <br>
    <a href="../websiteAdmin/websiteAdmin.php" style="text-decoration: none;"><button class="btn btn-warning btn-block">ググりサイト管理ページへ</button></a>
    <br>
    <a data-id="thisFile" href="newsAdmin.php" style="text-decoration: none;"><button class="btn btn-info btn-block">ググり新聞管理ページへ</button></a>
    <br>
    <a href="../youtubeAdmin/youtubeAdmin.php" style="text-decoration: none;"><button class="btn btn-primary btn-block">GoodTube管理ページへ</button></a>
</div>
    <div class="container" style="">
        <h3 align="center"><?= '閲覧してきた『'.$theme.'』一覧';?></h3>
        <a href="addData.php?=add-record" class="btn btn-info"><?= $theme.'登録フォームへ';?></a><br><br>
        <div class="row">
            <table id="example" class="display" style="">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Link</th>
                        <th>Date</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        require_once("config.php");
                        $query ="SELECT * FROM $table_1 ORDER BY id DESC";
                        $sql = mysqli_query($connect,$query);
                        while($row = mysqli_fetch_array($sql))
                        {

                    ?>
                    <tr>
                        <td><input type="hidden" value="<?php echo $row["id"];?>"></td>
                        <td><a href="<?php echo $row["namesurl"];?>" target="_blank" onClick="return confirm('このサイトに移動しますか？')"><?php echo $row["name"];?></a></td>
                        <td><a href="<?php echo $row["url"];?>" target="_blank" onClick="return confirm('このサイトに移動しますか？')"><?php echo $row["sight"];?></a></td>
                        <td><?php echo $row['date']; ?></td>
                        <td><a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-info">EDIT</a></td>
                        <td><a href="delete.php?id=<?php echo $row['id'];?>" class="btn btn-danger" onClick="return confirm('ホントに削除してもいいですか')">DELETE</a></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
$('#example').DataTable({
    "language" : {"url":"any.json"},
    "initComplete" : function(settings, json) {
        this.xxxApi().doAnythng();//ここで処理する
    }
});
/*
	$(document).ready(function() {
    $('#example').DataTable();
} );
*/
</script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
</body>
</html>
