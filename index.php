<!doctype html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>调查问卷</title>
<style type="text/css">
body {
	font-size: 14px;
	line-height: 20px;
	background-color: #f6f7f9;
    color:#fff;
	width:100%;
}
.img1{
	position:absolute;
	height:350px;
	width:450px;
	margin-top:135px;
	margin-left:30px;
	}
.img2{
	position:absolute;
	height:330px;
	width:330px;
	margin-top:180px;
	margin-left:500px;
	padding-left:30px;
	}
	    .fll{float: left;}
        .flr{float: right;}
        .login{
            position: absolute;
           margin-top:  200px;
           margin-left: 520px;
            width: 350px;
            height: 300px;
        }
        .loginbox{
            font-family: 'Segoe UI', 'Microsoft Yahei', Arial, Simsun, sans-serif, "宋体";
            font-size: 14px;
            padding:20px 25px 0 25px;
        }
        .loginboxtag{
            height: 30px;
            line-height: 30px;
            padding-left: 2px;
            color: #555;
            cursor: default;
            user-select: none; -moz-user-select: none;  -webkit-user-select: none;  -ms-user-select: none;
        }
        .loginboxinput{
            height: 50px;
        }
        input[type="text"], input[type="password"], textarea{ 
            padding-left: 27px;
            padding-top: 10px;
            outline: 0px;
            height: 30px;
            width: 200px;
            border: 1px solid #ccc;
        }
      input[type="text"] {
         background: url(img/iconman.png)  no-repeat #f8faf8;
        }
        input[type="password"] {
            background: url(img/iconlock.png) no-repeat #f8faf8;
        }
        input[type="text"]:focus, input[type="password"]:focus, textarea:focus { 
            border: 1px solid #c8c8c8;
            background-color: #f3f7f3;
        }
        .loginboxbtn{
            overflow: auto;zoom: 1;
            height: 40px;
            padding-top: 10px;
        }
        input[type="checkbox"]{
            margin: 0;
            margin-right: 10px;
        }
        .loginboxbtn .rem{
            font-size: 12px;
            padding-top: 15px;
            padding-right:10px;
            user-select: none; -moz-user-select: none;  -webkit-user-select: none;  -ms-user-select: none;
        }
        .loginboxbtn .rem span label{
            color: #555;
            position: relative;
            top: -2px;
            cursor: default;
        }
        .btn{
           margin-left: 30px;
            display: inline-block;
            width: 60px;
            height: 30px;
            line-height: 30px;
            text-align: center;
            background: #46Ae00;
            color: #fff;
            box-shadow: 0 0 1px rgba(0,0,0,0.3);
            cursor: pointer;
            user-select: none; -moz-user-select: none;  -webkit-user-select: none;  -ms-user-select: none;
        }
        .btn:hover{
            background: #339b00;
        }
        .btn:active{
            background: #288f00;
        }
</style>
</head>

<body>
<img src="img/1.png" class="img1" />
<img src="img/2.png" class="img2" />
 <div class="login">
    <div class="angel">
        <div class="loginbox">
            <form name="loginform" id="loginform" method="post" action="login.php">
                <div class="loginboxtag">用户名：</div>
                <div class="loginboxinput"><input type="text" name="username" /></div>
                <div class="loginboxtag">密码：</div>
                <div class="loginboxinput"><input type="password" name="password" /></div>
                <br><br>
                <div class="loginboxbtn">
                    <div class="fll rem">
                    	<input id="rem" type="checkbox" />
                    	<span><label for="rember">记住登录状态</label></span>
                    </div>
                    <button class="flr btn" type="submit" name="submit">登入</button>
                </div>
            </form>
        </div>
    </div>
 </div>
  
</body>
</html>
