<?php get_header(); ?>
<section class="hero">
  <div class="hero-wrap">
    <h1 class="hero-copy"><?php eidboiler_hero_copy(); ?></h1>
    <a class="btn cta" href=<?php eidboiler_cta_url(); ?>><?php eidboiler_cta_copy(); ?></a>
  </div>
</section>
<div id="grid-container">
<section id="content" role="main">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<header class="header">
<h1 class="entry-title"><?php the_title(); ?></h1> <?php edit_post_link( __( 'Edit', 'textdomain' ), '<p>', '</p>', null, 'btn btn-primary btn-edit-post-link' ); ?>
</header>
<section class="entry-content">
<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
<?php the_content(); ?>
<div class="entry-links"><?php wp_link_pages(); ?></div>
</section>
</article>
<?php if ( ! post_password_required() ) comments_template( '', true ); ?>
<?php endwhile; endif; ?>
</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
