<content>
  <div class="title"><h2>О компании</h2></div>
	<div class="about">
    <div class="slider">
        <?php
      $str_out_gal="SELECT * FROM `gallery` WHERE status=1";
      $run_out_gal=mysqli_query($connect,$str_out_gal);
      while ($out_gal=mysqli_fetch_array($run_out_gal)) {
        echo "
        <div class=item>
        <img src=assets/images/gallery/$out_gal[img_gal] alt=Фото из галереи>
        </div>
        ";
      }
    ?>
    <a class="previous" onclick="previousSlide()">&#10094;</a>
    <a class="next" onclick="nextSlide()">&#10095;</a>
</div>
<ul class="text_about">
  <h2>Почему выбирают нас?</h2><br>
    <li>Опыт и профессионализм: более 10 лет на рынке строительства и проектирования, более 200 реализованных объектов в Удмуртии.</li>
    <li>Разнообразие проектов: дома из различных материалов (газоблок, кирпич, брус) и разных ценовых категорий.</li>
    <li>Качество и гарантии: использование проверенных технологий и материалов, предоставление гарантии на выполненные работы.</li>
    <li>Индивидуальный подход: возможность заказать проект дома с учётом ваших пожеланий и бюджета.</li>
    <li>Профессиональное сопровождение: помощь в выборе участка, оформлении документов, подключении коммуникаций и сдаче объекта.</li>
</ul>
	</div>
</content>