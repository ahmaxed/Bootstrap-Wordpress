<?php

/**
 * Wp in Progress
 * 
 * @author WPinProgress
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

	function novalite_panel( $panel ) { 
	
	novalite_saveoption ( $panel );
	
	if (!isset($_GET['tab']))  { $_GET['tab'] = "General"; }
	
	foreach ($panel as $element) {

		switch ( $element['type'] ) { 
		
			case 'navigation': ?>
				
				<div class="header">
                    <h2 class="maintitle settings"> <?php _e( 'General Settings','wip'); ?> </h2> 
                    <div class="right">
                        <h2 class="maintitle"> <?php echo novalite_theme_data('Name') . " " . novalite_theme_data('Version');  ?> </h2>
                    </div>
                    <div class="clear"></div>
                </div>
                
				<?php novalite_message($panel); ?>
                
                <div id="tabs">

                <ul>
    
   				<?php 
				
   				foreach ($element['item'] as $option => $name ) {
					if (str_replace(" ", "", $option) == $_GET['tab'] ) $class = "class='ui-state-active'"; else $class = ""; 
					echo "<li ".$class."><a href='themes.php?page=novaoption&tab=".str_replace(" ", "", $option)."'>".$name."</a></li>";
				}
				?>
               
                </ul>
               
                <?php	
			
			break;
			
			case 'endpanel':  ?>
				
				</div>
				<div style="margin:10px 0; font-size:11px">Icons by: <a href="http://www.woothemes.com/2009/09/woofunction/" target="_blank">WooFunction</a> </div>
			
			<?php break;
			
		}

	if (isset($element['tab'])) : 
	
	switch ( $element['tab'] ) { 

		case $_GET['tab']:  

			foreach ($element as $value) {
			
				if (isset($value['type'])) :
				
					switch ( $value['type'] ) { 
					
						case 'form':  ?>
							
							<div id="<?php echo str_replace(" ", "", $value['name']); ?>">
							<form method="post" action="?page=novaoption&tab=<?php echo $_GET['tab']; ?>">
						
						<?php break;
						
						case 'endtab':  ?>
							
							</form>
							</div>
						
						<?php break;
							
						case 'start':  ?>
	
						<?php 
			
							if ( ('Save' == novalite_request('action'))  && ( $value['val'] == novalite_request('element-opened')) ) { 
								$class=" inactive"; $style='style="display:block;"'; } else { $class="";  $style=''; 
							}  
				
							?>
	
							<div class="wip_container">
			
							<h5 class="element<?php echo $class; ?>" id="<?php echo $value['val']; ?>"><?php echo $value['name']; ?></h5>
				   
							<div class="wip_mainbox"> 
			
						<?php break;
				
						case 'startopen':  ?>
				
							<div class="wip_container">
			
							<h5 class="element-open"><?php echo $value['name']; ?></h5>
				   
							<div class="wip_mainbox2"> 
			
						<?php break;
				
						case 'end':  ?>
				
							</div>            
			
							</div>
			   
						<?php break;
			
							case 'text': ?>
			
								<div class="wip_inputbox">
			
								<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
								
								<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( novalite_setting($value['id']) != "") { echo stripslashes(novalite_setting($value['id'])); } else { echo $value['std']; } ?>" />
								
								<p> <?php echo $value['desc']; ?> </p>
			
								</div>
			
							<?php break;
				
							case 'form':  ?>
				
							<?php break;
				
							case 'navigation':  ?>
				
								<?php echo $value['start']; ?>
			
								<?php foreach ($value['item'] as $option) { echo "<li><a href='#".str_replace(" ", "", $option)."'>".$option."</a></li>"; } ?>
			
								<?php echo $value['end']; ?>
			   
							<?php break;
			 
							case 'textarea':  ?>
				
								<div class="wip_inputbox">
			
								<label for="bl_custom_style"> <?php echo $value['name']; ?> </label>
								
								<textarea name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( novalite_setting($value['id']) != "") { echo stripslashes(novalite_setting($value['id'])); } else { echo $value['std']; } ?></textarea>
			
								<p><?php echo $value['desc']; ?></p>
			
								</div> 
				
							<?php break;
			
							case "on-off": ?>
			
								<div class="wip_inputbox">
			
								<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
			
								<div class="bool-slider <?php if ( novalite_setting($value['id']) != "") { echo stripslashes(novalite_setting($value['id'])); } else { echo $value['std']; } ?>">
									<div class="inset">
										<div class="control"></div>
									</div>
									<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" class="on-off" type="hidden" value="<?php if ( novalite_setting($value['id']) != "") { echo stripslashes(novalite_setting($value['id'])); } else { echo $value['std']; } ?>" />
								</div>  
								
								<div class="clear"></div>      
								
								<p><?php echo $value['desc']; ?></p>
								
								</div>
			
							<?php break;
				 
							case 'categoria': ?>
				
								<div class="wip_inputbox">
			
								<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
			
								<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>"><?php foreach ($value['options'] as $option) { ?><option<?php if ( novalite_setting($value['id']) == get_cat_id($option)) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?> value="<?php echo get_cat_id($option); ?>" ><?php echo $option; ?></option><?php } ?></select>
			 
								<p><?php echo $value['desc']; ?></p>
			
								</div>
				
							<?php break;
				 
							case 'select': ?>
				
								<div class="wip_inputbox">
			
								<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
			
								<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">  
								
								<?php foreach ( $value['options'] as $val => $option ) { ?>  
								
								<option <?php if (( novalite_setting( $value['id'] ) == $val) || ( ( !novalite_setting($value['id'])) && ( $value['std'] == $val) )) { echo 'selected="selected"'; } ?> value="<?php echo $val; ?>"><?php echo $option; ?></option><?php } ?>  
								</select>  
			 
								<p><?php echo $value['desc']; ?></p>
			
								</div>
				
				
							<?php break;
			
							case "save-button": ?>
			
								<div class="wip_inputbox">
			
								<input name="action" id="element-open" type="submit" value="<?php echo $value['value']; ?>" class="button"/>
			
								</div>
			
							<?php break;
							
					}
					
				endif;
			}
		}	
		
		endif;	

	}
	
} 

?>