$('tobody').append(contents("基礎知識","","サンプルテーマ１","sample"));

$("#sample").click(function(){
  document.getElementById("note").innerHTML = 
  "<ul>"+
    "<h3>サンプルテーマ第1章</h3>"+
    listLink("Googleトップページ","https://www.google.com/webhp?hl=ja&sa=X&ved=0ahUKEwjh59WbhvngAhXcLqYKHeKID6wQPAgH")+
    listSub("Gmail","https://accounts.google.com/ServiceLogin/signinchooser?service=mail&passive=true&rm=false&continue=https%3A%2F%2Fmail.google.com%2Fmail%2F%3Ftab%3Dwm%26ogbl&scc=1&ltmpl=default&ltmplcache=2&emr=1&osid=1&flowName=GlifWebSignIn&flowEntry=ServiceLogin")+
  "</ul>";
});
