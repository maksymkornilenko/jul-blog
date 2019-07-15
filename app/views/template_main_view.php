<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>My site</title>
        <link href="app/views/css/main.css" rel="stylesheet" type="text/css"/>
        <link href="app/views/css/table.css" rel="stylesheet" type="text/css"/>
        <link href="app/views/css/accordion.css" rel="stylesheet" type="text/css"/>
        <link href="app/views/css/newNews.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="app/views/css/SingleNews.css" rel="stylesheet" type="text/css"/>
        <script src="app/views/js/main.js" type="text/javascript"></script>


    </head>
    <body>
        <main>
            <?php include_once 'app' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . $content_view . ".php"; ?>
        </main>
        <script src="app/views/js/accordion.js" type="text/javascript"></script>
    </body>
</html>
