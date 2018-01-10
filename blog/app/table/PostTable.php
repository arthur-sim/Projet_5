<?php

namespace App\Table;

use Core\Table\Table;


class PostTable extends Table{

	protected $table = 'article';
	/** 
	*récupere les derniers article
	*return array
	*/
	public function last(){
		return $this->query("
			SELECT a.id, a.titre, a.contenu, a.date, c.titre as categorie
			FROM article a 
			LEFT JOIN categorie c ON category_id = c.id
			ORDER BY a.date DESC
			");
	}

	/** 
	*récupere les derniers article de la cate demandée
	* @para $category_id int
	*return array
	*/
	public function lastByCategory($category_id){
		return $this->query("
			SELECT a.id, a.titre, a.contenu, a.date, c.titre as categorie
			FROM article a
			LEFT JOIN categorie c ON category_id = c.id
			WHERE a.category_id = ?
			ORDER BY a.date DESC ", [$category_id]);
	}
	/** 
	*récupere un article en liant la cate associé
	* @para $id int
	*return \App\Entity\PostEntity
	*/
		public function findWithCategory($id){
		return $this->query("
			SELECT a.id, a.titre, a.contenu, a.date, c.titre as categorie
			FROM article a
			LEFT JOIN categorie c ON category_id = c.id
			WHERE a.id = ?", [$id], true);
	}

}