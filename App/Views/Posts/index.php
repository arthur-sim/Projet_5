<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $destinataire = 'arthuursimonian@gmail.com';
    $expediteur = $_POST['email'];
    $objet = $_POST['subject'];

    $headers = 'MIME-Version: 1.0' . "\n"; // Version MIME
    $headers .= 'Content-type: text/html; charset=ISO-8859-1' . "\n"; // l'en-tete Content-type pour le format HTML
    $headers .= 'To: ' . $destinataire . "\n"; // Mail de reponse
    $headers .= 'From: "' . $_POST['name'] . '"<' . $expediteur . '>' . "\n"; // Expediteur

    $message = '<div style="width: 100%; text-align: center; font-weight: bold"> ' . $_POST['message'] . '</div>';

    if (mail($destinataire, $objet, $message, $headers)) {
        echo '<script languag="javascript" >alert("Votre message a bien été envoyé ");</script>';
    } else {
        echo '<script languag="javascript">alert("Votre message n\'a pas pu être envoyé");</script>';
    }
}
?>
<!DOCTYPE html>
<head>
    <title><?= App::getInstance()->title; ?></title>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>

    <header>
        <div id="header_style" style="display: flex;justify-content: space-between;">
            <a href="index.php" id="head_a"><img src="css/images/house.png"></a>
            <p id="head_p">Arthur Simonian</p> 
            <a href="index.php?p=admin.posts.index" id="head_a"><img src="css/images/settings.png"></a>
        </div>
        <div id="navigation" style="display: flex; font-size: 1.5em;">
            <li><a href="#posts">Nouveautées</a></li>
            <li><a href="#cv">Cv</a></li>
            <li><a href="#contact">Contact</a></li>
        </div>
    </header>

    <div id="header">
        <div>
            <h1 id="titre">Portfolio</h1>
        </div>  
    </div>  

    <div id="posts" style="margin-top: 3%;margin-bottom: -4%;">
        <?php foreach ($posts as $post): ?>
            <div id="post">
                <h1><a href="<?= $post->url ?>"><?php display($post->titre); ?></a></h1>
                <p><?= $post->date; ?></p>
                <p style="font-size:0.9em;"><em><?php display($post->categorie); ?></em></p>
                <p><?= $post->extrait; ?></p>
            </div>
        <?php endforeach; ?>
    </div>

    <div id="cate"> 
        <?php foreach ($categories as $categorie): ?>
            <li><a href="<?= $categorie->url; ?>"><?php display($categorie->titre); ?></a></li>
        <?php endforeach ?>
    </div>

    <img src="css/images/coupure_haut.png" style="width: 100%;"/>

    <div id="cv">
        <div id="_cv">
            <div>
                <h1>Formation :</h1>
                <h2>Bac S <em>[ juin 2019 ]</em>.</h2>
                <p>Option science de l'ingénieur.</p>
                <br>
                <h2>Etudiant chez Open CLassrooms <em>[ été 2018 ]</em> .</h2>
                <p>Développeur d'application - PHP/SYMFONY.</p>
            </div>
            <div>
                <h1>Compétences :</h1>
                <h2>Maitrise d'outils.</h2>
                <p>Word, Excel, Photoshop, Powerpoint, Wordpress..</p>
                <br>
                <h2>Languages informatiques.</h2>
                <p> HTML5 , CSS3 , PHP(débutant).</p>
                <br>
                <h2>Graphisme.</h2>
                <p>Pratique réguliere de dessin (digital et classique) pour illustrations ou graphisme en tout genre.</p>
            </div>
            <div>
                <h1>Experiences :</h1>
                <h2>Startup week end Aix-marseille.</h2>
                <p>Projet (Krowork) Ubérisation job étudiant, 1ére place. </br>
                    <em>Projet abandonné.</em></p>
                <br>
                <h2>Startup week end Montpelier.</h2>
                <p>Projet (AlfredLeConcierge) Ubérisation job étudiant, 2nd place.</br>
                    <em>Projet abandonné.</em></p>
                <br>
                <h2>Startup week end Avignon.</h2>
                <p>Projet (Lowcostagency) agence web bas prix, 3eme place.</br>
                    <em>Projet en cours de développement.</em></p>
                <br><br>
                <h2>Low-cost.agency.</h2>
                <p>Développement en cours du site web.</p>
            </div>
            <div>
                <h1>Centre d'intérêt :</h1>
                <h2>Judo.</h2>
                <p>Judo ceinture marron, une dizaine d'années de pratique.</p>
                <br>
                <h2>Dessin.</h2>
                <p>Amateur [ digital/papier/bombe ].</p>
            </div>
            <br><br>
            <p style="text-align: center;">Pour voir mon cv au format pdf, <a href="cv.pdf" target="_blank">cliquez ici</a>.</p>
        </div>
    </div>

    <div id="contact_background">
        <div id="contact">
            <div id="contact_padding">

                <h1 style="text-align: center; font-size: 4.1em;">Contactez-moi !</h1></br>

                <h3>Mail : <em>arthur.simonian@outlook.fr</em></h3>
                <h3>Numéro : <em>06 58 84 78 45</em></h3>

                <form method="post" style="margin-top: 5%; margin-bottom: 5%; color:black;">
                    <h3 style="color: white">Envoyez moi un mail :</h3>
                    <div class="row">
                        <div class="col-sm-7"><input type="text" name="name" id="name" required placeholder="Votre nom"/></div>
                        <div class="col-sm-5"><input type="email" name="email" id="email" required placeholder="Votre mail"/></div>
                    </div>
                    </br>
                    <input type="text" name="subject" id="subject" required placeholder="Votre sujet"/>
                    </br></br>
                    <textarea name="message" id="message" required placeholder="Votre message"></textarea>
                    </br></br>
                    <button class="btn btn-primary" id="boutonmail">Envoyer</button>       
                </form>

                <div id="reseaux">
                    <a href="https://www.linkedin.com/in/arthur-s-23b43a140/" target="_blank" style="margin: 2%;"><img src="css/images/linkedin.png"></a>
                    <a href="https://www.facebook.com/arthur.simonian.9" target="_blank" style="margin: 2%;"><img src="css/images/facebook.png"></a>
                    <a href="https://twitter.com/Simonia65226050" target="_blank" style="margin: 2%;"><img src="css/images/twitter.png"></a>
                </div>
            </div>
        </div>
    </div>

</body>
