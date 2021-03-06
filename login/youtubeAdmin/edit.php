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
    
    
        $result = mysqli_query($connect, "UPDATE $table_1 SET name='$name',sight='$sight',url='$url' WHERE id=$id");
        
        //redirectig to the display page. In our case, it is index.php
        header("Location:youtubeAdmin.php"); /* 処理後にどこのファイルに遷移するか */
    
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
    $sight = $row['sight'];
    $url = $row['url'];
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

<body>
	<div class="container" style="width: 800px; margin-top: 100px;">
	    <a href="youtubeAdmin.php?=data-list" class="btn btn-info"><?= $theme; ?>リスト</a><br>
		<div class="row">
			<h3><?= $theme.'編集フォーム';?></h3>
			<h4><b style="color: red;"></b></h4>
			<div class="col-sm-6"> 
		
				<form action="" method="post" name="form1">
					<div class="form-group">
							<input type="hidden" name="id" class="form-control" value="<?php echo $id;?>">
					</div>
					<div class="form-group">
							<label>動画ジャンル</label>
							<input type="text" name="name" class="form-control" value="<?php echo $name;?>">
					</div>
					<div class="form-group">
						<label>動画タイトル</label>
						<input type="text" name="sight" class="form-control" value=" <?php echo $sight; ?>">
					</div>
					<div class="form-group">
						<label>url</label>
						<input type="url" name="url" class="form-control" value="<?php echo $url;?>">
					</div>
					<div class="form-group">
						<input type="submit" value="Update" class="btn btn-primary btn-block" name="update">
					<?php
					/* 元ネタのコード↓
					 * <input type="submit" 『name="Submit"』←こんなトコにトラップ仕掛けやがって...
					 *   value="Update" class="btn btn-primary btn-block" name="update">
					 */
					?>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>

