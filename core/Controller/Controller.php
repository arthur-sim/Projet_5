<?php
	namespace Core\Controller;

	abstract class Controller{

		protected $viewPath;
		protected $template;

		protected function render($view, $variables = []){
			ob_start();
			extract($variables);
			require ($this->viewPath = '../app/views/' . str_replace('.', '/', $view) . '.php');
			$content = ob_get_clean();
			require ( '../app/views/templates/' . $this->template . '.php');
		}

		protected function notFound(){
			header('HTTP/1.0 404 Not Found');
			die('
			    <!DOCTYPE html>

                <head>
                    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
                    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
                    <link rel="stylesheet" href="css/style_admin.css" />
                </head>
                
                <body>
                
                
                    <div id="header">
                        <h1 id="titre">Ereur 404</h1>
                    </div> 
                
                    <div style="text-align: center">
                        <h1>page introuvable<h1>
                        <btn><a href="index.php">Retour a laccueil</a></btn>
                    </div>
                   
                </body>
			    
			');
		}

		protected function forbidden(){
			header('location: index.php?p=users.login');
		}

	protected function redirectTo($url){
		header('Location: ' . $url);
        exit();
	}

}
?>