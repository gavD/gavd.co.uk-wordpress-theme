<?php get_header(); ?>
<div id="content" class="row">
    <div class="span9">
        <div id="post-0" class="post error404 not-found">
            <h1 class="entry-title">Not Found</h1>
            <div class="entry-content">
                <p>Nothing found. Try a search:</p>
                <?php get_search_form(); ?>
            </div>
        </div>
    </div>
    <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>