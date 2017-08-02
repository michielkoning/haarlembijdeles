<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
  <article class="content">
    <?php get_template_part('partials/intro'); ?>

  </article>


<?php endwhile; ?>

<div class="prices2">
    <div class="prices2__wrapper">
      <div class="prices2__text">
        <h2 class="prices2__title">Dit zijn onze diensten:</h2>
        <ul class="prices2__list">

          <li class="prices2__list-item">
            <div class="prices2__header">
              <div class="prices2__label">Huiswerkbegeleiding</div>
            </div>
            <ul>
                <li class="prices2__usp">3 middagen per week huiswerkbegeleiding</li>
                <li class="prices2__usp">Persoonlijke begeleiding en studiecoach</li>
                <li class="prices2__usp">1 Examenzondag per maand</li>
                <li class="prices2__usp">3 SE-trainingen voor iedere SE-week</li>
                <li class="prices2__usp">3 Examentrainingen in april</li>
            </ul>
            <a href="#" class="prices2__btn">Meer informatie</a>
          </li>

          <li class="prices2__list-item">
            <div class="prices2__header">
              <div class="prices2__label">Bijles</div>
            </div>
            <ul>
                <li class="prices2__usp">3 middagen per week huiswerkbegeleiding</li>
                <li class="prices2__usp">Persoonlijke begeleiding en studiecoach</li>
                <li class="prices2__usp">1 Examenzondag per maand</li>
                <li class="prices2__usp">3 SE-trainingen voor iedere SE-week</li>
                <li class="prices2__usp">3 Examentrainingen in april</li>
            </ul>
            <a href="#" class="prices2__btn">Meer informatie</a>

          </li>

          <li class="prices2__list-item">
            <div class="prices2__header">
              <div class="prices2__label">Examenbegeleiding</div>
            </div>
            <ul>
                <li class="prices2__usp">3 middagen per week huiswerkbegeleiding</li>
                <li class="prices2__usp">Persoonlijke begeleiding en studiecoach</li>
                <li class="prices2__usp">1 Examenzondag per maand</li>
                <li class="prices2__usp">3 SE-trainingen voor iedere SE-week</li>
                <li class="prices2__usp">3 Examentrainingen in april</li>
            </ul>
            <a href="#" class="prices2__btn">Meer informatie</a>
          </li>



        </ul>
      </div>
    </div>
  </div>

<?php get_template_part('partials/testimonials'); ?>

<?php get_footer(); ?>
