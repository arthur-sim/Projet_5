<div id="nouv">
  <div id="nouv_txt">
    <p><?= $categorie->titre ?></p>
  </div>
</div>

<div style="display: flex; font-size: 1.5em;">
  <?php foreach($categories as $categorie): ?>
    <li><a href="<?= $categorie->url; ?>"><?= $categorie->titre; ?></a></li>
  <?php endforeach ?>
</div>
<div id="posts" style="margin-top: 3%; margin-bottom: 5%;">
	<?php foreach ($articles as $post): ?>
		<h2><a href="<?= $post->url ?>"><?= $post->titre; ?></a></h2>
		<p><em><?= $post->categorie; ?></em></p>

		<p><?= $post->extrait; ?></p>
	<?php endforeach; ?>
</div>