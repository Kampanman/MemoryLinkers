function clock(){
/**
 * 曜日を表す文字列の配列
 */
  var weeks = new Array("Sun","Mon","Tue","Wed","Thu","Fri","Sat");

/**
 * 現在日時を表すインスタンス類の取得
 */
  var now = new Date();
  var year = now.getFullYear();
  var month = now.getMonth()+1; // 0~11で取得されるので1を足す
  var day = now.getDate();
  var week = weeks[now.getDay()]; // now.getDay()だけだとインデックスの数値で返ってくるようだ
  var hour = now.getHours();
  var minutes = now.getMinutes();
  var seconds = now.getSeconds();

/**
 * 日付時刻文字列の2桁表示化
 */
  if(hour < 10){hour = "0" + hour};
  if(minutes < 10){minutes = "0" + minutes};
  if(seconds < 10){seconds = "0" + seconds};

/**
 * 日時表示エリアの文字列設定
 */
  const dateClock = document.getElementById("dateClock");
  dateClock.innerHTML = `<br><span id="inner">現在日時：${year}年${month}月${day}日（${week}） ${hour}:${minutes}:${seconds}</span>`;
  dateClock.style.color = "red";
  document.getElementById("inner").style.fontWeight = "600";
  document.getElementById("inner").style.fontSize = "15px";
}

// 上記のclock関数を1000ミリ秒ごと(毎秒)に実行する
setInterval(clock, 1000);