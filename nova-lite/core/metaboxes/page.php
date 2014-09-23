<?php

/**
 * Wp in Progress
 * 
 * @author WPinProgress
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

$novalite_new_metaboxes = new novalite_metaboxes ('page', array (

array( "name" => "Navigation",  
       "type" => "navigation",  
       "item" => array( "setting" => __( "Setting","wip") ),   
       "start" => "<ul>", 
       "end" => "</ul>"),  

array( "type" => "begintab",
	   "tab" => "setting",
	   "element" =>

		array( "name" => __( "Setting","wip"),
			   "type" => "title",
			  ),

		array( "name" => __( "Slogan","wip"),
			   "desc" => __( "Insert the slogan of page","wip"),
			   "id" => "wip_slogan",
			   "type" => "text",
			  ),

		array( "name" => __( "Template","wip"),
			   "desc" => __( "Select a template for this page","wip"),
			   "id" => "wip_template",
			   "type" => "select",
			   "options" => array(
				   "full" => __( "Full Width","wip"),
				   "left-sidebar" =>  __( "Left Sidebar","wip"),
				   "right-sidebar" => __( "Right Sidebar","wip"),
			  ),
			  ),
			  
),

array( "type" => "endtab"),

array( "type" => "endtab")
)

);


?>