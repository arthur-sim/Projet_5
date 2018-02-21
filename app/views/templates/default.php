<!DOCTYPE html>

  <head>
    <title><?= App::getInstance()->title; ?></title>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>

  <body>

    <div>
      <?= $content; ?>
    </div>

    <footer id="monter">
        <a href="#header"><img src="css/images/monter.png" id="fleche"></a>  
    </footer>
    
  </body>

</html>
