<div id="sidebar" class="span3">
    <img src="/wp-content/themes/gavd/img/gavd-waterfall.jpg" width="270" height="158" alt="gavD"/>
    <?php if ( is_active_sidebar('primary-widget-area') ) : ?>
    <div id="primary" class="widget-area">
        <ul class="sid">
        <?php dynamic_sidebar('primary-widget-area'); ?>
        </ul>
    </div>
    <?php endif; ?>
</div>