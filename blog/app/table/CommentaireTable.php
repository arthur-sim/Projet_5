<?php

namespace App\Table;

use Core\Table\Table;

class CommentaireTable extends Table{

	protected $table = "commentaire";

	public function commentaires($idArticle){
		return $this->query("
		SELECT m.id, m.article_id, m.nom, m.date, m.contenu
		FROM commentaire m
		WHERE m.article_id = ?", [$idArticle]);
	}
}