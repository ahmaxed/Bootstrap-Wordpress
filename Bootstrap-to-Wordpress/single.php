<?php get_header(); ?>

  <div class="container">   
    <div class="row reading-field">
      
      <div class="col-md-7 col-md-offset-1">

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

          <div class="page-header">            

            
            <h1><?php the_title(); ?></h1>
            <p><em>
             
              On <?php echo the_time('l, F jS, Y');?>
              in <?php the_category( ', ' ); ?>.
              
            </em></p>
          </div>

          <?php the_content(); ?>

          <hr>          
        <?php endwhile; else: ?>
          
          <div class="page-header">
            <h1>Oh no!</h1>
          </div>

          <p>No content is appearing for this page!</p>

        <?php endif; ?>


      </div>
      
      <?php get_sidebar( 'blog' ); ?>

    </div>

<?php get_footer(); ?>