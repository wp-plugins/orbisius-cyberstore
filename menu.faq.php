<div class="orbisius_cyberstore">
    <div class="wrap">
        <h2>Frequently Asked Questions</h2>

        <p>
            <h3>Test Transactions Always Fail. Why?</h3>
			For some reason PayPal doesn't return VERIFIED for the test transactions.
        </p>
        <p>
            <h3>I need to backup the products table. How can I do that?</h3> 

            Please backup (using phpMyAdmin or similar tool) table: 
			<strong><?php echo $orbisius_digishop_obj->get('plugin_db_prefix') . 'products' ; ?></strong>

            <br /> and copy the contents of <strong><?php echo $orbisius_digishop_obj->get('plugin_uploads_dir'); ?></strong>
        </p>
        <p>
            <h3>Where can I find support?</h3>
        <div class="updated"><p>
            ** NOTE: ** Support is handled on our site: <a href="http://club.orbisius.com/support/" target="_blank" title="[new window]">http://club.orbisius.com/support/</a>.
            Please do NOT use the WordPress forums or other places to seek support.
        </p></div>
        </p>
    </div>
</div>
