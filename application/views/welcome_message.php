<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Login / Register</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>

</head>
<body>

<div id="container">

    <div id="body">
        <form action="<?php echo base_url(); ?>login/index" method="post" class="pt-3 text-center" onsubmit="return validateLogin()">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-4 p-5">
                        <?php if (isset($status) && $status == "success") { ?>
                            <div class="alert alert-success alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Registered Successfully !</strong> Login Now.
                            </div>
                        <?php } ?>
                        <h3 class="text-success">Login Now</h3>
                        <table class="table table-borderless table-sm">
                            <tr>
                                <td>
                                    <input type="email" id="email" name="email" placeholder="Email ID" class="form-control"/>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="password" name="pswd" id="pswd" placeholder="Password" class="form-control"/>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="g-recaptcha"
                                         data-sitekey="<?php echo $this->config->item('google_key') ?>"></div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <button type="submit" class="btn btn-success">Login</button> &nbsp; <a
                                            href="<?php echo base_url(); ?>register/index">Register</a>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-sm-4"></div>
                </div>
            </div>
        </form>

    </div>
</div>
<script>
    function validateLogin() {
        let email = $("#email").val();
        let pswd = $("#pswd").val();
        const email_pattern = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

        if(!email_pattern.test(String(email).toLowerCase())) {
            alert("Invalid Email");
            return false;
        }
        if(pswd.length < 5) {
            alert("Password must be 5 or more characters length");
            return false;
        }
    }
</script>
</body>
</html>