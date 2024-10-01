<?php get_header(); ?>
<?php $taxcat = get_terms( array(
    'taxonomy'   => 'newscat',
    'hide_empty' => false,
) );  ?>
<div class="container">
  <?php if(have_posts()) : ?>
    <?php while(have_posts()) : the_post();?>
      <div class="d-flex justify-content-center align-items-center card" style="max-width: 1000px; margin: 0 auto;">
        <div class="p-4">
          <div class="row g-0">
            <div class="col-md-4">
              <?php if(has_post_thumbnail()) : ?>
                 <?php the_post_thumbnail(array(490, 328), ['class' => 'img-fluid rounded-start']); ?>
              <?php endif; ?>
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <?php the_title( $before = '<h2 class="card-title">', $after = '</h2>', $display = true ); ?>
                <p class="card-text"><?php the_content(); ?></p>
                <?php if(!empty($taxcat)) : ?>
                  <p>Категории: 
                    <?php foreach ($taxcat as $cat):  ?>  
                      <a href="<?php echo get_category_link($cat->term_id); ?>" class="text-info"><?php echo $cat->name ?></a>             
                   <?php endforeach; ?>
                  </p>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </div>    
    <?php endwhile; ?> 
    <?php wp_reset_postdata(); ?>
  <?php endif; ?>
</div>

<?php get_footer(); ?>

