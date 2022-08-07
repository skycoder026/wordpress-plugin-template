<div class="wrap">
    <h1><?php _e( 'New Address', WD_TRANSLATE ) ?></h1>

    <form action="" method="POST" name="address_store">
        <input type="hidden" name="method_name" value="store_address_book">
        
        <table class="form-table">

            <!-- NAME -->
            <tr>
                <th scope="row">
                    <label for="name"><?php _e('Name', WD_TRANSLATE) ?></label>
                </th>
                <td>
                    <input type="text" name="name" id="name" value="" class="regular-text">
                </td>
            </tr>

            <!-- ADDRESS -->
            <tr>
                <th scope="row">
                    <label for="address"><?php _e('Address', WD_TRANSLATE) ?></label>
                </th>
                <td>
                    <textarea name="address" id="address" class="regular-text"></textarea>
                </td>
            </tr>

            <!-- PHONE -->
            <tr>
                <th scope="row">
                    <label for="phone"><?php _e('Phone', WD_TRANSLATE) ?></label>
                </th>
                <td>
                    <input type="text" name="phone" id="phone" value="" class="regular-text">
                </td>
            </tr>
        </table>

        <?php wp_nonce_field( 'wd_academy_create_address'); ?>
        <?php submit_button( __( 'Save Address', WD_TRANSLATE ), 'primary', 'store_address' ); ?>
    </form>
</div>