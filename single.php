<?php get_header(); ?>
<div id="content" class="row">
    <div class="span9">

<?php the_post(); ?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php
if ( has_post_thumbnail() ) {
the_post_thumbnail();
}
?>
<h2 class="entry-title"><?php the_title(); ?></h2>
<div class="entry-meta">
<span class="meta-prep meta-prep-author"><?php _e('By ', 'gavd'); ?></span>
<span class="author vcard"><a class="url fn n" href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" title="<?php printf( __( 'View all articles by %s', 'gavd' ), $authordata->display_name ); ?>"><?php the_author(); ?></a></span>
<span class="meta-sep"> | </span>
<span class="meta-prep meta-prep-entry-date"><?php _e('Published ', 'gavd'); ?></span>
<span class="entry-date"><abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO') ?>"><?php the_time( get_option( 'date_format' ) ); ?></abbr></span>
<?php edit_post_link( __( 'Edit', 'gavd' ), "<span class=\"meta-sep\"> | </span>\n\t\t\t\t\t\t<span class=\"edit-link\">", "</span>\n\t\t\t\t\t" ) ?>
</div>
<div class="entry-content">

<?php the_content(); ?>
<?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'gavd' ) . '&after=</div>') ?>
</div>
<div class="entry-utility">
<?php printf( __( 'This article was posted in %1$s%2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>. Follow comments with the <a href="%5$s" title="Comments RSS to %4$s" rel="alternate" type="application/rss+xml">RSS feed for this post</a>.', 'gavd' ),
get_the_category_list(', '),
get_the_tag_list( __( ' and tagged ', 'gavd' ), ', ', '' ),
get_permalink(),
the_title_attribute('echo=0'),
get_post_comments_feed_link() ) ?>

<?php edit_post_link( __( 'Edit', 'gavd' ), "\n\t\t\t\t\t<span class=\"edit-link\">", "</span>" ) ?>
</div>
</div>
<div id="nav-below" class="navigation">
<p class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">&laquo;</span> %title' ) ?></p>
<p class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">&raquo;</span>' ) ?></p>
</div>

</div>
<?php get_sidebar(); ?>
    </div>
<?php get_footer(); ?>