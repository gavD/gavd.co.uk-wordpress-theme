<?php
load_theme_textdomain('gavd', TEMPLATEPATH . '/languages');
$locale = get_locale();
$locale_file = TEMPLATEPATH . "/languages/$locale.php";
if (is_readable($locale_file))
    require_once($locale_file);

function gavd_get_page_number() {
    if (get_query_var('paged')) {
        print ' | ' . __('Page ', 'gavd') . get_query_var('paged');
    }
}

add_action('after_setup_theme', 'gavd_theme_setup');

function gavd_theme_setup() {
    add_theme_support('automatic-feed-links');
}

if (function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails');
}
if (!isset($content_width))
    $content_width = 640;
add_filter('the_title', 'gavd_title');

function gavd_title($title) {
    if ($title == '') {
        return 'Untitled';
    } else {
        return $title;
    }
}

function gavd_register_menus() {
    register_nav_menus(
            array('main-menu' => __('Main Menu', 'gavd'))
    );
}

add_action('init', 'gavd_register_menus');

function gavd_theme_widgets_init() {
    register_sidebar(array(
        'name' => 'Primary Widget Area',
        'id' => 'primary-widget-area',
        'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
        'after_widget' => "</li>",
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => 'Header Widget Area',
        'id' => 'header-widget-area',
        'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
        'after_widget' => "</li>",
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
}

add_action('init', 'gavd_theme_widgets_init');
$preset_widgets = array(
    'primary-aside' => array('search', 'pages', 'categories', 'archives'),
);
if (isset($_GET['activated'])) {
    update_option('sidebars_widgets', $preset_widgets);
}

function gavd_cats($glue) {
    $current_cat = single_cat_title('', false);
    $separator = "\n";
    $cats = explode($separator, get_the_category_list($separator));
    foreach ($cats as $i => $str) {
        if (strstr($str, ">$current_cat<")) {
            unset($cats[$i]);
            break;
        }
    }
    if (empty($cats))
        return false;
    return trim(join($glue, $cats));
}

function gavd_tags($glue) {
    $current_tag = single_tag_title('', '', false);
    $separator = "\n";
    $tags = explode($separator, get_the_tag_list("", "$separator", ""));
    foreach ($tags as $i => $str) {
        if (strstr($str, ">$current_tag<")) {
            unset($tags[$i]);
            break;
        }
    }
    if (empty($tags))
        return false;
    return trim(join($glue, $tags));
}

function gavd_commenter_link() {
    $commenter = get_comment_author_link();
    if (ereg('<a[^>]* class=[^>]+>', $commenter)) {
        $commenter = preg_replace('/(<a[^>]* class=[\'"]?)/', '\\1url ', $commenter);
    } else {
        $commenter = preg_replace('/(<a )/', '\\1class="url "', $commenter);
    }
    $avatar_email = get_comment_author_email();
    $avatar = str_replace("class='avatar", "class='photo avatar", get_avatar($avatar_email, 80));
    echo $avatar . ' <span class="fn n">' . $commenter . '</span>';
}

function gavd_custom_comments($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    $GLOBALS['comment_depth'] = $depth;
?>
<li id="comment-<?php comment_ID() ?>" <?php comment_class() ?>>
    <div class="comment-author vcard"><?php gavd_commenter_link() ?></div>
    <div class="comment-meta"><?php
    printf(__('Posted %1$s at %2$s <span class="meta-sep"> | </span> <a href="%3$s" title="Permalink to this comment">Permalink</a>', 'gavd'),
            get_comment_date(),
            get_comment_time(),
            '#comment-' . get_comment_ID());
    edit_comment_link(__('Edit', 'gavd'), ' <span class="meta-sep"> | </span> <span class="edit-link">', '</span>'); ?></div>
    <?php if ($comment->comment_approved == '0')
        _e("\t\t\t\t\t<span class='unapproved'>Your comment is awaiting moderation.</span>\n", 'gavd') ?>
        <div class="comment-content">
    <?php comment_text() ?>
        </div>
<?php
        if ($args['type'] == 'all' || get_comment_type() == 'comment') :
            comment_reply_link(array_merge($args, array(
                        'reply_text' => __('Reply', 'gavd'),
                        'login_text' => __('Log in to reply.', 'gavd'),
                        'depth' => $depth,
                        'before' => '<div class="comment-reply-link">',
                        'after' => '</div>'
                    )));
        endif;
?>
<?php
    }

    function gavd_custom_pings($comment, $args, $depth) {
        $GLOBALS['comment'] = $comment;
?>
    <li id="comment-<?php comment_ID() ?>" <?php comment_class() ?>>
        <div class="comment-author"><?php
        printf(__('By %1$s on %2$s at %3$s', 'gavd'),
                get_comment_author_link(),
                get_comment_date(),
                get_comment_time());
        edit_comment_link(__('Edit', 'gavd'), ' <span class="meta-sep"> | </span> <span class="edit-link">', '</span>');
?></div>
<?php if ($comment->comment_approved == '0')
            _e('\t\t\t\t\t<span class="unapproved">Your trackback is awaiting moderation.</span>\n', 'gavd') ?>
            <div class="comment-content">
<?php comment_text() ?>
            </div>
<?php
        }

function explain_less_login_issues(){ return '<strong>ERROR</strong>: Entered credentials are incorrect.';}
add_filter( 'login_errors', 'explain_less_login_issues' );
