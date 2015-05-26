=== Orbisius CyberStore ===
Contributors: lordspace,orbisius
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=7APYDVPBCSY9A
Tags: store,ecommerce,estore,online shop, shopping cart, wordperss e-commerce, wordperss ecommerce, sell digital products, sell ebook, ebook, sell ebook,digishop,digi shop,cyber store,orbisius cyber,orbisius cyber store,cyberstore,Orbisius cyberstore,woocommerce,paypal, e-commerce, e-shop, e-store,  payment, paypal, Paypal shopping cart, sell digital products, shop, shopping cart, wordperss ecommerce, WordPress shopping cart, wp, wp store,edl,Easy Digital Downloads
Requires at least: 2.8
Tested up to: 4.2
Stable tag: 2.1.5
License: GPLv2 or later

Orbisius CyberStore plugin allows you to start selling your digital products such as software, e-books, reports in minutes.

== Description ==

Orbisius CyberStore allows you to setup your e-store and start selling digital products such as software, e-books, pdf, reports in minutes.
It adds a simple Buy Now button which sends the customer to PayPal to complete the payment and after that he/she is returned to your site.

> Users of the former Orbisius DigiShop plugin:
> Please backup your database and uploads from /wp-content/uploads/digishop before updating to the new version. Just in case.
> You will have to re-add the products and re-insert the shortcode because this plugin is not compatible with the previous code.

= Demo =
http://www.youtube.com/watch?v=6EKNMYjzwlM

= Video Tutorials =
http://www.youtube.com/playlist?list=PLfGsyhWLtLLiCa3WleGdArmG1RU6w9Ug5

