<nav>
  <div class="burger-menu">
    <button id="burger">
      <img src="../assets/images/custom/burger-img.png" alt="бургер-меню" width="40">
    </button>
    <div id="menu" class="burger-slide" disp>
      <a class="nav-item block" href="/">Главная</a>
      <a class="nav-item block" href="catalog.php">Каталог</a>
      <a class="nav-item block" href="about.php">О компании</a>
      <a class="nav-item block" href="contacts.php">Контакты</a>
    </div>
  </div>
  <ul class="main_menu">
    <li><a href="/">Главная</a></li>
    <li><a href="catalog.php">Каталог</a>
      <ul class="submenu">
        <li>
          <?php
				$str_out_cat="SELECT * FROM `catalog` WHERE status=1";
				$run_out_cat=mysqli_query($connect,$str_out_cat);
       		while ($out_cat=mysqli_fetch_array($run_out_cat)) {
       		echo " <a href=projects.php?id=$out_cat[id]>Проекты на $out_cat[name_cat]</a>";
       		}
      	?>
        </li>
      </ul>
    </li>
    <li><a href="about.php">О компании</a></li>
    <li><a href="contacts.php">Контакты</a></li>
  </ul>
</nav>