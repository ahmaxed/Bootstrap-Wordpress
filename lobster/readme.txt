= Lobster =

* by Ruairi Phelan <http://cyberdesigncraft.com/>

== About Lobster ==

Launch your new site with Lobster, built with Bootstrap 3.0.2 Lobster is lightweight and fully responsive. You can add your own background, set page layouts and more. Lobster supports eight post formats: Video, Image, Aside, Status, Audio, Quote, Link and Gallery. Recommends using Jetpack and is compatible with bbPress & BuddyPress. Built with Google Fonts, hence 'Lobster', for improved typeface readability and works perfectly across all devices!


== NOTES ==

== HEADER IMAGE ==

To enable the Header Image in the Theme Customizer to go Custom Header and check to the checkbox to enable this feature.


== OVERWRITE THEME-OPTIONS.PHP, CUSTOM-HEADER.PHP AND MEDIA.PHP ==

To overwrite the parents theme's functionality simply copy and paste the parent files into your Child Theme 'inc' folder where you can edit and customize them as you would template files in the root.

For instance in the media.php you can change the Lobster front to any of your chosing, and in the theme-options you can change the star icon or delete it!



== INSTALL CAROUSEL ==
To use the Carousel on the Front Page as displayed in Demo. Download CTP Bootstrap Carousel from: http://wordpress.org/plugins/cpt-bootstrap-carousel/
Open ctp-bootstrap-carousel.php in a text-editor and on line 128 which reads: " 'showcaption' => 'true', " change the showcaption to 'false' like so:

" 'showcaption' => 'false', "

This now hides the caption and the read more link, which do not render well with responsive design.


== Credits ==

Special thanks to, Justin Tadlock 'greenshady' http://justintadlock.com/ and http://themehybrid.com/ for his assistance in reviewwing this theme, with out which, I would be very lost!

And, Rohit Tripathi 'rohitink' who has an eagle's eye for detail, http://rohitink.com/ and some nice looking themes too!

==

Lobster came in to being when I downloaded WARD by Chris Bavota http://wordpress.org/themes/ward , and being interested in Bootstrap and mobile first design. I decided to launch my own varient of the theme. 

== LICENSE ==

Ward
License: [[http://wordpress.org/themes/ward|GNU General Public License v2 or later]]
Copyright: Chris Bavota, http://bavotasan.com/

Twitter Bootstrap - http://getbootstrap.com/
License: [[http://www.apache.org/licenses/LICENSE-2.0|Apache License v2.0]]

html5shiv - http://code.google.com/p/html5shiv/
License: [[http://opensource.org/licenses/MIT|MIT]]

Twitter Bootstrap - http://getbootstrap.com/
License: [[http://www.apache.org/licenses/LICENSE-2.0|Apache License v2.0]]

Font Awesome - http://fortawesome.github.io/Font-Awesome/
License: [[http://opensource.org/licenses/MIT|MIT]]
Copyright: Dave Gandy, https://twitter.com/davegandy

Google Fonts - http://www.google.com/fonts/
License: [[http://scripts.sil.org/cms/scripts/page.php?site_id=nrsi&id=OFL|SIL Open Font License]]


== CHANGELOG ==
v1.9.6
Code cleaned up for maintainability and best practices
closed an open php tag in header.php
text-domain changed from cdc_lobster to lobster
cyber_dc_boot changed to lobster
Fixed bug with text on customer header.

v1.9.5
Added 'Template: lobster' to child-theme zip so it functions properly.
Added conditional logic to functions.php so that the theme-options.php, custom-header.php and media.php files located in the 'inc' can be overwritten by a child theme.


v1.9.4
Revert CSS and JS to Boostrap 3.0.0 as too many issues with comments.php
Will have to alter layout structure or alter comments.php to correct.

v1.9.3
CSS and JS files Updated to Bootstrap 3.0.2
Link add to Home Page Widget that links to admin widgets.php
cyberdesigncraft changed to Cyberdesign Craft in footer.php

v1.9.2

Updated  style.css

v1.9.1

Now using semantic versioning  <major>.<minor>.<patch>. hence the 1.9.1 - see http://semver.org/

Fixed CSS as to not display a gray box on Image Post Formats

v1.9

Changed Custom Header Headline to read Custom Header

Added a note in the Custom Header Options - to enable Header Image checkbox must be checked.

Fixed CSS bug displaying a white background for every second article.

Updated Po an Mo files

v1.8

Removed custom header_style in custom-header.php as it contaminated the front/ homepage

v1.7

SEO Markup changed from 3 H1 tags to 1 per post / page
no h2 - sub headings are at the users discretion
All Jumbo and Custom Header are now h3 tags

Changed Custom Header Images from PNG to optimized JPGs and styled them.

Commented out delete_option( 'cdc_lobster_theme_options' ); in theme-options.php so now custom headers in fully functional default id 'off'. 

v1.6

Custom Header is now supported as an option in Theme Customizer the default setting is off

Home dynamic widgets background added to header_text_color()

po and mo files updated

old custom header commenting removed

v1.5

Fixed Fatal Error Lobster now fully supports Custom Header

Custom Header support is turned / commented-out by default

Instrustion for custom header above - deleted as of 1.7

Added comments to header.php and functions.php Indicating how to enable custom header

Header Text Color extended to star

v1.4

Fixed Custom Header Text in Customizer

Fixed Background in Customizer

Added Custom Header using Twentythirteen as a template

v1.3

Removed Favicon as it could not be changed by user and can be handled with a plugin - required.

v.1.2

Custom Menu Widget padding corrected for depth as required.

Placed Star icon below the Jumbo headline and gave it font-size of 42px as to not overpower smaller screen sizes.

Placed instructions for changing Jumbo Icon above.

Added lobster.po and lobster.mo in /languages via POEdit: Translation Ready.

Added support for Child Theme.

Added favicon.

Screenshot updated to reflect new changes.

v.1.1

Custom Post Type - removed and functionality replaced with plugin CTP Bootstrap Carousel.
See: http://justintadlock.com/archives/2013/09/14/why-custom-post-types-belong-in-plugins

Carousel is now configured to display carousel on top of font page after installing CPT Bootstrap Carousel

See:http://wordpress.org/plugins/cpt-bootstrap-carousel/

WP Bootstrap Nav Walker removed 

License GPL 2 or later - replaced with GPL3 to be compatible with Twitter Bootstrap's Apache 2.0 
see: http://www.apache.org/licenses/GPL-compatibility.html

Screenshot - replaced in compliance WordPress theme review standards. 

Categories are now displayed by default and have moved to content-footer.php for better legibility.

Theme options menu and admin bar item links - removed as required.

Single Post Links for Asides, Quotes, Links, and Status posts added as required. 

Home links colour changed from #0088cc to #fff000 - as to not blend with background as required.

Text lists on home widgets aligned left.

Star Icon moved in-line with <h1> as to not impede visability as requires.

Changed Footer Links to #eeeeee.

Minified style.css for faster page loads and style.dev.css included for developers.


v1.0

Release to repository for review on 10th of October 2013.