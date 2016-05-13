<?php
/**
 * @package level5
 */

get_header(); ?>

<script src="wp-content/themes/Level5/js/parallax.min.js"></script>
<?php
 //Vars

	//Feature Highlights Section

		$employee_image = get_field('employee_image');
		$employee_name = get_field('employee_name');
		$employee_title = get_field('employee_title');
		$employee_quote = get_field('employee_quote');

		$philosophy_title = get_field('philosophy_title');
		$philosophy_description = get_field('philosophy_description');

?>

<div class="parallax-window" data-parallax="scroll" data-position="top" data-bleed="10" data-image-src="wp-content/themes/Level5/img/Mazuma-interior.jpg" data-natural-width="1400" data-natural-height="900" style="height: 350px;"></div>

<section id="philosophy">
	<div class="notched-background">
  	<div class="container">
			<div class="philosophy-left">
				<span><?= $employee_name ?></span></br>
				<span><?= $employee_title ?></span>
				<p><?= $employee_quote ?></p>
			</div>
			<div class="philosophy-right">
				<h3><?= $philosophy_title ?></h3>
				<p><?= $philosophy_description ?></p>

			</div>
		</div>
  </div>
</section>

<div class="parallax-window" data-parallax="scroll" data-position="top" data-bleed="10" data-image-src="wp-content/themes/Level5/img/BearStateBank-243.jpg" data-natural-width="1400" data-natural-height="900" style="height: 350px;"></div>

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



<?php get_footer(); ?>
