<!DOCTYPE html>
<html lang="en">
<head>
    <title>Template for an interactive web page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <script src="verify.js"></script>
</head>
<body>
    <div class="container" style="margin-top: 30px">
        <header class="jumbotron text-center row" style="margin-bottom: 2px;background: linear-gradient(white,#0073e6);padding: 20px;">
            <?php include ('header.php');?>
        </header>
        <div class="row" style="padding-left: 0px;">
            <nav class="col-sm-2">
                <ul class="nav nav-pills flex-column">
                    <?php include ('nav.php');?>
                </ul>
            </nav>
            <?php
            if($_SERVER['REQUEST_METHOD']=='POST')
            {

            }
            ?>
            ?>
        </div>
    </div>
</body>
</html>
