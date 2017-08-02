<?php get_header(); ?>

<script type="text/javascript">
	/*! gumshoe v3.5.0 | (c) 2017 Chris Ferdinandi | MIT License | http://github.com/cferdinandi/gumshoe */
!(function(e,t){"function"==typeof define&&define.amd?define([],t(e)):"object"==typeof exports?module.exports=t(e):e.gumshoe=t(e)})("undefined"!=typeof global?global:this.window||this.global,(function(e){"use strict";var t,n,o,r,a,c,i,l={},s="querySelector"in document&&"addEventListener"in e&&"classList"in document.createElement("_"),u=[],f={selector:"[data-gumshoe] a",selectorHeader:"[data-gumshoe-header]",container:e,offset:0,activeClass:"active",scrollDelay:!1,callback:function(){}},d=function(e,t,n){if("[object Object]"===Object.prototype.toString.call(e))for(var o in e)Object.prototype.hasOwnProperty.call(e,o)&&t.call(n,e[o],o,e);else for(var r=0,a=e.length;r<a;r++)t.call(n,e[r],r,e)},v=function(){var e={},t=!1,n=0,o=arguments.length;"[object Boolean]"===Object.prototype.toString.call(arguments[0])&&(t=arguments[0],n++);for(var r=function(n){for(var o in n)Object.prototype.hasOwnProperty.call(n,o)&&(t&&"[object Object]"===Object.prototype.toString.call(n[o])?e[o]=v(!0,e[o],n[o]):e[o]=n[o])};n<o;n++){var a=arguments[n];r(a)}return e},m=function(e){return Math.max(e.scrollHeight,e.offsetHeight,e.clientHeight)},g=function(){return Math.max(document.body.scrollHeight,document.documentElement.scrollHeight,document.body.offsetHeight,document.documentElement.offsetHeight,document.body.clientHeight,document.documentElement.clientHeight)},h=function(e){var n=0;if(e.offsetParent){do n+=e.offsetTop,e=e.offsetParent;while(e)}else n=e.offsetTop;return n=n-a-t.offset,n>=0?n:0},p=function(t){var n=t.getBoundingClientRect();return n.top>=0&&n.left>=0&&n.bottom<=(e.innerHeight||document.documentElement.clientHeight)&&n.right<=(e.innerWidth||document.documentElement.clientWidth)},y=function(){u.sort((function(e,t){return e.distance>t.distance?-1:e.distance<t.distance?1:0}))};l.setDistances=function(){o=g(),a=r?m(r)+h(r):0,d(u,(function(e){e.distance=h(e.target)})),y()};var b=function(){var e=document.querySelectorAll(t.selector);d(e,(function(e){if(e.hash){var t=document.querySelector(e.hash);t&&u.push({nav:e,target:t,parent:"li"===e.parentNode.tagName.toLowerCase()?e.parentNode:null,distance:0})}}))},H=function(){c&&(c.nav.classList.remove(t.activeClass),c.parent&&c.parent.classList.remove(t.activeClass))},C=function(e){H(),e.nav.classList.add(t.activeClass),e.parent&&e.parent.classList.add(t.activeClass),t.callback(e),c={nav:e.nav,parent:e.parent}};l.getCurrentNav=function(){var n=e.pageYOffset;if(e.innerHeight+n>=o&&p(u[0].target))return C(u[0]),u[0];for(var r=0,a=u.length;r<a;r++){var c=u[r];if(c.distance<=n)return C(c),c}H(),t.callback()};var L=function(){d(u,(function(e){e.nav.classList.contains(t.activeClass)&&(c={nav:e.nav,parent:e.parent})}))};l.destroy=function(){t&&(t.container.removeEventListener("resize",j,!1),t.container.removeEventListener("scroll",j,!1),u=[],t=null,n=null,o=null,r=null,a=null,c=null,i=null)};var E=function(e){window.clearTimeout(n),n=setTimeout((function(){l.setDistances(),l.getCurrentNav()}),66)},j=function(e){n||(n=setTimeout((function(){n=null,"scroll"===e.type&&l.getCurrentNav(),"resize"===e.type&&(l.setDistances(),l.getCurrentNav())}),66))};return l.init=function(e){s&&(l.destroy(),t=v(f,e||{}),r=document.querySelector(t.selectorHeader),b(),0!==u.length&&(L(),l.setDistances(),l.getCurrentNav(),t.container.addEventListener("resize",j,!1),t.scrollDelay?t.container.addEventListener("scroll",E,!1):t.container.addEventListener("scroll",j,!1)))},l}));
</script>

<article class="content">
	<?php while ( have_posts() ) : the_post(); ?>
		<div class="text">
			<div class="lead">
				<?php the_content(); ?>
			</div>
		</div>

		<?php if( have_rows('way-we-work') ) : ?>
			<?php $index = 0; ?>

			<div class="way-we-work">
				<nav>
					<ul>
						<?php while ( have_rows('way-we-work') ) : the_row(); $index++; ?>
							<li><a href="#werkwijze-<?php echo $index; ?>" class="js-scroll"><?php the_sub_field('title'); ?></a></li>
						<?php endwhile; ?>
					</ul>
				</nav>
				<?php $index = 0; ?>

				<div class="way-we-work__list">
						<?php while ( have_rows('way-we-work') ) : the_row(); $index++; ?>
						<div class="way-we-work__item">
							<div class="way-we-work__wrapper">
								<?php setup_postdata( $post ); ?>
								<div class="way-we-work__body" id="werkwijze-<?php echo $index; ?>">
									<div class="way-we-work__image-wrapper">
										<?php $image_ID = get_sub_field('image'); ?>
										<?php if( !empty($image_ID) ): ?>
											<?php echo wp_get_attachment_image($image_ID, 'medium', false, array('class' => 'way-we-work__image')); ?>
										<?php endif; ?>
									</div>
									<div class="way-we-work__text">
										<h2><?php the_sub_field('title'); ?></h2>
										<?php the_sub_field('text'); ?>
									</div>
								</div>
							</div>
						</div>
					<?php endwhile; ?>
				</div>
			</div>
		<?php endif; ?>
	<?php endwhile; ?>
</article>

<script>
	gumshoe.init({
		selector: '.js-scroll',
		activeClass: 'is-active',
		offset: 100
	});
</script>

<?php get_footer(); ?>