= Benefits / Features =
* Easy to use
* Downloads links are served from the main domain e.g. yourdomain.com/?orb_cyber_store_dl=f47c137
* When download link is clicked the download dialog is shown i.e. the file does not show within the browser (forced download)
* Handles PayPal Live and Sandbox (at the same time - your clients will be directed to PayPal but your transactions will go to the Sandbox, use Sandbox IP Address)
* Functionality to enable/disable products (when a product is disabled the buy now link will not be shown and the file can't be downloaded even with the download link)
* Customize the text for the successful and unsuccessful transaction
* In case of a failed transaction the email is sent to the admin so he can handle the failed transaction manually
* There is a dollar sign button in edit page/post that allows you to choose a product and this will insert the correct shortcode which will be later replaced by Buy Now button
* Protection against multiple calls made from PayPal IPN which paypal makes to notify the site owner for the transaction.
* Download expires after 48 hours
* Download limits: maximum 3 per order
* Allows functionality the form submission to go in a new window
* Optional shipping address requirement (both available as a global setting and per individual product)
* Supports a secure HOP URL. The main idea of the Secure HOP URL is to redirect to another URL. The script must redirect to an address passed by the "r" parameter.
Having this kind of redirect is very useful because when your visitors are about to return to your site PayPal checks and if the returning URL is a non-ssl link then it puts a warning with makes the user experience less than optimal. Orbisius CyberStore includes a sample redirect script that you can install on your secure site.
* Supports free products (since v1.2.3) for download and adds a Download button instead of Buy Now button
* Since v2.0.0 supports variable products e.g. a digital product with multiple licenses, product notes

= New attributes =

render_price="1"
When this attribute is set in the shortcode will make the plugin show the price above the buy now button.
Why this is important? Because if you enter the price on a page and later go and modify the product price of the product
you may forgot to update the page. That's not good to for the users.

currency_prefix="$" : currency sign shown before the price, it defaults to $ for CAD, USD, AUD
currency_suffix="USD" : text shown after the price
price_label="Price" : text shown before the price
price_suffix="(one time)" text appended after the currency suffix

Example:
[orb_cyber_store id="123" render_price="1" price_suffix_label="(one time)"]

This example this will display
Price: $249.95 USD (one time)

If you want the price to be shown for all products insert this in your functions.php of the current theme
add_filter('orb_cyber_store_ext_filter_render_price', '__return_true', 10);

= Extensions =

The plugin has several cool <a href="http://club.orbisius.com/products/wordpress-plugins/orbisius-cyberstore/extensions/" title="Orbisius CyberStore Extensions" target="_blank">Extensions</a>

* PayPal Micropayments - allows you to switch to a PayPal Micropayments account and save a lot in transaction fees.
* Change Language of PayPal Checkout Page
* HTML Email + Richtext editor for order email
* Change Email From
* Style Order Form

= Author =

Svetoslav Marinov (Slavi) | <a href="http://orbisius.com" title="Custom Web Programming, Web Design, e-commerce, e-store, Wordpress Plugin Development, Facebook and Mobile App Development in Niagara Falls, St. Catharines, Ontario, Canada" target="_blank">Custom Web and Mobile Programming by Orbisius.com</a>

= Support =
> Support is handled on our site: <a href="http://club.orbisius.com/forums/forum/community-support-forum/wordpress-plugins/orbisius-cyberstore/" target="_blank" title="[new window]">http://club.orbisius.com/support/</a>
> Please do NOT use the WordPress forums or other places to seek support.
> New: We have launched our <a href="http://club.orbisius.com/products/" target="_blank" title="[new window]">membership site</a>
> which gives you access to all of our premium plugins at an affordable price.

== Installation ==

= Automatic Install =
Please go to Wordpress Admin &gt; Plugins &gt; Add New Plugin &gt; Search for: Orbisius CyberStore and then press install

= Manual Installation =
1. Upload orbisius-cyberstore.zip into to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress

== Frequently Asked Questions ==

= Is DIGIshop Purchase Required? =
Orbisius CyberStore WordPress plugin has nothing to do with the DigiSHOP from sumeffect

Orbisius CyberStore WordPress plugin is free to use for personal or commercial one.

= Is Orbisius CyberStore compatible with the previous version called DigiShop? =
No. You will have to manually add each of your old products.
This version offers more features and is more stable.

A little bit of history. Originally we had named the plugin DigiShop and it had about 7,000 downloads in the WordPress plugin directory.
Somebody complained that it was infringing on their trademark and it was removed without giving us a chance to rename it.
We were notified after the fact.

= No notification emails =
If you or your users didn't get the order notification email containing the download link, please check the following
* Spam/junk email folders
* Check if your PayPal account has IPN (Instant Payment Notification) turned on.

This video shows how to enable IPN.
http://www.youtube.com/watch?v=et8KFv0vYWM

= Issues/questions/suggestions =
If you have run into issues or have questions/suggestions please register on our support forum and post your suggestion or question there.

> Support is handled on our site: <a href="http://club.orbisius.com/forums/forum/community-support-forum/wordpress-plugins/orbisius-cyberstore/" target="_blank" title="[new window]">http://club.orbisius.com/support/</a>
> Please do NOT use the WordPress forums or other places to seek support.

== Screenshots ==
1. Plugin icon when editing post/page
2. Dashboard
3. Products
4. Add Product
5. Settings
6. FAQ
7. Help
8. Extensions
9. About
10. Buy Now Button
11. Buy Now Button after the transaction with the success message.
12. Screenshot showing variable products, download button for a free product and simple product

== Upgrade Notice ==
n/a

== Changelog ==

= 2.1.6 =
* Added invoice ID as a variable that can be replaced and added to the welcome email.

= 2.1.5 =
* Encoding 'custom' fields using base64 ... as other ways caused valid transactions to fail.
* Changed how the log hash was generated.

= 2.1.4 =
* Note: The failed subject and text is sent to sent to the buyers when Paypal reports that the transaction is invalid. That way the buyer will that the admin is looking into it. The admin should check if there is a confirmation email from Paypal and send the download link manually.
* Added a check for txn_type if exists in the paypal params
* Added extra underscore in the extra params of cyberstore.
* Suppressed errors when doing @set_time_limit because when safe mode is enabled it shows an error and breaks the download: Warning: set_time_limit(): Cannot set max execution time limit due to system policy in ...

= 2.1.3 =
* Added an more hooks before and after the buy now form.

= 2.1.2 =
* Added an additional check before allowing log download e.g. user must be admin.

= 2.1.1 =
* Added more robust data filtering
* Tested with WP 4.2
* Added action hooks before and after buy now button
* Added a special case for Sandbox transactions to assume payment status: Pending as verified and OK.
* Log files can now be downloaded.
* Previewing only files smaller than 100KB

= 2.1.0 =
* Tested with WP 4.1

= 2.0.9 =
* Added Orbisius news widget
* Added widget to show the author info
* Tested with WP 4.0.1

= 2.0.8 =
* Fixed: invalid hash due to WordPress being installed in a non-standard folder which moved uploads dir somewhere else.
* Fixed: some warninngs were shown when debugging was enabled. Our plugins don't do that. Ever.
* Smiled more during the development of this release. If anybody is reading this tweet to @orbisius ;)
* Tested with WP 4

= 2.0.7 =
* Passing product info to the filter that is called to displayed post transaction info
* Some settings couldn't be saved e.g. render price or title
* testing with WP 3.9.2

