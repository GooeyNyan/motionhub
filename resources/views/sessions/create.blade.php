<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign In</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="./images/logo-icon.png" type="image/x-icon"/>
    <link href="/css/app.css" rel="stylesheet">
</head>
<body>
<div class="signin-container">
    <div class="signin_wrapper">
        <!-- logo -->
        <div class="logo">
            <img src="/images/logo-2.png" alt="motionhub logo">
        </div>

        <!-- signin form -->
        <div class="form-wrapper">
            <form action="#" method="post">
                {{ csrf_field() }}

                <div class="signin-control">
                    <label>
                        <span class="desc name">用户名</span>
                        <input type="text" name="name" class="signin-input">
                    </label>
                </div>
                <div class="signin-control">
                    <label>
                        <span class="desc psw">密码</span>
                        <input type="password" name="password" class="signin-input">
                    </label>
                </div>

                <div class="signin_links">
                    <div class="link-wrapper">
                        <a href="#">忘记密码?</a>
                    </div>
                    <div class="link-wrapper">
                        <a href="#">注册账号</a>
                    </div>
                </div>
                <div class="button-wrapper">
                    <button type="submit" class="signin_button">登录</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>