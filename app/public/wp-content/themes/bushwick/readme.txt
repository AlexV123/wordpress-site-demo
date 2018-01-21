=== Bushwick ===
Contributors: automattic
Donate link:
Tags: photoblogging, photography, art, artwork, blog, design, fashion, bright, clean, elegant, modern, sophisticated, white, purple, light, two-columns, responsive-layout, fluid-layout, custom-header, custom-menu, editor-style, featured-images, flexible-header, infinite-scroll, microformats, rtl-language-support, sticky-post, translation-ready
Requires at least: 3.4
Tested up to: 3.8.1
Stable tag:
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Bushwick is a lightweight, responsive blogging theme, designed to show beautiful content alongside beautiful imagery.

== Description ==

Bushwick is a lightweight, responsive blogging theme, designed to show beautiful content alongside beautiful imagery. It was originally designed by James Dinsdale, and converted to a WordPress theme by Automattic.

== Installation ==

1. In your admin panel, go to Appearance -> Themes and click the Add New button.
2. Click Upload and Choose File, then select the theme's .zip file. Click Install Now.
3. Click Activate to use your new theme right away.

== Frequently Asked Questions ==

== Changelog ==

= 8 June 2017 =
* Correcting strings marked for translation, to include textdomains.
* Fix styles for lists in text widget. Add title-tag support. Bump version number.

= 7 June 2017 =
* Update JavaScript that toggles hidden widget area, to make sure new video and audio widgets are displaying correctly when opened.

= 3 May 2017 =
* Check for post parent object before outputting post parent information to prevent fatals.

= 28 March 2017 =
* Ensure attachment meta is printed even if no post parent exists.

= 24 March 2017 =
* Check for post parent before outputting next, previous, and image attachment information to prevent fatals.

= 22 March 2017 =
* add Custom Colors annotations directly to the theme
* move fonts annotations directly into the theme

= 30 January 2017 =
* Check for is_wp_error() when outputting get_the_tag_list() to avoid potential fatals.

= 19 July 2016 =
* Remove the widont filter because default font doesn't support non-breaking space.

= 16 June 2016 =
* Add a class of .widgets-hidden to the body tag when the sidebar is active; allows the widgets to be targeted by Direct Manipulation.

= 9 June 2016 =
* Add Headstart annotations;

= 20 August 2015 =
* Add text domain and/or remove domain path.

= 31 July 2015 =
* Remove `.screen-reader-text:hover` and `.screen-reader-text:active` style rules.

= 30 July 2015 =
* Migrate to Masonry V3.

= 15 July 2015 =
* Always use https when loading Google Fonts. See #3221;

= 24 June 2015 =
* Add more specificity to the menu toggle button to prevent being overridden in a child theme.

= 6 May 2015 =
* Fully remove example.html from Genericons folders.
* Remove index.html file from Genericions.

= 20 January 2015 =
* Allow sub-menus to be accessed on touch devices and on focus with keyboard.

= 6 August 2014 =
* Minor adjustment to media query to trigger it sooner for landscape oriented small screens;
* Ensure screen-reader-text positioning is far to the left such that it doesn't cause hidden elements to overflow on narrow screens.
* Ensure hidden site titles that are long do not overflow the screen by positioning them left;

= 23 July 2014 =
* change theme/author URIs and footer links to `wordpress.com/themes`.

= 30 June 2014 =
* Encode Google Font url.

= 10 June 2014 =
* Add hyphenation and wrapping rules to improve word breaks on long title words.

= 9 June 2014 =
* Update POT version number.

= 9 May 2014 =
* Wrap entry title if too many characters.
* Remove aside post format style since theme does not support post format.

= 6 May 2014 =
* Rewritte masonery function so that masonry + toggle menu calculate the correct height thanks to trigger( 'resize' ).

= 14 April 2014 =
* Update Responsive video support

= 5 March 2014 =
* Add support for featured images on pages as well as posts.

= 27 February 2014 =
* Multiple changes:
* Remove site-header positioning on mobile devices to avoid title overflow.

= 20 February 2014 =
* Remove text shadow from menu icon when positioned against the white background.

= 19 February 2014 =
* Updated readme and bumped version number for
* Improve styling and usability for menus at narrow screen widths.

= 17 February 2014 =
* Use `current_time()` over PHP's `time()`.

= 14 February 2014 =
* Set featured images to only work for posts not pages

= 12 February 2014 =
* Move reply so that avatar doesn't overlap

= 7 February 2014 =
* Ensure entry-content and entry-summary are properly cleared, which

= 6 February 2014 =
* Improvements to site header on small screens and mobile devices.

= 5 February 2014 =
* Add Aleo font license information to the Credits section of the readme
* fixed issue with fonts not being  rendered properly in editor with IE10.
* When browsing on a mobile device, make the menu easier to read by adding a semi-transparent background color.

= 3 February 2014 =
* Updated word-wrap values. Adjusted entry-title font size for small devices.

= 23 January 2014 =
* correct escaping for attribute text.

= 16 January 2014 =
* Reduce the font size of the site title below 599px to avoid word breaks.
* Remove unnecessary CSS declaration for menu item links on single views that collides with custom colors.

= 15 January 2014 =
* Update screenshot to reflect new default header image.
* Change default header image and give credit in new readme.txt file.

= 14 January 2014 =
* Fix main navigation link colors for screen sizes below 1023px (navigation overlays custom header/featured image).
* Fix HOME button CSS to work with both wp_nav_menu and wp_page_menu.
* Fix custom header text color.
* Add font dequeue function if Custom Fonts are used.

= 3 January 2014 =
* Add tag for fluid-layout feature.

= 31 December 2013 =
* Update POT file.
* Make it look good in IE11.
* Give edit link some breathing room and make previews editable from index pages.

= 30 December 2013 =
* Update screenshot.
* Make child menu items work.

= 20 December 2013 =
* Update Genericons library to 3.0.2.
* Make sure handle stays a Genericon, even with custom fonts enabled.
* Style

= 19 December 2013 =
* Use full image size for header background.
* Make colors work better with main navigation and wpcom.

= 18 December 2013 =
* Add editor styles.
* Update template files.

= 13 December 2013 =
* Update theme headers.
* Improve IS rendering and appearance.

= 11 September 2013 =
* A lightweight, responsive blogging theme, designed to show beautiful content alongside beautiful imagery.

== Credits ==

* Designed by James Dinsdale
* Aleo font by Alessio Laiso, licensed under the SIL Open Font License: http://fontfabric.com/aleo-free-font/
* `img/default-header.jpg`: photo by [Peter Besser](http://schwerunterwegs.blogspot.de/), licensed under [CC0](http://creativecommons.org/choose/zero/)