<!DOCTYPE html>
<head>
  <title><?= App::getInstance()->title; ?></title>
  <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/style.css" />
</head>
<body>

  <div id="contact">
      <div id="contact_txt">
        <p>Contact</p>
      </div>
  </div>

  <div class="row" id="_menu">
    <div class="col-sm-4" id="_menu_txt_1" >
      <a href="#nouv" id="_menu_a">Nouveautées</a>
    </div>
    <div class="col-sm-4" id="_menu_txt_2" >
      <a href="#moi" id="_menu_a">CV</a>
    </div>
    <div class="col-sm-4" id="_menu_txt_3">
      <a href="#contact" id="_menu_a">Contact</a>
    </div>
  </div>

  <div id="info">
    <div id="reseaux">
      <h1>Réseaux : </h1>
      <p><a href="https://www.linkedin.com/in/arthur-s-23b43a140/" target="_blank">Linkedin</a></p>
      <p><a href="https://www.facebook.com/arthur.simonian.9" target="_blank">Facebook</a></p>
      <p><a href="https://twitter.com/Simonia65226050" target="_blank">Twiiter</a></p>
    </div>
    <div id="_info">
      <h1>Information : </h1>
      <p>Mail : <em>arthur.simonian@outlook.fr</em></p>
      <p>Téléphone : <em>06 58 84 78 45</em></p>
    </div>
  </div>

  <div id="mailing">
      <div id="mailing_petit">
        <h1>Ecrivez moi :</h1></br>
        <form method="post">
            <input type="text" name="name" id="name" required placeholder="Votre nom" style="width: 60%;" />
                </br></br>
            <input type="email" name="email" id="email" required placeholder="Votre mail" style="width:75%;"/>
                </br></br>
            <input type="text" name="subject" id="subject" required placeholder="Votre sujet" style="width: 70%; "/>
                </br></br>
            <textarea name="message" id="message" required placeholder="Votre message" style="width: 90%;"></textarea>
                </br></br>
            <button class="btn btn-primary" id="boutonmail">Envoyer</button>       
        </form>
      </div>
  </div>
  </br>

</body>