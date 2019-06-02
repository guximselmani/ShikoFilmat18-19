
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kthe passwordin </title>
    <link rel="stylesheet" href="Css/resetPass.css" type="text/css">
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

    <div id="highlighted" class="hl-basic hidden-xs">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-9 col-sm-offset-3 col-md-9 col-md-offset-3 col-lg-10 col-lg-offset-2">
                    <h1>Forgot Password</h1>
                </div>
            </div>
        </div>
    </div>
    <div id="content" class="interior-page">
        <div class="container-fluid">
            <div class="row">
                <!--Sidebar-->
                <div class="col-sm-3 col-md-3 col-lg-2 sidebar equal-height interior-page-nav hidden-xs">
                    <div class="dynamicDiv panel-group" id="dd.0.1.0">
                        <div id="subMenu" class="panel panel-default">
                            <ul class="subMenuHighlight panel-heading">
                                <li class="subMenuHighlight panel-title" id="subMenuHighlight">
                                    <a id="li_291" class="subMenuHighlight" href="signup.php"><span>Register</span></a>
                                </li>
                            </ul>
                            <ul class="panel-heading">
                                <li class="panel-title">
                                    <a class="subMenu1" href=""><span class="subMenuHighlight">Forgot Password</span></a>
                                </li>
                            </ul>
                            <ul class="panel-heading">
                                <li class="panel-title">
                                    <a class="subMenu1" href="index.php"><span>Login</span></a>
                                </li>
                            </ul>
                        </div>
                        <div class="item item-nopad item-noborder item-gold">
                            <a style="padding: 5% 0px;" href="" class="btn btn-primary btn-block" role="button">LEARN MORE</a>
                        </div>
                    </div>
                </div>

                <!--Content-->
                <div class="col-sm-9 col-md-9 col-lg-10 content equal-height">
                    <div class="content-area-right">
                        <div class="content-crumb-div">
                            <a href="index.php">Home</a> | <a href="">Your Account</a> | Forgot Password
                        </div>
                        <div class="row">
                            <div class="col-md-5 forgot-form">
                                <p>Please enter your email address below and we will send you information to change your password.</p>
                                <label class="label-default" for="un">Email Address</label>
                                    <input class="form-control" id="email" placeholder="Your Email Address"><br>
                                <input type="button" class="btn btn-primary" id="resetPassword" value="Reset Password">
                            </div>
                            <div class="col-md-5 forgot-return" style="display:none;">
                                <p id="response"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    <script type="text/javascript">

        var email = $("#email");

        $(document).ready(function () {
            $('#resetPassword').on('click', function () {
                if (email.val() != "") {
                    email.css('border', '1px solid green');

                    $.ajax({
                        url: 'db/sendEmail.php',
                        method: 'POST',
                        dataType: 'json',
                        data: {
                            email: email.val()
                        }, success: function (response) {
                            if (!response.success)
                                $("#response").html(response.msg).css('color', "red");
                            else
                                $("#response").html(response.msg).css('color', "green");
                        }
                    });
                } else
                    email.css('border', '1px solid red');
            });
        });
    </script>

</body>
</html>