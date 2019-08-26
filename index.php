<?php get_header(); ?>

<?php if ( have_posts() ) : ?>
    <?php $i = 0; ;?>
    <?php while ( have_posts() ) : the_post(); ?>
        <?php $i++; ?>
        <?php $categories = get_the_category(); ?>
        <div class="pb25 pt-2 <?php echo ($i % 2 == 1) ? 'bg-light' : 'bg-gray'; ?>">
            <div class="container">
                <h1 class="display-4 mb25"><span class="hash">#</span> <a class="text-dark" title="<?php the_title(); ?>" href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
                <?php foreach ($categories as $category) : ?>
                    <a class="category" title="<?php echo $category->name; ?>" href="<?php echo get_category_link($category) ?>"><?php echo $category->name; ?></a>
                <?php endforeach; ?>
                <div class="post-content">
                    <p><?php the_excerpt() ?></p>
                    <a title="Continue Reading" class="btn btn-primary" href="<?php the_permalink() ?>">Read More</a>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
    <?php
    the_posts_pagination(array(
        'prev_text'          => __( '&laquo;' ),
        'next_text'          => __( '&raquo;' ),
        'before_page_number' => '<span class="btn btn-primary">',
        'after_page_number' => '</span>'
    ));
    ?>
<?php else : ?>
    <div class="container text-center">
        <h1 class="display-4 mb25"><span class="hash">#</span> Not Found</h1>
        <p>Whoops! The page that you were looking for, could not be found.</p>
        <p>Perhaps it got moved to another location, or no longer exists.</p>
        <a title="Back to the blog" class="btn btn-primary" href="<?php echo get_permalink(get_page_by_path('blog')); ?>">Back to the blog</a>
    </div>
<?php endif; ?>

<?php get_footer(); ?>
