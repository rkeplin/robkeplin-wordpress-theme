<?php get_header(); ?>

<div class="container pt-2">
    <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>
            <?php $categories = get_the_category(); ?>
            <h1 class="display-4 mb25"><span class="hash">#</span> <?php the_title(); ?></h1>
            <?php foreach ($categories as $category) : ?>
                <a class="category" title="<?php echo $category->name; ?>" href="<?php echo get_category_link($category) ?>"><?php echo $category->name; ?></a>
            <?php endforeach; ?>

        <?php the_post_thumbnail('large-thumbnail', array('class' => '')); ?>
        <div class="post-content mt-4">
            <?php the_content() ?>
        </div>

        <?php
        if ( comments_open() || get_comments_number() ) {
            comments_template();
        }
        ?>
        <?php endwhile; ?>
    <?php else : ?>
        <div class="container text-center">
            <h1 class="display-4 mb25"><span class="hash">#</span> Not Found</h1>
            <p>Whoops! The page that you were looking for, could not be found.</p>
            <p>Perhaps it got moved to another location, or no longer exists.</p>
            <a title="Back to the blog" class="btn btn-primary" href="<?php echo get_permalink(get_page_by_path('blog')); ?>">Back to the blog</a>
        </div>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
