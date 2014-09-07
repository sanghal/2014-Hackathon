<html>
<head>
    <title></title>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:400,600,700">
    <link href="webincludes/css/bootstrap.css" rel="stylesheet">
    <!--<link href="webincludes/css/style.css" rel="stylesheet">-->
    <link href="webincludes/css/style.css" rel="stylesheet" type="text/css">
    <div id="main">
    </div>
    
    <?php
    include_once('app/templates/global-template.html');
    ?>

    <script>
        var slingo = window.slingo = {
            DEBUG_MODE: true
        };
        window.less = {
            logLevel: 0
        }

    </script>

   <script type="text/javascript" src="webincludes/js/jquery.js"></script>
    <script type="text/javascript" src="webincludes/js/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="webincludes/js/underscore.js"></script>
    <script type="text/javascript" src="webincludes/js/lodash.js"></script>
    <script type="text/javascript" src="webincludes/js/backbone.js"></script>
	<script type="text/javascript" src="webincludes/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="webincludes/js/slingo.js"></script>


    <script type="text/javascript" src="app/models/application.js"></script>
    <script type="text/javascript" src="app/models/user.js"></script>
    <script type="text/javascript" src="app/models/project.js"></script>

    <script type="text/javascript" src="app/collection/users.js"></script>

    <script type="text/javascript" src="app/views/header.js"></script>
    <script type="text/javascript" src="app/views/dashboard.js"></script>
    <script type="text/javascript" src="app/views/register.js"></script>
    <script type="text/javascript" src="app/views/houses.js"></script>
    <script type="text/javascript" src="app/views/payment.js"></script>
    <script type="text/javascript" src="app/views/application.js"></script>

    <script type="text/javascript" src="app/router.js"></script>

</body>
</html>