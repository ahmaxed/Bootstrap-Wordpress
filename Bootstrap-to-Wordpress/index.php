<?php get_header(); ?>

  <div class="container reading-field">   
    <div class="row">
      <div class="page-header">
        <h1><?php the_title(); ?></h1>
      </div>
      <div class="col-md-7 col-md-offset-1">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <div class="page-header">
            <h1><?php the_title(); ?></h1>
          </div>
          <?php the_content(); ?>
        <?php endwhile;?>
        <ul class="pager">
          <li><?php previous_posts_link('<i class="icon-chevron-left"></i>&nbsp;Previous ') ?></li>                  
          <li><?php next_posts_link('Next &nbsp;<i class="icon-chevron-right"></i>') ?></li>
        </ul>
        <?php else: ?>         
        <div class="page-header">
          <h1>Oh no!</h1>
        </div>
        <p>No content is appearing for this page!</p>
        <?php endif; ?>
      </div>      
      <?php get_sidebar(); ?>
    </div>
<?php get_footer(); ?>