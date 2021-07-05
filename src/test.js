

function delete_db_info() 
{   
    
}

function delecte_file() 
{   

}

function clear_all() 
{   
  //删除所有数据库中数据
  delete_db_info();
  //删除所有文件
  delecte_file();
}



function check_user(name,password) 
{   
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      var xmlDoc = xhttp.responseXML;
      var ret = 0;
      var x = xmlDoc.getElementsByTagName("user");
      for (i = 0; i <x.length;  i++) { 
        if(x[i].getElementsByTagName("name")[0].childNodes[0].nodeValue == name)
        {
          if(x[i].getElementsByTagName("password")[0].childNodes[0].nodeValue == password)
          {
             
             ret = 1;
             break;
          }
        }
      }
      if(ret == 0)
      {
        alert("登陆失败");
      }
      else
      {
        alert("成功登陆");
      }
    }
  };
  xhttp.open("GET", "./data.xml", true);
  xhttp.send();
}

function getInputValue(id) {
  return document.getElementById(id);
}


function login1() {
  var x = document.forms["myForm"]["fname"].value;
  var y = document.forms["myForm"]["fpassword"].value;
  if (x == "" || y == "") {
    alert("必须填写姓名！");
    return false;
  }
  check_user(x,y);
}




function myFunction1() {
    document.getElementById("demo").innerHTML = 5+6;
    document.write(5 + 6);
    alert("必须填写姓名");
}


function getxmldata() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
       xml_action(xhttp);
    }
  };
  xhttp.open("GET", "./data.xml", true);
  xhttp.send();
}


function xml_action(xml) {
  var i;
  var xmlDoc = xml.responseXML;
  var table="<tr><th>username</th><th>age</th><th>password</th></tr>";
  var x = xmlDoc.getElementsByTagName("user");

  for (i = 0; i <x.length;  i++) { 
    table += "<tr><td>" +
    x[i].getElementsByTagName("name")[0].childNodes[0].nodeValue  +
    "</td><td>" +
    x[i].getElementsByTagName("age")[0].childNodes[0].nodeValue  +
    "</td><td>" +
    x[i].getElementsByTagName("password")[0].childNodes[0].nodeValue
    "</td></tr>";
  }
   document.getElementById("demo1").innerHTML = table;
} 

function myFunction2() {
    var txt;
    if (confirm("Press a button!")) {
      txt = "您按了确定";
    } else {
      txt = "您按了取消";
    }
    document.getElementById("demo").innerHTML = txt;
  }

  function setCookie(cname,cvalue,exdays) {
    //var d = new Date();
    //d.setTime(d.getTime() + (exdays*24*60*60*1000));
    //var expires = "expires=" + d.toGMTString();
    document.cookie = cname + "=" + cvalue + ";" //+ expires + ";path=/";
  }
  
  function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i < ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
  }
  
  function checkCookie() {
    var user=getCookie("username");
    if (user != "") {
      alert("再次欢迎您，" + user);
    } else {
       user = prompt("请输入姓名：","");
       if (user != "" && user != null) {
         setCookie("username", user, 30);
       }
    }
  }