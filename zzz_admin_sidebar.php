<style>
    .zzz_app_admin_sidebar {
      
    }

    .zzz_app_admin_sidebar .more_plugins_list li a {
        background: url("<?php echo $orbisius_digishop_obj->get('plugin_url')?>/zzz_media/star.png") no-repeat scroll 0 0 transparent;
        padding: 0 0 3px 20px;
    }
</style>

<div class="zzz_app_admin_sidebar">
    <p><a href="http://club.orbisius.com/forums/forum/community-support-forum/wordpress-plugins/digishop/" target="_blank">Support Forum</a>
    </p>
        <?php echo $orbisius_digishop_obj->generate_newsletter_box(array('form_only' => 1, 'src2' => 'admin_sidebar')); ?>
        <br class="clear_both" />
       
		<div>
            <iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Ffacebook.com%2FOrbisius&amp;width=292&amp;height=210&amp;colorscheme=light&amp;show_faces=true&amp;border_color&amp;stream=false&amp;header=true&amp;appId=142797889159780" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:292px; height:210px;" allowTransparency="true"></iframe>
		</div>

        <div class="">
            <h2>Hire Us</h2>

            If you want us to create a plugin or a web/mobile app for you contact us to discuss your needs.
            <br/><a href="http://orbisius.com/page/free-quote/?utm_source=orbisius-cyberstore&utm_medium=plugin-settings&utm_campaign=plugin-update"
               title="If you want a custom web/mobile app or a plugin developed contact us. This opens in a new window/tab"
               class="button-primary" target="_blank">Get a Free Quote</a>
        </div>

</div>