<?php
session_start();
require_once('config.php');

if(isset($_POST['update']))
{    
    $id = $_POST['id'];
    /* 入力値は「サニタイズ」（特殊文字の無害化）しておく */
    $name = htmlspecialchars($_POST['name'], ENT_QUOTES, "UTF-8");
    $sight = htmlspecialchars($_POST['sight'], ENT_QUOTES, "UTF-8");
    $url = htmlspecialchars($_POST['url'], ENT_QUOTES, "UTF-8");
    $date = htmlspecialchars($_POST['date'], ENT_QUOTES, "UTF-8");
    
        $result = mysqli_query($connect, "UPDATE $table_1 SET name='$name',sight='$sight',url='$url',date='$date' WHERE id=$id");
        
        //redirectig to the display page. In our case, it is index.php
        header("Location:newsAdmin.php"); /* 処理後にどこのファイルに遷移するか */
    
}
?>
<?php
//error_reporting(0);
//getting id from url
$id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysqli_query($connect, "SELECT * FROM $table_1 WHERE id=$id");
 
while($row = mysqli_fetch_array($result))
{
    $name = $row['name'];
    $namesurl = $row['namesurl'];
    $sight = $row['sight'];
    $url = $row['url'];
    $date = $row['date'];
}
?>
<html>
<head>
	<title><?= $theme.'編集フォーム';?></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Sawarabi+Gothic" rel="stylesheet">
    <style>
        body { font-family: "Sawarabi Gothic"; }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body onload="start()">
	<div class="container" style="width: 800px; margin-top: 100px;">
	    <a href="newsAdmin.php?=data-list" class="btn btn-info"><?= $theme; ?>リスト</a><br>
		<div class="row">
			<h3><?= $theme.'編集フォーム';?></h3>
			<h4><b style="color: red;"></b></h4>
			<div class="col-sm-6"> 
		
				<form action="" method="post" name="form1">
					<div class="form-group">
						<input type="hidden" name="id" class="form-control" value="<?php echo $id;?>">
					</div>
					<div class="form-group">
						<label>新聞記事名</label>
						<input type="text" name="name" class="form-control" value="<?php echo $name;?>">
					</div>
					<div class="form-group">
						<label>ウェブ版記事url</label>
						<input type="text" name="namesurl" class="form-control" value="<?php echo $namesurl;?>">
					</div>
					<div class="form-group">
						<label>参考ウェブサイト</label>
						<input type="text" name="sight" class="form-control" value=" <?php echo $sight; ?>">
					</div>
					<div class="form-group">
						<label>参考ウェブサイトurl</label>
						<input type="url" name="url" class="form-control" value="<?php echo $url;?>">
					</div>
    				<p><label for="dayInto">日付を選択して下さい　</label><input type="date" name="dayInto" id="dayInto" min="2020-10-01" required></p>
                    <label>日付選択後に必ずこちらを押して下さい　</label>
                    <p align="center"><input type="button" class="btn btn-info form-group" value="日付を確定する" onclick="input()"></p>
                    
                    <p><label>新しい日付</label>　<input type="text" class="form-inline" name="date" id="date" value="<?php echo $date;?>" readonly></p>
					<div class="form-group">
						<input type="submit" value="Update" class="btn btn-primary btn-block" name="update">
					</div>
				</form>
			</div>
		</div>
	</div>
<script>
    function start(){
      // 現在に日付を日付ボックスにセット
      var today = new Date();
      today.setDate(today.getDate());
      var yyyy = today.getFullYear();
      var mm = ("0"+(today.getMonth()+1)).slice(-2);
      var dd = ("0"+today.getDate()).slice(-2);
      var setToday = yyyy+'-'+mm+'-'+dd;
      $("#dayInto").val(setToday);
      
      var dtDayInto = new Date(); //現在の日付を取得
    }
    
    function input(){
      var dayInto = $("#dayInto").val();
      var dtDayInto = new Date(dayInto); //#dayIntoに入力された日付を取得

      var date = dtDayInto;
      var fm_date = `${date.getFullYear()}/${date.getMonth()+1}/${date.getDate()}`.replace(/\n|\r/g, ''); //日付を文字列の形に変換
      $("#date").val(fm_date);
    }
</script>
</body>
</html>

