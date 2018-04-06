<?php

namespace App\Entity;

use Core\Entity\Entity;

class commentaireEntity extends Entity {

    public function getUrl() {
        return 'index.php?p=admin.posts.commentaire&id=' . $this->id;
    }

}
