<?php
/**
 * Custom callback for outputting comments
 *
 * @return void
 */
function robkeplin_comment( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    ?>
    <?php if ( $comment->comment_approved == '1' ): ?>
        <li class="media">
            <div class="media-left">
                <?php echo get_avatar( $comment ); ?>
            </div>
            <div class="media-body">
                <h4 class="media-heading"><?php comment_author_link() ?></h4>
                <div class="time"><?php comment_date() ?> at <?php comment_time() ?></div>
                <?php comment_text() ?>
            </div>
        </li>
    <?php endif;
}
