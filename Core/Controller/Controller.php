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

		protected function forbidden(){
			header('location: index.php?p=users.login');
		}

	protected function redirectTo($url){
		header('Location: ' . $url);
        exit();
	}

}
?>