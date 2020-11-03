<?php 
session_start();
require_once("config.php");
?>
<?php
    if(isset($_POST["Submit"]))
    { /* 下のname="Submit"のボタンを押すと次のSQL処理が為される */
    	//post all value
    	extract($_POST);
    	$query = "INSERT INTO $table_1 (`name`, `namesurl`, `sight`, `url`, `date`) VALUES ('".$name."', '".$namesurl."', '".$sight."', '".$url."', '".$date."');";
    	/* idが「Auto Increment」になっている為、SQL構文の中に入れてしまう（値にNULLを指定する等）とエラーになるぞ！ */

    	mysqli_query($connect,$query); /* $connectの中に$queryのデータを格納する */
    	header("location:newsAdmin.php"); /* 終了後にどこのファイルに遷移するか */
    }

$input_1 = '新聞記事名';
$input_2 = '参考ウェブサイト';
$input_3 = '参考ウェブサイトURL';

$add_input1 = 'ウェブ版の記事URL';

?>

<html>
<head>
	<title><?= $theme.'登録';?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link href="https://fonts.googleapis.com/css?family=Sawarabi+Gothic" rel="stylesheet">
    <style>
      .info:hover{
        cursor: pointer;
        color: blue;
        font-weight: 600;
      }
    </style>
</head>

<body onload="start()">
	<div class="container" style="">
	<div class="row">
    <h3><?= $theme.'登録フォーム';?></h3>
    <h4><b style="color: red;"></b></h4>
    	<div class="container"> 
    	<p><a href="newsAdmin.php?=data-list" class="btn btn-info"><?= $theme;?>リスト</a></p><br>
    	<p>
          <button type="button" class="btn btn-warning btn-block" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            検索テーブルを開く／検索テーブルを閉じる
          </button>
        </p>
    	
    	<!-- アコーディオンエリア -->
            <div class="collapse container" id="collapseExample">
                <div class="row col-sm-8">
                    <table id="example" class="display table table-striped" style="">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            /**
                             * データテーブルによるnameカラム検索機能
                             */
                                require_once("config.php");
                                $query ="SELECT DISTINCT sight FROM $table_1 ORDER BY name ASC";
                                $sql = mysqli_query($connect,$query);
                                while($row = mysqli_fetch_array($sql))
                                {
                
                            ?>
                            <tr>
                                <td><input type="hidden" value="<?php echo $row["id"];?>"></td>
                                <td><span class="info"><?php echo $row["name"];?></span></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- アコーディオンエリアここまで -->
            
        	<form action="" method="post" name="form1">
        		<div class="form-group">
        			<label><?= $input_1; ?></label>
        			<input type="text" name="name" id="name" class="form-control" placeholder="<?= $input_1.'を入力して下さい。'; ?>" required>
        		</div>
        		<div class="form-group">
        			<label><?= $add_input1; ?></label>
        			<input type="text" name="namesurl" class="form-control" placeholder="<?= 'あれば'.$add_input1.'を入力して下さい。'; ?>">
        		</div>
        		<div class="form-group">
        			<label><?= $input_2; ?></label>
        			<input type="text" name="sight" class="form-control" placeholder="<?= $input_2.'を入力して下さい。'; ?>" required>
        		</div>
        		<div class="form-group">
        			<label><?= $input_3; ?></label>
        			<input type="url" name="url" class="form-control" placeholder="<?= $input_3.'を入力して下さい。'; ?>" required>
        		</div>
        		
        		<p>
        		    <label for="dayInto">日付を選択して下さい　</label><input type="date" name="dayInto" id="dayInto" min="2020-10-01" required>　
                    <input type="button" class="btn btn-info form-group" value="日付を確定する" onclick="input()"><label>：日付選択後に必ずこちらを押して下さい</label>
                </p>
                <p><label>記事の日付</label>　<input type="text" class="form-inline" name="date" id="date" readonly></p>
        		<div class="form-group">
        			<input type="submit" name="Submit" value="<?= $theme.'を登録する';?>" class="btn btn-primary btn-block">
        		</div>
        	</form>
        </div>
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
</script>
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

      var date = dtDayInto;
      var fm_date = `${date.getFullYear()}/${date.getMonth()+1}/${date.getDate()}`.replace(/\n|\r/g, ''); //日付を文字列の形に変換

      $("#date").val(fm_date);
    }

    function input(){
      var dayInto = $("#dayInto").val();
      var dtDayInto = new Date(dayInto); //#dayIntoに入力された日付を取得

      var date = dtDayInto;
      var fm_date = `${date.getFullYear()}/${date.getMonth()+1}/${date.getDate()}`.replace(/\n|\r/g, ''); //日付を文字列の形に変換
      $("#date").val(fm_date);
    }

</script>
<script>
  $(".info").click(function(){
    var val = $(this).text();
    console.log(val);
    $("#name").val(val);
  });
</script>
</body>
</html>