= 2.0.6 =
* Found and fixed a very hidden but which was showing some notice on plugin activation
* Tested with WP 3.9
* Fixed tinymce for wp 3.9

= 2.0.5 =
* Added some more links to tutorials

= 2.0.4 =
* Added a link to the settings page in the dashboard
* Fixed the tweet's suggested text (was relevant to another premium plugin of ours)
* Added some more links (to support forums, add, products) to the dashboard page.

= 2.0.3 =
* Fix: the transactions were incorrectly cleaned up resulting in invalid download hash.
* Added a link to the video tutorials playlist

= 2.0.2 =
* Added links to add product and products on the add product page
* Moved the form into 'orb_cyber_store_container' div for all product types
* Changed example in add product
* Somebody extension list was left turned off by mistake

= 2.0.1 =
* Removed .htaccess as it was cause the plugin not to work with some apache servers
* Added an index.html file in the data folder in case the .htaccess file doesn't stop people.
* Added new filter orb_cyber_store_ext_filter_email_template_vars which allows you to add or remove replace variables such as %%PRODUCT_NAME%%

= 2.0.0 =
* Added a new db table fields: file_ext_src, meta_info, attribs
* Removed some unused settings variables
* Passed through a self generated invoice field that includes the site name and date and time of the transaction
* Added System Note field
* Made add/edit to stay on the same page
* Made product titles click and to lead to edit product
* Added more mime-types so the download option can server files with the correct type that means less warnings that it is a binary/executable file
* Refactored code and centralized the paygw params and test mode detection.
* Using curl by default to validate a transaction and if it doesn't work then try fsockopen
* Loading a minified CSS in the admin
* Added an option to select if the price will be shown above the Buy Now button
* Added price rendering for variable products too.
* Moved the currency field near the paypal email
* Combined a few misc checkboxes into one row to save some space
* Reduced the custom params that are sent to paypal. Send only to most necessary onces.
* Passing product_name as a custom parameter to paypal
* Re-organized add product so it's super simple and advanced things are in the advanced hidden section, optionally toggle-able
* Fixed a weird bug that was deleting the product hash. The hashes are recreated when the new db is instantiated.
* Added a download link in the add/edit product
* Added an info icon to alert when the product has variable pricing as the variable info is hidden in the advanced section
* Showing which products has variable pricing in CyberStore | Products
* Fixed the way tinymce button was implemented

= 1.2.7 =
* Added link to extensions on the dashboard

= 1.2.6 =
* Improved Add product page

= 1.2.5 =
* Improved UI

= 1.2.4 =
* Passing logged in user ID and email (if any) to the custom params
* Fixed: download is sent only on payment and not on other IPN events e.g. refund, new_case (dispute) etc.
* Passed product record after txn in 'orb_cyber_store_ext_after_txn' action
* Tested with WP 3.8.1

= 1.2.3 =
* Pro-active fix: if the currency is entered in lowercase paypal will return an error so the plugin will auto-uppercase it.
* Added support for free products.
* Added a success message when saving the Settings of the plugin
* Tested in WordPress 3.8

= 1.2.2 =
* Added links to support forum in the settings
* Updated the readme so it shows that the plugin has been tested with WP 3.7

= 1.2.1 =
* Tested with WP 3.7
* Added explicit file unlocking due to php not unlocking the files anymore in close
* Changed to reader's lock in ::read() method.
* Fix: show load only on the button that was clicked, not on all of the buttons (if there are more than one on a page).
* Added some cool filters and action(s).
* Added filters:
    - orb_cyber_store_get_product 
    - orb_cyber_store_get_products
    - orb_cyber_store_paypal_url - can be used to change the paypal url
    - orb_cyber_store_post_download_file
    - orb_cyber_store_ext_filter_extra_params - hidden parameters added to the payment form
    - orb_cyber_store_paypal_custom_params - params sent to paypal in the 'custom' field
* Added action:
    - orb_cyber_store_process_payment which will be called instead of paypal

= 1.2.0 =
* Added support for shortcodes in the email message
* Fixes and improvements.
* Added filters: orb_cyber_store_ext_filter_email_to, orb_cyber_store_ext_filter_email_subject, orb_cyber_store_ext_filter_email_message, orb_cyber_store_ext_filter_email_headers
* Added actions: orb_cyber_store_ext_before_send_mail, orb_cyber_store_ext_after_send_mail

= 1.1.9 =
* Tested with WP 3.6.1
* Updated readme to include the available extensions
* Fixes and improvements

