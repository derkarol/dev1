<?php
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
    die(__('Please do not load this page directly. Thanks!', 'fudge-lite'));

if (post_password_required()) {
    ?>
    <p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.', 'fudge-lite'); ?></p>
    <?php
    return;
}
?>

<?php
if (have_comments()) {
    the_comments_navigation(array(
	'prev_text'	 => __('&lt;&lt; Older comments', 'fudge-lite'),
	'next_text'	 => __('Newer comments &gt;&gt;', 'fudge-lite')
    ));
    ?>
    <ol class="commentlist">
	<?php wp_list_comments('callback=fudge_lite_comment'); ?>
    </ol>
    <?php
    the_comments_navigation(array(
	'prev_text'	 => __('&lt;&lt; Older comments', 'fudge-lite'),
	'next_text'	 => __('Newer comments &gt;&gt;', 'fudge-lite')
    ));
} else { // This is displayed if there are no comments so far
    if (!comments_open()) {
	?>
	<p class="nocomments"><?php _e('Comments are closed.', 'fudge-lite'); ?></p>
	<?php
    }
}
?>
<?php
global $trackbacks;
if ($trackbacks) {
    $comments = $trackbacks;
    ?>
    <div id="pingback-trackback">
        <h3 id="trackbacks"><?php echo sizeof($trackbacks); ?> <?php _e('Trackbacks/Pingbacks', 'fudge-lite'); ?></h3>
        <ol class="pings">
	    <?php foreach ($comments as $comment) : // Start trackback code    ?>
		<li <?php echo $oddcomment; ?>id="comment-<?php comment_ID() ?>">
		    <cite><?php comment_author_link() ?></cite>
		    <?php if ($comment->comment_approved == '0') : ?>
	    	    <em><?php _e('Your comment is awaiting moderation.', 'fudge-lite'); ?></em>
		    <?php endif; // End trackback code   ?>
		</li>
		<?php $oddcomment = ( empty($oddcomment) ) ? 'class="alt" ' : ''; ?>
	    <?php endforeach; ?>
        </ol>
    </div>
<?php } ?>
<?php if (comments_open()) : ?>
    <section id="respond">
	<?php
	comment_form(array(
	    'label_submit'	 => __('Leave Comment', 'fudge-lite'),
	    'class_submit'	 => 'btn secondary-bkg-color',
	    'comment_field'	 => '<div class="comment-field' . (is_user_logged_in() ? 'logged-in' : '') . '"><p><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" placeholder="' . esc_attr__('Comment', 'fudge-lite') . '"></textarea></p></div>',
	    'fields'	 => array(
		'author' => '<div class="comment-details"><p><input type="text" name="author" id="author" placeholder="' . esc_attr__('Name', 'fudge-lite') . '" value="" size="22" tabindex="1"></p>',
		'email'	 => '<p><input type="text" name="email" id="email" placeholder="' . esc_attr__('Email', 'fudge-lite') . '" value="" size="22" tabindex="2"></p>',
		'url'	 => '<p><input type="text" name="url" id="url" placeholder="' . esc_attr__('Website', 'fudge-lite') . '" value="" size="22" tabindex="3"></p></div>'
	    )
	));
	?>
    </section>
    <?php
















endif;