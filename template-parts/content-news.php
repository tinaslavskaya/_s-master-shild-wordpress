<div class="card mb-3" style="max-width: 1000px; margin: 0 auto;">
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
          	    <p class="card-text"><?php s_master_word_count(); /*the_excerpt();*/?></p>
          	    <p class="text-end">
          	 	<a href="<?php the_permalink(); ?>"class="btn btn-primary px-5 rounded-pill text-white">Link</a>
          	    </p>
	          </div>
	    </div>
	 </div>
        </div>
</div>  