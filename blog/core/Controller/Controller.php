<?php
	namespace Core\Controller;

	class Controller{

		protected $viewPath;
		protected $template;

		public function render($view, $variables = []){
			ob_start();
			extract($variables);
			require ($this->viewPath = '../app/views/' . str_replace('.', '/', $view) . '.php');
			$content = ob_get_clean();
			require ( '../app/views/templates/' . $this->template . '.php');
		}

		protected function notFound(){
			header('HTTP/1.0 404 Not Found');
			die('page introuvable');
		}

		protected function forbidden(){
			header('location: index.php?p=users.login');
		}

	}


?>