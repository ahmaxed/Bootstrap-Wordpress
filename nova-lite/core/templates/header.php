<?php 

/**
 * Wp in Progress
 * 
 * @author WPinProgress
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

/*-----------------------------------------------------------------------------------*/
/* Header and fonts */
/*-----------------------------------------------------------------------------------*/ 

function novalite_header_content() {
	
if ( ( is_page()) && (novalite_postmeta('wip_slogan')) ) : ?>

<section id="subheader">
	<div class="container">
    	<div class="row">
        	<div class="span12">
            	<p> <?php echo novalite_postmeta('wip_slogan'); ?> </p>
            </div>
        </div>
    </div>
</section>

<?php endif; ?>

<?php if ( ( novalite_postmeta('wip_header_sidebar') <> "none" ) && ( is_active_sidebar('header_sidebar_area') ) ) : ?>
	
    <section class="container head_widget content">
		<div class="container">
            
			<?php if ( is_active_sidebar('header_sidebar_area') ) : ?>
                
				<!-- FOOTER WIDGET BEGINS -->
                    
                        <section class="row widget">
                            <?php dynamic_sidebar('header_sidebar_area') ?>
                        </section>
        
				<!-- FOOTER WIDGET END -->
                    
			<?php endif; ?>
        
		</div>
        
	</section>
    
<?php 
	
	endif; 
	
}

?>