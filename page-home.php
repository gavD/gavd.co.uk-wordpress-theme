<?php
/**
 * Template Name: Home
 *
 * @package WordPress
 * @subpackage gavD
  */
?>
<?php get_header(); ?>
<div id="content" class="row">
    <div class="span9">
        <?php the_post(); ?>
        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <h1 class="entry-title"><?php the_title(); ?></h1>
            <div class="entry-content">
                <?php the_content(); ?>
                <?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'gavd' ) . '&after=</div>') ?>
                <?php edit_post_link( __( 'Edit', 'gavd' ), '<span class="edit-link">', '</span>' ) ?>
            </div>
        </div>


    </div>

    <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>