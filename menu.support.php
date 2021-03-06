<div class="orbisius_cyberstore">
    <div class="wrap">
        <h2>Help</h2>
		
        <h3>How to use the plugin</h3>
        <p>
            First, add enter product name, price and upload a file (can be anything)<br/>
            Second, go to Products to copy the short code and then paste the short code in the article/page where you'd like the buy button to appear. <br/>
            With one of the recent updates you can just click on the
                <img src="<?php echo $orbisius_digishop_obj->get('plugin_url');?>/images/icon.png" alt="" title="" /> icon when editing a post/page.<br/>
            Enter your PayPal details in the Settings page and enable the plugin. <br/>
        </p>

        <h3>What are the steps for the buyer</h3>
        <p>
            The user goes to the page dedicated to the e-product then clicks Buy Now link and gets redirected to paypal. <br/>
            After the payment the user is returned to the same page he/she has ordered the product from. <br/>
            Depending on the payment status the user will see the success or the error message. <br/>
            In case of an error the admin will receive an email with the information that has been sent from PayPal.<br/>
            If the payment was successful the user will receive a download link. <br/>
            The admin will also receive it because he/she is added to the BCC list in the email. <br/>
        </p>

        <h3>Support</h3>
        <div class="updated"><p>
            ** NOTE: ** Support is handled on our site: <a href="http://club.orbisius.com/forums/forum/community-support-forum/wordpress-plugins/digishop/"
                target="_blank" title="[new window]">http://club.orbisius.com/forums/forum/community-support-forum/wordpress-plugins/digishop/</a>.
            Please do NOT use the WordPress forums or other places to seek support.
        </p></div>

        <h3>Video Tutorials</h3>
        <div><p>
            YouTube playlist: <a href="http://www.youtube.com/playlist?list=PLfGsyhWLtLLiCa3WleGdArmG1RU6w9Ug5"
                target="_blank" title="[new window]">http://www.youtube.com/playlist?list=PLfGsyhWLtLLiCa3WleGdArmG1RU6w9Ug5</a>.
        </p></div>

        <?php Orbisius_CyberStoreUtil::output_orb_widget(); ?>

        <h3>Demo</h3>
		<p>
            Link: <a href="http://www.youtube.com/watch?v=6EKNMYjzwlM&hd=1" target="_blank" title="[opens in a new and bigger tab/window]">http://www.youtube.com/watch?v=6EKNMYjzwlM&hd=1</a>
			<p>
				<iframe width="640" height="480" src="http://www.youtube.com/embed/6EKNMYjzwlM?hl=en&fs=1" frameborder="0" allowfullscreen></iframe>
			</p>

			<?php
            $app_link = 'http://www.youtube.com/embed/6EKNMYjzwlM?hl=en&fs=1';
            $app_title = $orbisius_digishop_obj->get('app_title');
            $app_descr = $orbisius_digishop_obj->get('plugin_description');
            ?>
            <p>Share this video:
                <!-- AddThis Button BEGIN -->
                <div class="addthis_toolbox addthis_default_style addthis_32x32_style">
                <a class="addthis_button_facebook" addthis:url="<?php echo $app_link?>" addthis:title="<?php echo $app_title?>" addthis:description="<?php echo $app_descr?>"></a>
                <a class="addthis_button_twitter" addthis:url="<?php echo $app_link?>" addthis:title="<?php echo $app_title?>" addthis:description="<?php echo $app_descr?>"></a>
                <a class="addthis_button_google_plusone" g:plusone:count="false" addthis:url="<?php echo $app_link?>" addthis:title="<?php echo $app_title?>" addthis:description="<?php echo $app_descr?>"></a>
                <a class="addthis_button_linkedin" addthis:url="<?php echo $app_link?>" addthis:title="<?php echo $app_title?>" addthis:description="<?php echo $app_descr?>"></a>
                <a class="addthis_button_email" addthis:url="<?php echo $app_link?>" addthis:title="<?php echo $app_title?>" addthis:description="<?php echo $app_descr?>"></a>
                <a class="addthis_button_myspace" addthis:url="<?php echo $app_link?>" addthis:title="<?php echo $app_title?>" addthis:description="<?php echo $app_descr?>"></a>
                <a class="addthis_button_google" addthis:url="<?php echo $app_link?>" addthis:title="<?php echo $app_title?>" addthis:description="<?php echo $app_descr?>"></a>
                <a class="addthis_button_digg" addthis:url="<?php echo $app_link?>" addthis:title="<?php echo $app_title?>" addthis:description="<?php echo $app_descr?>"></a>
                <a class="addthis_button_delicious" addthis:url="<?php echo $app_link?>" addthis:title="<?php echo $app_title?>" addthis:description="<?php echo $app_descr?>"></a>
                <a class="addthis_button_stumbleupon" addthis:url="<?php echo $app_link?>" addthis:title="<?php echo $app_title?>" addthis:description="<?php echo $app_descr?>"></a>
                <a class="addthis_button_tumblr" addthis:url="<?php echo $app_link?>" addthis:title="<?php echo $app_title?>" addthis:description="<?php echo $app_descr?>"></a>
                <a class="addthis_button_favorites" addthis:url="<?php echo $app_link?>" addthis:title="<?php echo $app_title?>" addthis:description="<?php echo $app_descr?>"></a>
                <a class="addthis_button_compact"></a>
                </div>
                <!-- The JS code is in the footer -->
            </p>
			
            <script type="text/javascript">
            var addthis_config = {"data_track_clickback":true};
            var addthis_share = {
              templates: { twitter: 'Check out {{title}} @ {{lurl}} (from @orbisius)' }
            }
            </script>
            <!-- AddThis Button START part2 -->
            <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=lordspace"></script>
            <!-- AddThis Button END part2 -->
		</p>		
    </div>
</div>
