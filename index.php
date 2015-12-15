<!doctype html>
<html <?php language_attributes(); ?>>
<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<div class="materialism-layout mdl-layout mdl-js-layout mdl-layout--fixed-header">

	<header
		class="
		materialism-header mdl-layout__header
		mdl-layout__header--waterfall
		mdl-color-text--black
		mdl-color--white
		">
		<div class="mdl-layout__header-row">

			<div class="mdl-layout-spacer materialism-header__spacer"></div>

			<div class="
			mdl-textfield
			mdl-textfield--expandable
			mdl-textfield--floating-label
			mdl-textfield--align-right
			mdl-js-textfield
			materialism-header__search-box
			materialism-search-form
			">
				<label class="mdl-button mdl-js-button mdl-button--icon"
				       for="waterfall-exp">
					<i class="material-icons">search</i>
				</label>

				<div class="mdl-textfield__expandable-holder materialism-search-form__holder">
					<input class="mdl-textfield__input" type="text" name="sample"
					       id="waterfall-exp">
				</div>
			</div>

			<span class="mdl-layout-title materialism-header__title"><?php bloginfo( 'name' ); ?></span>

		</div>
	</header>
	<div class="
		materialism-layout__drawer
		mdl-layout__drawer
		">
		<span class="mdl-layout-title"><?php bloginfo( 'name' ); ?></span>
		<?php
		wp_nav_menu( array(
			'menu_class' => 'mdl-navigation materialism-navigation mdl-color--white',
			'link_class' => 'mdl-navigation__link',
		) ); ?>

	</div>

	<main class="mdl-layout__content">
		<div class="materialism-container mdl-grid">

			<?php if ( have_posts() ):while ( have_posts() ):the_post(); ?>
				<div <?php post_class( "mdl-card mdl-shadow--2dp on-the-road-again mdl-cell mdl-cell--12-col materialism-card" ); ?>>

					<div id="post-<?php the_ID(); ?>" class="materialism-card__media mdl-card__media"
					     style="background-image:url( <?php echo wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' )[0]; ?>);">
						<h4><a href="<?php the_permalink(); ?>" class="mdl-color-text--white"><?php the_title();
								?></a></h4>
					</div>

					<div class="mdl-color-text--grey-600 mdl-card__supporting-text">
						<?php the_excerpt(); ?>
					</div>
					<div class="mdl-card__supporting-text meta mdl-color-text--grey-600">
						<div class="minilogo"></div>
						<div>
							<strong>The Newist</strong>
							<span>2 days ago</span>
						</div>
					</div>
				</div>
			<?php endwhile;endif; ?>


			<nav class="demo-nav mdl-cell mdl-cell--12-col">
				<div class="section-spacer"></div>
				<a href="entry.html" class="demo-nav__button" title="show more">
					More
					<button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
						<i class="material-icons" role="presentation">arrow_forward</i>
					</button>
				</a>
			</nav>

		</div>
		<footer class="mdl-mini-footer">
			<div class="mdl-mini-footer--left-section">
				<button class="mdl-mini-footer--social-btn social-btn social-btn__twitter">
					<span class="visuallyhidden">Twitter</span>
				</button>
				<button class="mdl-mini-footer--social-btn social-btn social-btn__blogger">
					<span class="visuallyhidden">Facebook</span>
				</button>
				<button class="mdl-mini-footer--social-btn social-btn social-btn__gplus">
					<span class="visuallyhidden">Google Plus</span>
				</button>
			</div>
			<div class="mdl-mini-footer--right-section">
				<button class="mdl-mini-footer--social-btn social-btn__share">
					<i class="material-icons" role="presentation">share</i>
					<span class="visuallyhidden">share</span>
				</button>
			</div>
		</footer>
	</main>
	<div class="mdl-layout__obfuscator"></div>
</div>
<?php wp_footer(); ?>
</body>
</html>