= 1.1.8 =
* Removed some methods that were causing lots of debug messages. e.g. is_feed
* Shortcode attribute to render price
* Fixed: when adding a product it did't return the correct ID but just 1 for all new products.
* Added some product field defaults -> add product was outputting some notices
* Added a filter before serving the file for download that way the file can be changed by a filter

= 1.1.7 =
* fix: using plugin name instead of it's internal slug
* Made the insert/update to return the ID of the product so I can create the shortcode.

= 1.1.6 =
* Fixed: Orbisius CyberStore wasn't working well with older versions of itself (former DigiShop)
* Added functionality (through extension) to make the order email text field into rich text editor
* Tweaked the donation box in the dashboard. Looks better centered.
* Made some text boxes larger (in settings)
* Fixed paypal link to currency codes
* Removed parse old code option because this plugin has to read another db table and do lots of work.
* Fix: update/add was failing if no attachment was provided.
* Made active checkbox to be checked when adding a new product by default ... saving one click
* Changed some error messages (download link expired etc).
* Added the return code (200 -> OK) in case PayPal calls the site again ... wp_die returns status 500 which makes paypal to call the site many times -> which leads to people being self spammed
* Orbisius CyberStores > Settings : checking if a value exists and explicitely set it to 0 if not
* Made possibly transactions logs to be listed within the settings ONLY if logging is enabled AND files are less than 500KB.
* Made some fixes ... WP was emitting some warnings when DEBUG is on

= 1.1.5 =
* Tested with wp 3.5.2
* Added extensions support
* Added option to optionally parse old digishop shortcode - this doesn't load the products from old db though.
* Removed the settings option. Just top level menu is OK.

= 1.1.4 =
= Fixed when updating a product the status message was showing as error that happened only when replacing the filename
= Misc Fixes.

= 1.1.3 =
* Added info about the changed support
* Corrected links to the donation email
* Tested the plugin with WP 3.5.1

= 1.1.2 =
= added a secure hop URL field in the settings.

= 1.1.1 =
= fixed a hard to find bug when validating the txn

= 1.1.0 =
= fixed the error about get instance ... the plugin was crashing when options were saved
= added shipping address checkbox if it should be required or not (both a global setting and per individual products)
= made the settings page more compact by hiding the advanced options by default and show them of from another show/hide button
= added please wait

= 1.0.8 =
= added checkbox to select if the form submission should be done in a new window
= fixed a call that was breaking because was referencing a different plugin of mine
= added a link to my free e-book

= 1.0.7 =
* put css classes on the buy now button in case people want to apply styles to it.

= 1.0.6 =
* Added a check for invalid input. The plugin stops working if it receives invalid input e.g. text instead of a number (applicable for IDs)
* Implemented file sanitization method ... leaves only nicely formatted filenames. If the filename is totally cleaned up then it'll use a default name
* Turned autocomplete input box for Price in Add Product
* Fix: If the file exists when adding a product append a number (timestamp) before the extension
* Fix: some people reported that they or their clients got lots of emails. The plugin will not process it a transaction if PayPal calls the plugin for 2nd or more times
* Added download expiration within 48 hours for new orders.
* Showing the annoying messages when sandbox mode is turned on to appear only on the plugins page(s)
* Added a limit to the downloaded files 3 per hash

= 1.0.5 =
* fixed: passing an extra variable which caused PayPal transactions not to validate
* Address Settings > sandbox IP which if supplied with enabled sandbox will enable sandbox mode only for that specific IP address.

= 1.0.4 =
* made the payment form to submit to the blog and then the WP site will redirect to PayPal
* added files to be supplied as external URL
* functionality to call another URL after a transaction
* added option to customize the submit button's image
* added info about what to backup in FAQ.
* added Products link in the Plugins section
* fixed the IPN part
* added trailing slash to the blog ...
* showing transaction status message (positive/negative) at the top in addition to the old message.
* added uninstall script to clean stuff up after plugin removal
* added sanbox paypal email in the settings (useful when testing with sandbox)
* added .htaccess in data/ folder
* added aggressive logging. the log file is made up hash and date for harder guessing. It should not be accessible because of htaccess
* rearranged settings menu screen
* showing the max upload size (hosting dependant)
* fixes and tweaks

= 1.0.4 =
* n/a

= 1.0.3 =
* Added some fixes with the downloads.
* Chrome users were getting download interrupted.
* Added a link to the files (e.g. when the admin has to manually send the download link)
* Added a newsletter box in the settings

= 1.0.2 =
* Fixed: Notification was not sent to the payer

= 1.0.1 =
* Newsletter and donation boxes.
* Show product status and icons if a file has been attached

= 1.0.0 =
* Initial Release
