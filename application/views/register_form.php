<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Registration Form</title>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4 p-1">
            <h3 class="text-center text-primary">Register Now</h3><br/>
            <form action="insert" method="post" onsubmit="return validateForm()">
                <table class="table table-borderless">
                    <tr>
                        <td>First Name</td>
                        <td>
                            <input type="text" name="first_name" id="first_name" placeholder="First Name"
                                   class="form-control"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Last Name</td>
                        <td>
                            <input type="text" name="last_name" id="last_name" placeholder="Last Name"
                                   class="form-control"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Phone (+44)</td>
                        <td>
                            <input type="text" name="phone_number" id="phone_number" placeholder="Phone Number"
                                   class="form-control"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Date Of Birth</td>
                        <td>
                            <input type="date" name="date_of_birth" id="date_of_birth" placeholder="Date Of Birth"
                                   class="form-control" required/>
                        </td>
                    </tr>
                    <tr>
                        <td>Email ID</td>
                        <td>
                            <input type="email" name="email" id="email" placeholder="Email ID" class="form-control"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td>
                            <input type="password" name="pwd" id="pwd" placeholder="Password" class="form-control"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Confirm Password</td>
                        <td>
                            <input type="password" name="cpwd" id="cpwd" placeholder="Password" class="form-control"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Country</td>
                        <td>
                            <select name="country" class="form-control" id="country">
                                <option value="1">UK</option>
                                <option value="2">Canada</option>
                                <option value="3">India</option>
                                <option value="4">Nepal</option>
                                <option value="5">Germany</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Subscription For</td>
                        <td>
                            <select name="subscription_for" class="form-control" id="subscription_for">
                                <option value="story">Story</option>
                                <option value="comment">Comment</option>
                                <option value="poll">Pole</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-center">
                            <input type="submit" value="Register Now" class="btn btn-primary"/>
                        </td>
                    </tr>

                </table>
            </form>
        </div>
        <div class="col-sm-4"></div>
    </div>
</div>
<script>
    function validateForm() {
        let first_name = $("#first_name").val();
        let last_name = $("#last_name").val();
        let phone_number = $("#phone_number").val();
        let date_of_birth = $("#date_of_birth").val();
        let email = $("#email").val();
        let pwd = $("#pwd").val();
        let cpwd = $("#cpwd").val();
        let country = $("#country").val();
        let subscription_for = $("#subscription_for").val();

        let pattern = /^(\+44\s?7\d{3}|\(?07\d{3}\)?)\s?\d{3}\s?\d{3}$/;
        const email_pattern = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

        if (first_name.length < 3) {
            alert("First Name Not Valid");
            return false;
        }
        if (last_name.length < 1) {
            alert("Last Name Not Valid");
            return false;
        }
        if (!phone_number.match(pattern)) {
            alert("The Phone Number is not a Valid UK Phone Number");
            return false;
        }
        if(!email_pattern.test(String(email).toLowerCase())) {
            alert("Invalid Email");
            return false;
        }
        if(pwd != cpwd) {
            alert("Passwords Doesn\'t Match. Kindly Check");
            return false;
        }
        if(pwd.length < 5) {
            alert("Password must be 5 or more characters length");
            return false;
        }
    }
</script>
</body>
</html>