<?php get_header(); ?>

  <div class="container reading-field">   

    <div class="title-full">
      
      <div class="row">

        <div class="col-xs-4 col-md-offset-1">
          <h1>Books</h1>
        </div>

        <div class="col-xs-7 col-xs-offset-1 col-md-6 prev-next">
          <?php next_post_link( '%link', '<span class="glyphicon glyphicon-circle-arrow-left"></span>' ); ?>
          <a href="<?php bloginfo('url'); ?>/?p=96>"><span class="glyphicon glyphicon-th"></span></a>
          <?php previous_post_link( '%link', '<span class="glyphicon glyphicon-circle-arrow-right"></span>' ); ?>
        </div>

      </div>      

    </div>

    <div class="row">
      
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <div class="col-sm-4 portfolio-image">
          <?php
            $thumbnail_id = get_post_thumbnail_id(); 
            $thumbnail_url = wp_get_attachment_image_src( $thumbnail_id, 'thumbnail-size', true );
          ?>

          <p><a href="<?php the_permalink(); ?>"><img src="<?php echo $thumbnail_url[0]; ?>" alt="<?php the_title();?> graphic"></a></p>
         
        </div>

        <div class="col-sm-6">

          <h1><?php the_title(); ?></h1>
          <?php the_content(); ?>
          

        </div>
            

      <?php endwhile; else: ?>
        
        <div class="page-header">
          <h1>Oh no!</h1>
        </div>

        <p>No content is appearing for this page!</p>

      <?php endif; ?>

      

    </div>

<?php get_footer(); ?>