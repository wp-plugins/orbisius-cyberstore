<?php

$msg = '';

$id = !isset($_REQUEST['id']) ? null : $_REQUEST['id'];
$settings_key = $orbisius_digishop_obj->get('plugin_settings_key');
$db_prefix = $orbisius_digishop_obj->get('plugin_db_prefix');

$product_rec = $orbisius_digishop_obj->get_product_defaults();

if (!empty($_POST)) {
    $data = $_REQUEST[$settings_key];

    $ret_id = $orbisius_digishop_obj->admin_product($data, $id);

    if (empty($ret_id)) {
        $msg = $orbisius_digishop_obj->message('Cannot add/update record. <br/>Errors: <br/>' . $orbisius_digishop_obj->get_errors_str());
        $err = 1;
    } else {
        $shortcode = '[' . $orbisius_digishop_obj->get('plugin_id_str') . ' id="' . $ret_id . '"]';
        $msg = $orbisius_digishop_obj->message("Successfully added/updated record. Shortcode: $shortcode", 1);
    }

    // preserve data only when updating or error adding
    if (!empty($err) || !empty($id)) {
        $product_rec = $_REQUEST[$settings_key];
    }
}

if (!empty($id)) {
    $product_rec = $orbisius_digishop_obj->get_product($id);
}

?>

<div class="orbisius_cyberstore">
    <div class="wrap">
        <h2>Add/Edit Product</h2>
        <?php echo $msg; ?>
        
        <form method="post" enctype="multipart/form-data">
            <?php settings_fields($orbisius_digishop_obj->get('plugin_dir_name')); ?>

            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Name</th>
                    <td><input type="text" name="<?php echo $settings_key; ?>[label]" value="<?php echo $product_rec['label']; ?>" class="input_field" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Price</th>
                    <td><input type="text" name="<?php echo $settings_key; ?>[price]" value="<?php echo $product_rec['price']; ?>" autocomplete="off" />
                    Example: 29.95 or 10
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">File</th>
                    <td>
                        <input type="file" name="file" value="" /> Max file upload size:
                            <?php echo Orbisius_CyberStoreUtil::get_max_upload_size(); ?> MB *
                        
                        <?php if (!empty($product_rec['file'])) : ?>
                            <br/>
                            <?php
                                if (!Orbisius_CyberStoreUtil::validate_url($product_rec['file'])) {
                                    if (file_exists($orbisius_digishop_obj->get('plugin_uploads_dir') . $product_rec['file'])) {
                                        echo $product_rec['file'] . ' (' . Orbisius_CyberStoreUtil::format_file_size(
                                            @filesize($orbisius_digishop_obj->get('plugin_uploads_dir') . $product_rec['file'])) . ')';
                                    } else {
                                        echo "<span class='app_error'>The uploaded file [{$product_rec['file']}] cannot be found.</span>";
                                    }
                                }
                            ?>
                        <?php elseif (!empty($id)) : ?>
                        <span class="app_error">You haven't uploaded a file yet.</span>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">External URL</th>
                    <td><input type="text" name="<?php echo $settings_key; ?>[ext_link]" value="<?php
                        $ext_link = '';

                        if (!empty($product_rec['ext_link'])) {
                            $ext_link = $product_rec['ext_link'];
                        } elseif (Orbisius_CyberStoreUtil::validate_url($product_rec['file'])) {
                            $ext_link = $product_rec['file'];
                        }

                        echo esc_attr($ext_link); ?>" class="input_field" />
                    <p>
                        Example: http://yourdomain.com/some-document.pdf<br/>
                        Example: ftp://yourdomain.com/sample.doc<br/>
                        If your file is too big you can provide an external link and your users will be redirected to that file. </p>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">Active</th>
                    <td><input type="checkbox" name="<?php echo $settings_key; ?>[active]" value="1"
                                <?php echo empty($product_rec) || !empty($product_rec['active']) ? 'checked="checked"' : ''; ?> /></td>
                </tr>
            </table>
            <p>
                <br/>Notes:
                <br/> One file per product. If you need more please add them into a ZIP archive file.
                <br/> * The maximum file upload size is determined by your hosting company.
                If it is too low (e.g. less than 2 MB) contact your hosting to increase it.
            </p>
            <p class="submit">
                <input type="submit" class="button-primary" value="<?php _e('Save') ?>" />
            </p>
        </form>
    </div>
</div>