<?php
    require_once('connect.php');
    /** 
     * PHPでは、<?php echo '〇〇'; ?>と<?= '〇〇'; ?>は同様の意味である。
     * <?= ?>と間違えて<?php (中身にechoつけてない) ?>を使ってしまわないように注意。
     * <?php ?>だけだとドキュメントに値は出力されない。
     * <?= ?>のフィールド内では、文字列（変数に格納している場合も同）どうし、或いは文字列と数値とは、.（ドット）で繋ぐことができる。
     * （これはJavaScriptの「+」にあたる）
    */
    $index_name = 'myMemoryLinkers';
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $index_name; ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link href="https://fonts.googleapis.com/css?family=Sawarabi+Gothic" rel="stylesheet">
    <style>
        body { 
            font-family: "Sawarabi Gothic";
            background-color: #66fed3;
        }
        a[href=""]{
          color: black;
          pointer-events:none;
        }
    </style>
</head>
<body>
<p class="container" align="right">
    <br>
    <a href="./login/public/login_form.php"><button  class="btn btn-dark">ログイン画面へ</button></a>
</p>
<h2 align="center"><?= $index_name; ?></h2>
<br>
<p align="center" style="color:green; font-weight:bold">
ナニゴトも　それ単体で　記憶すな<br>
他事詰め込みゃ　ヌケるがオチだ
</P>
<h3 align="center" style="color:red; font-weight:bold">丈夫な根を張る記憶をつくろう</h3>
<br>
    <!-- アコーディオンボタン -->
    <div class="container">
        <button class="btn btn-danger btn-block"
            data-toggle="collapse"
            data-target="#accord-1"
            aria-expand="false"
            aria-controls="accord-1">読んできたググリ本一覧</button>
        </div>
    <!-- ↑アコーディオンボタン／アコーディオンエリア↓ -->    
    <div class="collapse" id="accord-1">
      <div class="card card-body">
        <div class="container" style="">
        <br>
          <div class="row">
              <table id="example" class="display" style="">
                  <thead>
                      <tr>
                          <th>#</th>
                          <th>Title</th>
                          <th>Link</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php
                          $query ="SELECT * FROM googles ORDER BY id DESC";
                          $sql = mysqli_query($connect,$query);
                          while($row = mysqli_fetch_array($sql))
                          {
                      ?>
                      <tr>
                          <td><input type="hidden" value="<?php echo $row["id"];?>"></td>
                          <td><?php echo $row["name"];?></td>
                          <td><a href="<?php echo $row["url"];?>" target="_blank" onClick="return confirm('このサイトに移動しますか？')"><?php echo $row["sight"];?></a></td>
                      </tr>
                      <?php } ?>
                  </tbody>
              </table>
          </div>
        </div>
      </div>
    </div>
    <!-- アコーディオンエリア -->
    <br>

    <!-- アコーディオンボタン -->
    <div class="container">
        <button class="btn btn-warning btn-block"
            data-toggle="collapse"
            data-target="#accord-2"
            aria-expand="false"
            aria-controls="accord-2">閲覧してきたググリサイト一覧</button>
    </div>
    <!-- ↑アコーディオンボタン／アコーディオンエリア↓ -->    
    <div class="collapse" id="accord-2">
      <div class="card card-body">
        <div class="container" style="">
        <br>
        <div class="row">
            <table id="example_2" class="display" style="">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tag1</th>
                        <th>Tag2</th>
                        <th>Title</th>
                        <th>Link</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query ="SELECT * FROM webgoogles ORDER BY id DESC";
                        $sql = mysqli_query($connect,$query);
                        while($row = mysqli_fetch_array($sql))
                        {
                    ?>
                    <tr>
                        <td><input type="hidden" value="<?php echo $row["id"];?>"></td>
                        <td><?php echo $row["tag_1"];?></td>
                        <td><?php echo $row["tag_2"];?></td>
                        <td><a href="<?php echo $row["namesurl"];?>" target="_blank" onClick="return confirm('このサイトに移動しますか？')"><?php echo $row["name"];?></a></td>
                        <td><a href="<?php echo $row["url"];?>" target="_blank" onClick="return confirm('このサイトに移動しますか？')"><?php echo $row["sight"];?></a></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        </div>
      </div>
    </div>
    <!-- アコーディオンエリア -->
    <br>
    
    <!-- アコーディオンボタン -->
    <div class="container">
        <button class="btn btn-info btn-block"
            data-toggle="collapse"
            data-target="#accord-3"
            aria-expand="false"
            aria-controls="accord-3">閲覧してきたググリ新聞一覧</button>
    </div>
    <!-- ↑アコーディオンボタン／アコーディオンエリア↓ -->    
    <div class="collapse" id="accord-3">
      <div class="card card-body">
        <div class="container" style="">
        <br>
        <div class="row">
            <table id="example_3" class="display" style="">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Link</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query ="SELECT * FROM news ORDER BY id DESC";
                        $sql = mysqli_query($connect,$query);
                        while($row = mysqli_fetch_array($sql))
                        {
                    ?>
                    <tr>
                        <td><input type="hidden" value="<?php echo $row["id"];?>"></td>
                        <td><a href="<?php echo $row["namesurl"];?>" target="_blank" onClick="return confirm('このサイトに移動しますか？')"><?php echo $row["name"];?></a></td>
                        <td><a href="<?php echo $row["url"];?>" target="_blank" onClick="return confirm('このサイトに移動しますか？')"><?php echo $row["sight"];?></a></td>
                        <td><?php echo $row["date"];?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        </div>
      </div>
    </div>
    <!-- アコーディオンエリア -->
    <br>
    
    <!-- アコーディオンボタン -->
    <div class="container">
        <button class="btn btn-primary btn-block"
            data-toggle="collapse"
            data-target="#accord-4"
            aria-expand="false"
            aria-controls="accord-4">GoodTube一覧</button>
    </div>
    <!-- ↑アコーディオンボタン／アコーディオンエリア↓ -->    
    <div class="collapse" id="accord-4">
      <div class="card card-body">
        <div class="container" style="">
        <br>
        <div class="row">
            <table id="example_4" class="display" style="">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Group</th>
                        <th>Title</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query ="SELECT * FROM youtube ORDER BY id DESC";
                        $sql = mysqli_query($connect,$query);
                        while($row = mysqli_fetch_array($sql))
                        {
                    ?>
                    <tr>
                        <td class="showTube"><input type="hidden" value="<?php echo $row["id"];?>"><button class="btn btn-primary lets">視聴する</button></td>
                        <td><?php echo $row["name"];?></td>
                        <td class="goLink"><a href="<?php echo $row["url"];?>" target="_blank" onClick="return confirm('このサイトに移動しますか？')"><?php echo $row["sight"];?></a></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <form><input type="hidden" name="url" id="url" disabled></form>
            <p></p><br>
            <div id="vision" align="center"></div>
        <br>
        </div>
        </div>
      </div>
    </div>
    <!-- アコーディオンエリア -->

</body>
</html>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">

  $('#example').DataTable({
        responsive: true,
        lengthChange: true,
        info: false,
        searching: true,
        paging: true,
        pagingType: "full_numbers",
        lengthMenu: [ 10, 20, 50, 100 ],
        columnDefs: [
          { targets: 0, visible: false },
          { targets: 2, width: "50%" }
        ],
        language: {
            url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Japanese.json"
        }
    });
$('#example_2').DataTable({
    responsive: true,
    lengthChange: true,
    info: false,
    searching: true,
    paging: true,
    pagingType: "full_numbers",
    lengthMenu: [ 10, 20, 50, 100 ],
    columnDefs: [
      { targets: 0, visible: false }
    ],
    language: {
        url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Japanese.json"
    }
});
$('#example_3').DataTable({
    responsive: true,
    lengthChange: true,
    info: false,
    searching: true,
    paging: true,
    pagingType: "full_numbers",
    lengthMenu: [ 10, 20, 50, 100 ],
    columnDefs: [
      { targets: 0, visible: false },
      { targets: 2, width: "50%" }
    ],
    language: {
        url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Japanese.json"
    }
});
$('#example_4').DataTable({
    responsive: true,
    lengthChange: true,
    info: false,
    searching: true,
    paging: true,
    pagingType: "full_numbers",
    lengthMenu: [ 10, 20, 50, 100 ],
    columnDefs: [
      // { targets: 0, visible: false },
      { targets: 2, width: "50%" }
    ],
    language: {
        url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Japanese.json"
    }
});

$('.lets').each(function(){
    var click = $(this).parent();
    var href = click.next("td").next("td").children("a").attr("href");
    if(href.match(/watch\?v=/) && !href.match(/\&/)){
      $(this).css("display","block"); 
    } else {
      $(this).css("display","none");
    }
});

$('.lets').click(function(){
    var click = $(this).parent();
    var vidurl = click.next("td").next("td").children("a").attr("href");
    var result = vidurl.substring(32); // vidurlの32文字目以前を削除したもの
    $("#url").val(result);
    console.log(result);
    $.ajax({
        url: 'visionSet.php',
        type: 'POST',
        dataType: 'json',
        data: {
            "url": result
        },
        success: function(data){
            if(data.result === "OK"){
                console.log(data.message);
                $('#vision').html(data.message);
            } else {
                console.log("Oops...");
            }
        }
    });
});

</script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
</body>
</html>
