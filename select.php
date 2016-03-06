<?php
session_start();
if (!$_SESSION['id']) {
    header("location: index.php");
    exit;
}
?>
<!doctype html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>首页</title>
<style>
body{
 	background:url(img/模糊镜头1.jpg);    
	width:100%;
    height:100%;
	background-size:cover;
	z-index:-1;
	background-color: #f6f7f9;
	}
.img4{
    margin: 0 0 0 130px;
	}
#nav{
	position:absolute;
    margin:20px 0 0 175px;
    width: 70%;
    height: 46px;
    border-radius: 8px;
    border: 1px solid #cbcbcb;
    border-bottom: 4px solid #adadad;
}
#nav a{
    display: block;
    width: 16.6%;
    height: 46px;
    line-height: 46px;
    float: left;
    border-bottom: 4px solid #adadad;
    text-align: center;
    text-decoration: none;
    color:#003;
}
#nav a:first-child{
    border-radius: 0 0 0 8px;
}
#nav a:last-child{
    border-radius: 0 0 8px 0;
}
#nav a:hover{
    border-bottom: 4px solid #003;
    color: #090;
}
#nav a:first-child:hover{
    border-bottom: 4px solid #003;
    border-radius: 0 0 0 8px;
}
#nav a:last-child:hover{
    border-bottom: 4px solid #003;
}
#dis{background-color:#fff;opacity:0.5; width:650px;height:320px;margin-top:120px;margin-left:300px;}
#h3{padding-left:60px;}
</style>
</head>
<body style="overflow-x:hidden">
<div class="img4">
<img src="img/4.png">
</div>
<div id="nav">
    <a href="#">首页</a>
    <a href="paper.php?id=1">气质表</a>
    <a href="#">问卷表</a>
    <a href="#">气质量表</a>
    <a href="#">气质问卷量表</a>
    <a href="#">管理</a>
</div>
<div id="dis">
<br />
<h1><center>填写说明</center></h1>
<h3 id="h3">1.请注意先登录，方可填写相应问卷。</h3>
<h3  id="h3">2.请注意先登录，方可填写相应问卷。</h3>
<h3  id="h3">3.请注意先登录，方可填写相应问卷。</h3>
<h3  id="h3">4.请注意先登录，方可填写相应问卷。</h3>
</div>
</body>
</html>
