<section id="cta-section">
  <?php
    $cta_show = get_field('cta_show');
    $cta_hero = get_field('cta_hero');
    $cta_title = get_field('cta_title');
    $cta_subtitle = get_field('cta_subtitle');
    $cta_button_text = get_field('cta_button_text');
    $cta_button_link = get_field('cta_button_link');

    if ($cta_show)
  ?>
  <div <?= $cta_hero ? 'style="background-image: url('.$cta_hero['url'].');"' : 'class="no-hero-img"' ?>>
    <h3><?= $cta_title ?></h3>
    <?= $cta_subtitle ? '<p class="description">'.$cta_subtitle.'</p>' : '' ?>

    <a class="button round" href="<?= $cta_button_link ?>"><?= $cta_button_text ?></a>
  </div>

</section>
