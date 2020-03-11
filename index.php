<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title>Business Card Generator</title>
	<script src="styles/js/jquery-1.11.1.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500&display=swap" rel="stylesheet">
	<link href="plugins/boostrap/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link href="styles/css/style.css" rel="stylesheet">
	<script src="plugins/boostrap/js/bootstrap.min.js"></script>
	<script src="styles/js/main.js"></script>
	<!--[if lt IE 9]>
	<script src="plugins/maxcdn/html5shiv.min.js"></script>
	<script src="plugins/maxcdn/respond.min.js"></script>
	<![endif]-->
</head>
<body>
    <div class="container">
        <header>
            <div class="box-width">
                <h1>Business Card Generator</h1>
            </div>
        </header>
        <div class="box-width">
            <section class="box-intro">
                <div class="row">
                    <div class="col-md-6">
                        <h2>Grow your business with flashy cards</h2>
                        <div class="content">
                            <p>
                                Get in front of customers when they’re looking at your card.
                                Let them see that you mean business and that they can trust your skills
                            </p>
                        </div>
                        <a href="#registration" class="btn btn-default _btnprimary"><i class="glyphicon glyphicon-plus"></i>START HERE</a>
                    </div>
                    <div class="col-md-6">
                        <img src="styles/img/cover.png" alt="" class="img-responsive" />
                    </div>
                </div>
            </section>
            <section>
                <form id="registration" class="form-horizontal">
                    <ul id="order" class="nav nav-tabs nav-justified">
                        <li class="disabled active"><a href="#tab-register" data-toggle="tab">Form input</a></li>
                        <li class="disabled"><a href="#tab-preview" data-toggle="tab">Preview card</a></li>
                        <li class="disabled"><a href="#tab-export" data-toggle="tab">Export card</a></li>
                    </ul>
                    <div class="tab-content" id="tabs">
                        <div class="tab-pane active" id="tab-register">
                            <div class="col-sm-12">
                                <div class="box-register">
                                    <div class="form-group has-float-label">
                                        <input type="text" name="firstname" class="form-control" id="firstname" placeholder="Paul">
                                        <label for="first-name">First Name</label>
                                        <span class="firstname error"></span>
                                    </div>
                                    <div class="form-group has-float-label">
                                        <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Nguyen">
                                        <label for="last-name">Last Name</label>
                                        <span class="lastname error"></span>
                                    </div>
                                    <div class="form-group has-float-label">
                                        <input type="text" name="companyname" class="form-control" id="companyname" placeholder="Co.op">
                                        <label for="company-name">Company Name</label>
                                        <span class="companyname error"></span>
                                    </div>
                                    <div class="form-group has-float-label">
                                        <input type="email" name="email" class="form-control" id="emailaddress" placeholder="example@gmail.com">
                                        <label for="email-address">Email Address</label>
                                        <span class="emailaddress error"></span>
                                    </div>
                                    <div class="form-group has-float-label">
                                        <input type="text" name="phone_number" class="form-control" id="phonenumber" placeholder="123-456-789">
                                        <label for="phone-number">Phone Number</label>
                                        <span class="phonenumber error"></span>
                                    </div>
                                    <div class="form-group text-right">
                                        <button type="button" id="preview" class="btn btn-primary _btnprimary"><i class="glyphicon glyphicon-plus"></i> SUBMIT</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab-preview">
                            <div id="result_name">
                                <img src="download/no-image.png" class="img-responsive"/>
                                <br/>
                                <br/>
                                <div class="text-right">
                                    <button type="button" onclick="$('a[href=\'#tab-register\']').tab('show');" class="btn btn-link btnEdit">EDIT</button>
                                    <button type="button" onclick="$('a[href=\'#tab-export\']').tab('show');" class="btn btn-primary _btnprimary">LOOKS GOOD</button>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab-export">
                            <div id="result_name">
                                <img src="download/no-image.png" class="img-responsive"/>
                                <br/>
                                <br/>
                                <div id="btndownload" class="text-right">
                                    <a href="download/no-image.png" class="btn btn-primary _btnprimary" download>DOWNLOAD</a>
                                </div>
                            </div>
                        </div>
            </section>
        </div>
    </div>
</body>
</html>