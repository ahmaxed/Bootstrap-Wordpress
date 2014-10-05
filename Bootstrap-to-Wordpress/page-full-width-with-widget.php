<?php
/*
  Template Name: Full Width with center widget Template
*/
  ?>

<?php get_header(); ?>

  <div class="container reading-field">   
    <div class="row">
      
      <div class="col-md-7 col-md-offset-1">

        <div class="page-header">
          <h1><?php wp_title(''); ?></h1>
        </div>
     
            <?php
              $postslist = get_posts('numberposts=10&offset=0&category=8');
              foreach ($postslist as $post) :
                setup_postdata($post);
              ?>
            <div class="post">
              <h2>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              </h2>
              <p> <?php the_excerpt(); ?> <p>
            </div>
            <?php endforeach ?>

            <div class="center col-md-12"><a class="readmore" href="<?php the_permalink(); ?>"><button type="button" class="btn btn-default"> More Events </button></a></div>


      </div>
      
      <?php get_sidebar( 'blog' ); ?>

    </div>

<?php get_footer(); ?>