<?php
/*
  Template Name: Full Width Template
*/

?>
<?php get_header(); ?>

  <div class="container reading-field ">   
    <div class="row ">
      
      <div class="col-md-10 col-md-offset-1 title-full">

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

          <div >
            <h1><?php the_title(); ?></h1>
          </div>
          <div >
          <?php the_content(); ?>
          </div>
        <?php endwhile; else: ?>
          
          <div>
            <h1>Oh no!</h1>
          </div>

          <p>No content is appearing for this page!</p>

        <?php endif; ?>


      </div>      

    </div>

<?php get_footer(); ?>



