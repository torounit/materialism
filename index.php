<!doctype html>
<html <?php language_attributes(); ?>>
<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
	<style>

		body {
			background-color: #eee;
		}

		.mdl-card {
			display: flex;
			flex-direction: column;
			align-items: stretch;
			min-height: 360px;
		}

		.mdl-card__media {
			box-sizing: border-box;
			background-size: cover;
			padding: 24px;
			display: flex;
			flex-grow: 1;
			flex-direction: row;
			align-items: flex-end;
			cursor: pointer;
		}

		.mdl-card__title {
			padding: 16px;
			flex-grow: 1;
		}

		.mdl-layout__content {
			flex-shrink: 1;
		}
	</style>
</head>
<body <?php body_class(); ?>>

<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">

	<header
		class="materialism-header mdl-layout__header mdl-layout__header--waterfall <?php if ( ! has_header_image() ): ?>mdl-layout__header--transparent<?php endif; ?>">
		<div class="mdl-layout__header-row">
			<span class="mdl-layout-title"><?php bloginfo( 'name' ); ?></span>

			<div class="mdl-layout-spacer"></div>
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable
                  mdl-textfield--floating-label mdl-textfield--align-right">
				<label class="mdl-button mdl-js-button mdl-button--icon"
				       for="waterfall-exp">
					<i class="material-icons">search</i>
				</label>

				<div class="mdl-textfield__expandable-holder">
					<input class="mdl-textfield__input" type="text" name="sample"
					       id="waterfall-exp">
				</div>
			</div>
		</div>

		<!-- Bottom row, not visible on scroll -->
		<div class="mdl-layout__header-row">
			<div class="mdl-layout-spacer"></div>
			<!-- Navigation -->

			<?php wp_nav_menu( array( 'menu_class' => 'mdl-navigation', 'item_class' => 'mdl-navigation__link', 'depth' => 1 ) ); ?>

		</div>
	</header>
	<div class="mdl-layout__drawer">
		<span class="mdl-layout-title">Title</span>
		<?php wp_nav_menu( array( 'menu_class' => 'mdl-navigation', 'item_class' => 'mdl-navigation__link' ) ); ?>

		<nav class="mdl-navigation">
			<a class="mdl-navigation__link" href="">Link</a>
			<a class="mdl-navigation__link" href="">Link</a>
			<a class="mdl-navigation__link" href="">Link</a>
			<a class="mdl-navigation__link" href="">Link</a>
		</nav>
	</div>

	<main class="mdl-layout__content">
		<div class="demo-blog__posts mdl-grid">

			<?php if ( have_posts() ):while ( have_posts() ):the_post(); ?>
				<div <?php post_class( "mdl-card mdl-shadow--2dp on-the-road-again mdl-cell mdl-cell--12-col" ); ?>>

					<div id="post-<?php the_ID(); ?>" class="mdl-card__media mdl-color-text--grey-50"
					     style="background-image:url( <?php echo wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' )[0]; ?>);">
						<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
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