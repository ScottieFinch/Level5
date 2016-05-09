<?php
/**
 * @package level5
 */

get_header(); ?>

<?php
 //Vars

	//Feature Highlights Section

		$feature_highlights_title = get_field('feature_highlights_title');
		$feature_highlights_subtitle = get_field('feature_highlights_subtitle');

    $feature_list_title = get_field('feature_list_title');
		$feature_list_subtitle = get_field('feature_list_subtitle');
	  $feature_list_image = get_field('feature_list_image');

    $integrations_title = get_field('feature_list_title');
		$integrations_subtitle = get_field('feature_list_subtitle');
?>


<section id="feature-highlights">
  <div class="container">

    <header>
    	<h3><?= $feature_highlights_title ?></h3>
    	<?= $feature_highlights_subtitle ? '<p class="description">'.$feature_highlights_subtitle.'</p>' : '' ?>
    </header>

    <?php include_once('inc-feature-highlights.php'); ?>

  </div>
</section>


<section id="feature-list">
  <div class="container">

    <header>
    	<h3><?= $feature_list_title ?></h3>
    	<?= $feature_list_subtitle ? '<p class="description">'.$feature_list_subtitle.'</p>' : '' ?>
    </header>

  	<?php
  		include('inc-feature-list.php');
  	?>

  </div>
</section>

<section id="integrations">
  <div class="container">

    <header class="section-header">
    	<h3 class="home-section-heading"><?= $integrations_title ?></h3>
    	<?= $integrations_subtitle ? '<p class="description">'.$integrations_subtitle.'</p>' : '' ?>
    </header>

    <?php if( have_rows('integrations_repeater') ): ?>

    <ul class="stats">

			<?php while( have_rows('integrations_repeater') ): the_row();
				$image = get_sub_field('image');
      ?>

      <li>
    		<img src="<?= $image['sizes']['grid-employee'] ?>">
      </li>

      <?php endwhile; ?>

    </ul>

    <?php endif; ?>

  </div>
</section>

<?php include_once('inc-cta-section.php'); ?>


<?php get_footer(); ?>
