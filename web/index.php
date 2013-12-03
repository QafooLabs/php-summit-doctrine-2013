<?php
$extensions = array("php", "jpg", "jpeg", "gif", "css", "js", "json");

$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$ext = pathinfo($path, PATHINFO_EXTENSION);
if (in_array($ext, $extensions)) {
    // let the server handle the request as-is
    return false;
}

$actions = array(
    'roomplan',
    'buy'
);

if (isset($_GET['action']) && in_array($_GET['action'], $actions)) {
    require_once $_GET['action'] . ".php";
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PHP-Summit JavaScript Frontend Demo</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <link href="css/locatr.css" rel="stylesheet">
  </head>

  <body>
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Locatr (beta)</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h1>Select your seat</h1>
                <div data-role="roomplan"></div>
            </div>
            <div class="col-md-3">
                <h2>Your selection</h2>
                <div data-role="details"></div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/handlebars.js"></script>
    <script type="text/javascript" src="js/app.js"></script>
    <script type="text/javascript" src="js/jquery.roomplan.js"></script>
    <script type="text/javascript" src="js/jquery.details.js"></script>


    <script id="template-roomplan" type="text/x-handlebars-template">
        <div class="roomplan">
            {{#each rows}}
                {{> row}}
            {{/each}}
        </div>
    </script>

    <script id="template-row" type="text/x-handlebars-template">
        <div class="row" data-role="row" data-row="{{@index}}">
            <div class="rownumber">{{rownumber}}</div>
            {{#each seats}}
                {{> seat}}
            {{/each}}
           </div>
    </script>

    <script id="template-seat" type="text/x-handlebars-template">
        <div class="seat {{#if-eq category "vip"}}vip{{/if-eq}} {{#if-eq category "box"}}box{{/if-eq}} {{#if taken}}taken{{/if}}"
             data-role="seat"
             data-seat="{{@index}}">
        </div>
    </script>

    <script id="template-details" type="text/x-handlebars-template">
        <div class="highlight row">
            <div class="col-md-6">
                <b>Seat selected:</b>
            </div>
            <div class="col-md-6">
                Row {{row}} Seat {{seat}}
            </div>
            <div class="col-md-6">
                <b>Category:</b>
            </div>
            <div class="col-md-6">
                {{category}}
            </div>
            <div class="col-md-6">
                <b>Price:</b>
            </div>
            <div class="col-md-6">
                {{price}} euro
            </div>

            <form method="POST" action="?action=buy">
                <input type="hidden" name="event_id" value="1" />
                <input type="hidden" name="seat" value="{{row}}{{seat}}" />

                <input type="submit" value="Jetzt zahlungspflicht bestellen" />
            </form>
        </div>
    </script>
  </body>
</html>
