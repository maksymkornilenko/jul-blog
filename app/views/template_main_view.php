<!DOCTYPE html>
<html>
    <title>MY BLOG</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="app/views/css/accordion.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <script src="app/views/js/main.js" type="text/javascript"></script>
    <style>
        body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
    </style>
    <body class="w3-light-grey">
        <main>
            <?php include_once 'app' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . $content_view . ".php"; ?>
        </main>
        <script src="app/views/js/accordion.js" type="text/javascript"></script>
    </body>
</html>
