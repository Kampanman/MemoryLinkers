function jumpLink(link){
  return `<p><b>　<a href='${link}' target='_blank'target='_blank' onclick="return confirm('このサイトに移動しますか？')">リンク先へ</a></b></p>`
}
function factSort(id,word,subject,before,fact,after){
  return `<h4 class="factSort" data-toggle="collapse" data-target="#${id}">
    〇 <span style="color:orange; cursor:pointer;">${word}</span> の事象整理
  </h4>
  <section class="collapse" id="${id}">
    <ul>
      <li><b>当事者・主体：</b> <span style="color:green">${subject}</span></li>
      <li><b>ビフォア：</b> <span style="color:green">${before}</span></li>
      <li><b>ファクト：</b> <span style="color:green">${fact}</span></li>
      <li><b>アフター：</b> <span style="color:green">${after}</span></li>
    </ul>
  </section>
  `
}
function listLink(title,url){
  return `<li><a href='${url}' target='_blank' onclick="return confirm('このサイトに移動しますか？')">${title}</a></li>`;
}
function listSub(title,url){
  return `<ul><li><a href='${url}' target='_blank' onclick="return confirm('このサイトに移動しますか？')">${title}</a></li></ul>`;
}
function listLink_m(title,url){
  return `<li><label><input type='checkbox'><span></span>
    <a href='${url}' target='_blank' onclick="return confirm('このサイトに移動しますか？')">${title}</a>
    </label></li>`;
}
function listSub_m(title,url){
  return `<ul><li><label><input type='checkbox'><span></span>
    <a href='${url}' target='_blank' onclick="return confirm('このサイトに移動しますか？')">${title}</a>
    </label></li></ul>`;
}

function auth(kw){
  // 入力ダイアログを表示＋入力内容をquestionに代入
  question = window.prompt("キーワードを入力してください。\n（キーワードが複数の場合はすべて入力）", "");
  // 入力内容が変数の値の場合は処理を実行
  if(question == kw){
    // クリックした要素のhrefを取得
    var url = event.target.href;
    // 別ウィンドウでリンクを開く
    window.open(url, '_blank');
  }
  // 入力内容が一致しない場合は警告ダイアログを表示
  else if(question != "" && question != null){
    window.alert(`キーワードに誤りがあるようです。\nキーワードは「${kw}」です。`);
  }
  // 空の場合やキャンセルした場合はアラートを閉じる
  else{
    return false
  }
}
function listLink_k(kw,title,url){
  return `<li><a href='${url}' target='_blank' onclick="auth('${kw}'); return false;">${title}</a></li>`;
}
function listSub_k(kw,title,url){
  return `<ul><li><a href='${url}' target='_blank' onclick="auth('${kw}'); return false;">${title}</a></li></ul>`;
}
