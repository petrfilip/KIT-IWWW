<footer>
  <div>
    <span class="footerHeading">Nejčtenější články</span>
    <ul>
      <?php
      foreach (BlogPostRepository::getAllByReadCounter() as $item) {
          echo ' <li><a href="#">'.$item["heading"].'</a></li>';
      }
      ?>
    </ul>
  </div>

  <div>
    <span class="footerHeading">Nejnovější články</span>
    <ul>
        <?php
        foreach (BlogPostRepository::getAllSortByIdDesc(5) as $item) {
            echo ' <li><a href="#">'.$item["heading"].'</a></li>';
        }
        ?>
    </ul>
  </div>

  <div>
    <span class="footerHeading">Zdroje</span>
    <ul>
      <li><a href="https://vzhurudolu.cz">vzhurudolu.cz</a></li>
      <li><a href="https://www.w3schools.com/">W3 schools</a></li>
      <li><a href="https://www.jakpsatweb.cz/">Jak psát web</a></li>
      <li><a href="https://www.youtube.com/watch?v=dtJ6WalLroU&ab_channel=PetrFilip">YouTube</a></li>
      <li><a href="https://www.figma.com/file/fSGSrz1D67kFyoFbPx4nYROU/IWWW?node-id=0%3A1">Figma</a></li>
      <li><a href="http://junior.guru/">Junior Guru</a></li>
    </ul>
  </div>
</footer>