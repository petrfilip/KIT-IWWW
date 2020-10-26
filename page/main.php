<section id="hero">
  <h1 class="pageHeading">Cestovatelský blog</h1>
  <div class="button"><a href="#">Chci taky cestovat</a></div>
</section>

<section>
  <div class="centeredContentWrapper">
    <h2>Poslední články</h2>
  </div>

  <div id="blogPostList" class="centeredContentWrapper">
    <?php

    foreach (BlogPostRepository::getAll() as $item) {
        echo '<article class="blogPostPreview">
      <img src="'.$item["image"].'" alt="'.$item["heading"].'">
      <h3><a href="/index.php?page=experiments&action=detail&id='.$item["id"].'">'.$item["heading"].'</a></h3>
    </article>';
    }


    ?>
  </div>

</section>