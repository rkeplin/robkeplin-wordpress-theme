<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to starkers_comment() which is
 * located in the functions.php file.
 *
 * @package     WordPress
 * @subpackage  Bootstrap 3.3.7
 * @autor       Babobski
 */
?>
<div id="comments" class="bg-gray p-5">
    <?php if ( post_password_required() ) : ?>
    <p>This post is password protected. Enter the password to view any comments</p>
</div>

<?php
/* Stop the rest of comments.php from being processed,
 * but don't kill the script entirely -- we still have
 * to fully load the template.
 */
return;
endif;
?>

<?php if ( have_comments() ) : ?>
    <h3 class="mt0"><?php comments_number(); ?></h3>

    <ul class="media-list">
        <?php wp_list_comments( array( 'callback' => 'robkeplin_comment' ) ); ?>
    </ul>
<?php elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
    <h3 class="mt0">Comments are closed</h3>
<?php endif; ?>

<?php

ob_start();
$commenter = wp_get_current_commenter();
$req = true;
$aria_req = ( $req ? " aria-required='true'" : '' );

$comments_arg = array(
    'form'    => array(
        'class' => 'form-horizontal'
    ),
    'fields' => apply_filters(
        'comment_form_default_fields', array(
            'author' => '<div class="form-group">'
                    . '<label for="author">Name</label> ' . ( $req ? '<span class="text-danger">*</span>' : '' )
                    . '<input id="author" name="author" class="form-control" type="text" value="" size="30" ' . $aria_req . ' />'
                    . '<p id="d1" class="text-danger"></p>'
                    . '</div>',
            'email' => '<div class="form-group">'
                    . '<label for="email">Email</label> '
                    . ( $req ? '<span class="text-danger">*</span>' : '' )
                    . '<input id="email" name="email" class="form-control" type="text" value="" size="30" ' . $aria_req . ' />'
                    . '<p id="d2" class="text-danger"></p>'
                    . '</div>',
            'url' => '')
        ),
        'comment_field' => '<div class="form-group">'
                        . '<label for="comment">' . __( 'Comment', 'wp_babobski' ) . '</label><span class="text-danger">*</span>'
                        . '<textarea id="comment" class="form-control" name="comment" rows="3" aria-required="true"></textarea><p id="d3" class="text-danger"></p>'
                        . '</div>',
    'comment_notes_after' => '',
    'class_submit' => 'btn btn-primary'
); ?>
<?php comment_form($comments_arg);
echo str_replace('class="comment-form"','class="comment-form" name="commentForm" onsubmit="return validateForm();"',ob_get_clean());
?>

<script>
    function validateForm() {
        var form =  document.forms["commentForm"],
            x    = form["author"].value,
            y    = form["email"].value,
            z    = form["comment"].value,
            d1   = document.getElementById("d1"),
            d2   = document.getElementById("d2"),
            d3   = document.getElementById("d3");

        if (x == null || x == "") {
            d1.innerHTML = "Name is required.";
            z = false;
        } else {
            d1.innerHTML = "";
        }

        if (y == null || y == "") {
            d2.innerHTML = "Email is required.";
            z = false;
        } else {
            d2.innerHTML = "";
        }

        if (z == null || z == "") {
            d3.innerHTML = "Comment is required.";
            z = false;
        } else {
            d3.innerHTML = "";
        }

        if (z == false) {
            return false;
        }

    }
</script>


</div>
