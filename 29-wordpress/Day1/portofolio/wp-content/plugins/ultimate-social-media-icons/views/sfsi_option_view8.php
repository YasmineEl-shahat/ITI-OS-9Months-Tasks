<?php

/* unserialize all saved option for  section 8 options */

$option8 = maybe_unserialize(get_option('sfsi_section8_options', false));

$feedId = sanitize_text_field(get_option('sfsi_feed_id', false));

/*

 * Sanitize, escape and validate values

 */

$option8['sfsi_form_adjustment']         = (isset($option8['sfsi_form_adjustment'])) ? sanitize_text_field($option8['sfsi_form_adjustment']) : '';

$option8['sfsi_form_height']             = (isset($option8['sfsi_form_height'])) ? intval($option8['sfsi_form_height']) : '';

$option8['sfsi_form_width']             = (isset($option8['sfsi_form_width'])) ? intval($option8['sfsi_form_width']) : '';

$option8['sfsi_form_border']             = (isset($option8['sfsi_form_border'])) ? sanitize_text_field($option8['sfsi_form_border']) : '';

$option8['sfsi_form_border_thickness']     = (isset($option8['sfsi_form_border_thickness'])) ? intval($option8['sfsi_form_border_thickness']) : '';

$option8['sfsi_form_border_color']         = (isset($option8['sfsi_form_border_color'])) ? sfsi_sanitize_hex_color($option8['sfsi_form_border_color']) : '';

$option8['sfsi_form_background']         = (isset($option8['sfsi_form_background'])) ? sfsi_sanitize_hex_color($option8['sfsi_form_background']) : '';

$option8['sfsi_form_heading_text']         = (isset($option8['sfsi_form_heading_text'])) ? sanitize_text_field($option8['sfsi_form_heading_text']) : '';

$option8['sfsi_form_heading_font']         = (isset($option8['sfsi_form_heading_font'])) ? sanitize_text_field($option8['sfsi_form_heading_font']) : '';

$option8['sfsi_form_heading_fontstyle'] = (isset($option8['sfsi_form_heading_fontstyle'])) ? sanitize_text_field($option8['sfsi_form_heading_fontstyle']) : '';

$option8['sfsi_form_heading_fontcolor'] = (isset($option8['sfsi_form_heading_fontcolor'])) ? sfsi_sanitize_hex_color($option8['sfsi_form_heading_fontcolor']) : '';

$option8['sfsi_form_heading_fontsize']     = (isset($option8['sfsi_form_heading_fontsize'])) ? intval($option8['sfsi_form_heading_fontsize']) : '';

$option8['sfsi_form_heading_fontalign'] = (isset($option8['sfsi_form_heading_fontalign'])) ? sanitize_text_field($option8['sfsi_form_heading_fontalign']) : '';

$option8['sfsi_form_field_text']         = (isset($option8['sfsi_form_field_text'])) ? sanitize_text_field($option8['sfsi_form_field_text']) : '';

$option8['sfsi_form_field_font']         = (isset($option8['sfsi_form_field_font'])) ? sanitize_text_field($option8['sfsi_form_field_font']) : '';

$option8['sfsi_form_field_fontstyle']     = (isset($option8['sfsi_form_field_fontstyle'])) ? sanitize_text_field($option8['sfsi_form_field_fontstyle']) : '';

$option8['sfsi_form_field_fontcolor']     = (isset($option8['sfsi_form_field_fontcolor'])) ? sfsi_sanitize_hex_color($option8['sfsi_form_field_fontcolor']) : '';

$option8['sfsi_form_field_fontsize']     = (isset($option8['sfsi_form_field_fontsize'])) ? intval($option8['sfsi_form_field_fontsize']) : '';

$option8['sfsi_form_field_fontalign']    = (isset($option8['sfsi_form_field_fontalign'])) ? sanitize_text_field($option8['sfsi_form_field_fontalign']) : '';

$option8['sfsi_form_button_text']         = (isset($option8['sfsi_form_button_text'])) ? sanitize_text_field($option8['sfsi_form_button_text']) : '';

$option8['sfsi_form_button_font']         = (isset($option8['sfsi_form_button_font'])) ? sanitize_text_field($option8['sfsi_form_button_font']) : '';

$option8['sfsi_form_button_fontstyle']     = (isset($option8['sfsi_form_button_fontstyle'])) ? sanitize_text_field($option8['sfsi_form_button_fontstyle']) : '';

$option8['sfsi_form_button_fontcolor']     = (isset($option8['sfsi_form_button_fontcolor'])) ? sfsi_sanitize_hex_color($option8['sfsi_form_button_fontcolor']) : '';

$option8['sfsi_form_button_fontsize']     = (isset($option8['sfsi_form_button_fontsize'])) ? intval($option8['sfsi_form_button_fontsize']) : '';

$option8['sfsi_form_button_fontalign']     = (isset($option8['sfsi_form_button_fontalign'])) ? sanitize_text_field($option8['sfsi_form_button_fontalign']) : '';

$option8['sfsi_form_button_background'] = (isset($option8['sfsi_form_button_background'])) ? sfsi_sanitize_hex_color($option8['sfsi_form_button_background']) : '';

?>

<!-- Section 8 "Do you want to show a subscription form (increases sign ups)?" main div Start -->

<div class="tab8">
    <?php
    $connectToFeed = "http://api.follow.it/?" . base64_encode("userprofile=wordpress&feed_id=" . $feedId);
    ?>
    <p>
        <?php _e("In addition to the email- and follow-icon you can also show a subscription form which maximizes chances that people subscribe to your site.",'ultimate-social-media-icons') ?>
    </p>
    <p class='sfsi_subscribe_popbox_link'>
    <?php 
		printf(
            __( 'To get access to the emails who subscribe, interesting statistics about your subscribers, alerts when people subscribe or unsubscribe and to tailor the sender name & the subject line of the emails, please %1s click here.%2s','ultimate-social-media-icons' ),
            '<a class="pop-up" href="javascript:" data-id="sfsi_feedClaimingOverlay">',
            '</a>'
		);
	?>
    </p>
    <div class="sfsi_tab8_container">
        <!--Section 1-->
        <div class="sfsi_tab8_subcontainer">
            <!-- <h3 class="sfsi_section_title">Preview:</h3> -->
            <h4 class="sfsi_section_title"><?php _e("Preview:",'ultimate-social-media-icons') ?></h4>
            <div class="like_pop_box">
                <?php get_sfsiSubscriptionForm(); ?>
            </div>
        </div>
        <!--Section 2-->
        <div class="sfsi_tab8_subcontainer sfsi_seprater">
            <!-- <h3 class="sfsi_section_title">Place it on your site</h3> -->
            <h4 class="sfsi_section_title"><?php _e("Place it on your site",'ultimate-social-media-icons') ?></h4>
            <label class="sfsi_label_text"><?php _e("You can place the form by different methods:",'ultimate-social-media-icons') ?></label>
            <ul class="sfsi_form_info">

                <li><b><?php _e("1. Widget:",'ultimate-social-media-icons') ?></b><?php _e("Go to the ",'ultimate-social-media-icons') ?><a target="_blank" href="<?php echo site_url() ?>/wp-admin/widgets.php"><?php _e("widget settings<",'ultimate-social-media-icons') ?>/a><?php _e(" and drag & drop it to the sidebar.",'ultimate-social-media-icons') ?></li>
                <li><b><?php _e("2. Shortcode:",'ultimate-social-media-icons') ?></b> <?php _e("Use the shortcode",'ultimate-social-media-icons') ?> <b><?php _e("[USM_form]",'ultimate-social-media-icons') ?></b><?php _e(" to place it into your codes",'ultimate-social-media-icons') ?></li>
                <li><b><?php _e("3. Copy & paste HTML code:",'ultimate-social-media-icons') ?></b></li>
            </ul>

            <div class="sfsi_html" style="display: none;">

                <?php
                $sfsi_feediid = sanitize_text_field(get_option('sfsi_feed_id'));
                $url = "https://api.follow.it/subscription-form/";
                $url = $url . $sfsi_feediid . '/8/';
                ?>

                <div class="sfsi_subscribe_Popinner" style="padding: 18px 0px;">

                    <form method="post" onsubmit="return sfsi_processfurther(this);" target="popupwindow" action="<?php echo $url ?>" style="margin: 0px 20px;">

                    <h5 style="margin: 0 0 10px; padding: 0;"><?php _e("Get new posts by email:",'ultimate-social-media-icons') ?></h5>

                        <div style="margin: 5px 0; width: 100%;">

                            <input style="padding: 10px 0px !important; width: 100% !important;" type="email" placeholder="Enter your email" name="email" />

                        </div>

                        <div style="margin: 5px 0; width: 100%;">
						<input type="hidden" name="action" value="followPub">

                            <input style="padding: 10px 0px !important; width: 100% !important;" type="submit" name="subscribe" />

                        </div>

                    </form>

                </div>

            </div>

            <div class="sfsi_subscription_html">

                <xmp id="selectable" onclick="selectText('selectable')">

                    <?php get_sfsiSubscriptionForm(); ?>

                </xmp>

            </div>

        </div>

        <!--Section 3-->

        <div class="sfsi_tab8_subcontainer sfsi_seprater">

            <!-- <h3 class="sfsi_section_title">Define text & design (optional)</h3> -->

            <h4 class="sfsi_section_title"><?php _e("Define text & design (optional)",'ultimate-social-media-icons') ?></h4>

            <h5 class="sfsi_section_subtitle"><?php _e("Overall size & border",'ultimate-social-media-icons') ?></h5>

            <!--Left Section-->

            <div class="sfsi_left_container">

                <?php get_sfsiSubscriptionForm(); ?>

            </div>

            <!--Right Section-->

            <div class="sfsi_right_container">

                <div class="row_tab">

                    <label class="sfsi_heding"><?php _e("Adjust size to space on the website?",'ultimate-social-media-icons') ?></label>

                    <ul class="border_shadow">

                        <li>

                            <input type="radio" class="styled" value="yes" name="sfsi_form_adjustment" <?php echo isChecked($option8['sfsi_form_adjustment'], 'yes'); ?>>

                            <label><?php _e("Yes",'ultimate-social-media-icons') ?></label>

                        </li>

                        <li>

                            <input type="radio" class="styled" value="no" name="sfsi_form_adjustment" <?php echo isChecked($option8['sfsi_form_adjustment'], 'no'); ?>>

                            <label><?php _e("No",'ultimate-social-media-icons') ?></label>

                        </li>

                    </ul>

                </div>

                <!--Row Section-->

                <div class="row_tab" style="<?php echo ($option8['sfsi_form_adjustment'] == 'yes') ? "display:none" : ''; ?>">

                    <div class="sfsi_field">

                        <label><?php _e("Height",'ultimate-social-media-icons') ?></label>

                        <input name="sfsi_form_height" type="text" value="<?php echo ($option8['sfsi_form_height'] != '') ?  $option8['sfsi_form_height'] : ''; ?>" class="small rec-inp" /><span class="pix">pixels</span>

                    </div>

                    <div class="sfsi_field">

                        <label><?php _e("Width",'ultimate-social-media-icons') ?></label>

                        <input name="sfsi_form_width" type="text" value="<?php echo ($option8['sfsi_form_width'] != '') ?  $option8['sfsi_form_width'] : ''; ?>" class="small rec-inp" /><span class="pix">pixels</span>

                    </div>

                </div>

                <!--Row Section-->

                <div class="row_tab">

                    <label class="sfsi_heding"><?php _e("Border?",'ultimate-social-media-icons') ?></label>

                    <ul class="border_shadow">

                        <li>

                            <input type="radio" class="styled" value="yes" name="sfsi_form_border" <?php echo isChecked($option8['sfsi_form_border'], 'yes'); ?>>

                            <label><?php _e("Yes",'ultimate-social-media-icons') ?></label>

                        </li>

                        <li>

                            <input type="radio" class="styled" value="no" name="sfsi_form_border" <?php echo isChecked($option8['sfsi_form_border'], 'no'); ?>>

                            <label><?php _e("No",'ultimate-social-media-icons') ?></label>

                        </li>

                    </ul>

                </div>

                <!--Row Section-->

                <div class="row_tab" style="<?php echo ($option8['sfsi_form_border'] == 'no') ? "display:none" : ''; ?>">

                    <div class="sfsi_field">

                        <label><?php _e("Thickness",'ultimate-social-media-icons') ?></label>

                        <input name="sfsi_form_border_thickness" type="text" value="<?php echo ($option8['sfsi_form_border_thickness'] != '')

                                                                                        ? $option8['sfsi_form_border_thickness'] : '';

                                                                                    ?>" class="small rec-inp" /><span class="pix"><?php _e("pixels",'ultimate-social-media-icons') ?></span>

                    </div>

                    <div class="sfsi_field">

                        <label><?php _e("Color",'ultimate-social-media-icons') ?></label>

                        <input id="sfsi_form_border_color" data-default-color="#b5b5b5" type="text" name="sfsi_form_border_color" value="<?php echo ($option8['sfsi_form_border_color'] != '')

                                                                                                                                                ? $option8['sfsi_form_border_color'] : '';

                                                                                                                                            ?>">

                        <!--div class="color_box">

                            <div class="corner"></div>

                            <div id="sfsiFormBorderColor" class="color_box1" style="background: <?php
                                                                                                ?>"></div>

                        </div-->

                    </div>

                </div>

                <!--Row Section-->

                <div class="row_tab">

                    <label class="sfsi_heding autowidth"><?php _e("Background color:",'ultimate-social-media-icons') ?></label>


                    <div class="sfsi_field">

                        <input id="sfsi_form_background" data-default-color="#b5b5b5" type="text" name="sfsi_form_background" value="<?php echo ($option8['sfsi_form_background'] != '')

                                                                                                                                            ? $option8['sfsi_form_background'] : '';

                                                                                                                                        ?>">

                        <!--div class="color_box">

                            <div class="corner"></div>

                            <div id="sfsiFormBackground" class="color_box1" style="background: <?php
                                                                                                ?>"></div>

                        </div-->

                    </div>

                </div>

                <!--Row Section-->

            </div>

        </div>

        <!--Section 4-->

        <div class="sfsi_tab8_subcontainer sfsi_seprater">

            <h5 class="sfsi_section_subtitle"><?php _e("Text above the entry field",'ultimate-social-media-icons') ?></h5>

            <!--Left Section-->

            <div class="sfsi_left_container">

                <?php get_sfsiSubscriptionForm("h5"); ?>

            </div>

            <!--Right Section-->

            <div class="sfsi_right_container">

                <div class="row_tab">

                    <label class="sfsi_heding fixwidth sfsi_same_width"><?php _e("Text:",'ultimate-social-media-icons') ?></label>

                    <div class="sfsi_field">

                        <input type="text" class="small new-inp" name="sfsi_form_heading_text" value="<?php echo ($option8['sfsi_form_heading_text'] != '')

                                                                                                            ? $option8['sfsi_form_heading_text'] : '';

                                                                                                        ?>" />

                    </div>

                </div>

                <!--Row Section-->

                <div class="row_tab">

                    <div class="sfsi_field">

                        <label class="sfsi_same_width"><?php _e("Font:",'ultimate-social-media-icons') ?></label>

                        <?php sfsi_get_font("sfsi_form_heading_font", $option8['sfsi_form_heading_font']); ?>

                    </div>

                    <div class="sfsi_field">

                        <label><?php _e("Font style:",'ultimate-social-media-icons') ?></label>

                        <?php sfsi_get_fontstyle("sfsi_form_heading_fontstyle", $option8['sfsi_form_heading_fontstyle']); ?>

                    </div>

                </div>

                <!--Row Section-->

                <div class="row_tab">

                    <div class="sfsi_field">

                        <label class="sfsi_same_width"><?php _e("Font color:",'ultimate-social-media-icons') ?></label>

                        <div class="sfsi_field" style="padding-top:0px;">

                            <input type="text" name="sfsi_form_heading_fontcolor" data-default-color="#b5b5b5" id="sfsi_form_heading_fontcolor" value="<?php echo ($option8['sfsi_form_heading_fontcolor'] != '')

                                                                                                                                                            ? $option8['sfsi_form_heading_fontcolor'] : '';

                                                                                                                                                        ?>">

                        </div>

                        <!--div class="color_box">

                            <div class="corner"></div>

                            <div class="color_box1" id="sfsiFormHeadingFontcolor" style="background: <?php //echo ($option8['sfsi_form_heading_fontcolor']!='') ? $option8['sfsi_form_heading_fontcolor'] : '' ;

                                                                                                        ?>"></div>

                        </div-->

                    </div>

                    <div class="sfsi_field">

                        <label><?php _e("Font size:",'ultimate-social-media-icons') ?></label>

                        <input type="text" class="small rec-inp" name="sfsi_form_heading_fontsize" value="<?php echo ($option8['sfsi_form_heading_fontsize'] != '')

                                                                                                                ? $option8['sfsi_form_heading_fontsize'] : ''; ?>" />

                        <span class="pix"><?php _e("pixels",'ultimate-social-media-icons') ?></span>

                    </div>

                </div>

                <!--Row Section-->

                <div class="row_tab">

                    <div class="sfsi_field">

                        <label class="sfsi_same_width"><?php _e("Alignment:",'ultimate-social-media-icons') ?></label>

                        <?php sfsi_get_alignment("sfsi_form_heading_fontalign", $option8['sfsi_form_heading_fontalign']); ?>

                    </div>

                </div>

                <!--End Section-->

            </div>

        </div>

        <!--Section 5-->

        <div class="sfsi_tab8_subcontainer sfsi_seprater">

            <h5 class="sfsi_section_subtitle"><?php _e("Entry field",'ultimate-social-media-icons') ?></h5>

            <!--Left Section-->

            <div class="sfsi_left_container">

                <?php get_sfsiSubscriptionForm("email"); ?>

            </div>

            <!--Right Section-->

            <div class="sfsi_right_container">

                <div class="row_tab">

                    <label class="sfsi_heding fixwidth sfsi_same_width"><?php _e("Text:",'ultimate-social-media-icons') ?></label>

                    <div class="sfsi_field">

                        <input type="text" class="small new-inp" name="sfsi_form_field_text" value="<?php echo ($option8['sfsi_form_field_text'] != '')

                                                                                                        ? $option8['sfsi_form_field_text'] : '';

                                                                                                    ?>" />

                    </div>

                </div>

                <!--Row Section-->

                <div class="row_tab">

                    <div class="sfsi_field">

                        <label class="sfsi_same_width"><?php _e("Font:",'ultimate-social-media-icons') ?></label>

                        <?php sfsi_get_font("sfsi_form_field_font", $option8['sfsi_form_field_font']); ?>

                    </div>

                    <div class="sfsi_field">

                        <label><?php _e("Font style:",'ultimate-social-media-icons') ?></label>

                        <?php sfsi_get_fontstyle("sfsi_form_field_fontstyle", $option8['sfsi_form_field_fontstyle']); ?>

                    </div>

                </div>

                <!--Row Section-->

                <div class="row_tab">

                    <input type="hidden" name="sfsi_form_field_fontcolor" value="">

                    <!--<div class="sfsi_field">

                    	<label class="sfsi_same_width">Font color</label>

                        <input type="text" name="sfsi_form_field_fontcolor" class="small color-code" id="sfsi_form_field_fontcolor" value="<?php //echo ($option8['sfsi_form_field_fontcolor']!='')

                                                                                                                                            //? $option8['sfsi_form_field_fontcolor'] : '' ;

                                                                                                                                            ?>">

                        <div class="color_box">

                            <div class="corner"></div>

                            <div class="color_box1" id="sfsiFormFieldFontcolor" style="background: <?php //echo ($option8['sfsi_form_field_fontcolor']!='') ? $option8['sfsi_form_field_fontcolor'] : '' ;

                                                                                                    ?>"></div>

                        </div>

                    </div>-->

                    <div class="sfsi_field">

                        <label class="sfsi_same_width"><?php _e("Alignment:",'ultimate-social-media-icons') ?></label>

                        <?php sfsi_get_alignment("sfsi_form_field_fontalign", $option8['sfsi_form_field_fontalign']); ?>

                    </div>

                    <div class="sfsi_field">

                        <label><?php _e("Font size:",'ultimate-social-media-icons') ?></label>

                        <input type="text" class="small rec-inp" name="sfsi_form_field_fontsize" value="<?php echo ($option8['sfsi_form_field_fontsize'] != '')

                                                                                                            ? $option8['sfsi_form_field_fontsize'] : ''; ?>" />

                        <span class="pix"><?php _e("pixels",'ultimate-social-media-icons') ?></span>

                    </div>

                </div>

                <!--End Section-->

            </div>

        </div>

        <!--Section 6-->

        <div class="sfsi_tab8_subcontainer">

            <h5 class="sfsi_section_subtitle"><?php _e("Subscribe button",'ultimate-social-media-icons') ?></h5>

            <!--Left Section-->

            <div class="sfsi_left_container">

                <?php get_sfsiSubscriptionForm("submit"); ?>

            </div>

            <!--Right Section-->

            <div class="sfsi_right_container">

                <div class="row_tab">

                    <label class="sfsi_heding fixwidth sfsi_same_width"><?php _e("Text:",'ultimate-social-media-icons') ?></label>

                    <div class="sfsi_field">

                        <input type="text" class="small new-inp" name="sfsi_form_button_text" value="<?php echo ($option8['sfsi_form_button_text'] != '')

                                                                                                            ? $option8['sfsi_form_button_text'] : '';

                                                                                                        ?>" />

                    </div>

                </div>

                <!--Row Section-->

                <div class="row_tab">

                    <div class="sfsi_field">

                        <label class="sfsi_same_width"><?php _e("Font:",'ultimate-social-media-icons') ?></label>

                        <?php sfsi_get_font("sfsi_form_button_font", $option8['sfsi_form_button_font']); ?>

                    </div>

                    <div class="sfsi_field">

                        <label><?php _e("Font style:",'ultimate-social-media-icons') ?></label>

                        <?php sfsi_get_fontstyle("sfsi_form_button_fontstyle", $option8['sfsi_form_button_fontstyle']); ?>

                    </div>

                </div>

                <!--Row Section-->

                <div class="row_tab">

                    <div class="sfsi_field">

                     <label class="sfsi_same_width"><?php _e("Font color:",'ultimate-social-media-icons') ?></label>

                        <div class="sfsi_field" style="padding-top:0px;">

                            <input type="text" name="sfsi_form_button_fontcolor" data-default-color="#b5b5b5" id="sfsi_form_button_fontcolor" value="<?php echo ($option8['sfsi_form_button_fontcolor'] != '')

                                                                                                                                                            ? $option8['sfsi_form_button_fontcolor'] : '';

                                                                                                                                                        ?>">

                        </div>

                        <!--div class="color_box">

                            <div class="corner"></div>

                            <div class="color_box1" id="sfsiFormButtonFontcolor" style="background: <?php //echo ($option8['sfsi_form_button_fontcolor']!='') ? $option8['sfsi_form_button_fontcolor'] : '' ;

                                                                                                    ?>"></div>

                        </div-->

                    </div>

                    <div class="sfsi_field">

                        <label><?php _e("Font size",'ultimate-social-media-icons') ?>:</label>

                        <input type="text" class="small rec-inp" name="sfsi_form_button_fontsize" value="<?php echo ($option8['sfsi_form_button_fontsize'] != '')

                                                                                                                ? $option8['sfsi_form_button_fontsize'] : ''; ?>" />

                        <span class="pix"><?php _e("pixels",'ultimate-social-media-icons') ?></span>

                    </div>

                </div>

                <!--Row Section-->

                <div class="row_tab">

                    <div class="sfsi_field">

                        <label class="sfsi_same_width"><?php _e("Alignment:",'ultimate-social-media-icons') ?></label>

                        <?php sfsi_get_alignment("sfsi_form_button_fontalign", $option8['sfsi_form_button_fontalign']); ?>

                    </div>

                </div>

                <!--Row Section-->

                <div class="row_tab">

                    <div class="sfsi_field">

                        <label class="sfsi_same_width"><?php _e("Button color:",'ultimate-social-media-icons') ?></label>

                        <div class="sfsi_field">

                            <input type="text" name="sfsi_form_button_background" data-default-color="#b5b5b5" id="sfsi_form_button_background" value="<?php echo ($option8['sfsi_form_button_background'] != '')

                                                                                                                                                            ? $option8['sfsi_form_button_background'] : '';

                                                                                                                                                        ?>">

                        </div>

                        <!--div class="color_box">

                            <div class="corner"></div>

                            <div class="color_box1" id="sfsiFormButtonBackground" style="background: <?php //echo ($option8['sfsi_form_button_background']!='') ? $option8['sfsi_form_button_background'] : '' ;

                                                                                                        ?>"></div>

                        </div-->

                    </div>

                </div>

                <!--End Section-->

            </div>

        </div>

        <!-- by developer 28-5-2019 -->

        <div class="row_tab">

            <p><b><?php _e("New:",'ultimate-social-media-icons') ?></b><?php _e("In the Premium Plugin you can choose to display the text on subscribe form in a font already present in your theme.",'ultimate-social-media-icons') ?> </b> <a href="https://www.ultimatelysocial.com/usm-premium/?utm_source=usmi_settings_page&utm_campaign=subscribe_form_note&utm_medium=link" target="_blank" style="color:#00a0d2 !important; text-decoration: none !important;"><?php _e("Check it out.",'ultimate-social-media-icons') ?></a></p>

        </div>

        <!-- end -->

        <!--Section End-->

    </div>

    <?php sfsi_ask_for_help(8); ?>

    <!-- SAVE BUTTON SECTION   -->

    <div class="save_button">

        <img src="<?php echo SFSI_PLUGURL ?>images/ajax-loader.gif" class="loader-img" alt="error" />

        <?php $nonce = wp_create_nonce("update_step8"); ?>

        <a href="javascript:;" id="sfsi_save8" title="Save" data-nonce="<?php echo $nonce; ?>">Save</a>

    </div>

    <!-- END SAVE BUTTON SECTION   -->

    <a class="sfsiColbtn closeSec" href="javascript:;"><?php _e("Collapse area",'ultimate-social-media-icons') ?></a>

    <label class="closeSec"></label>

    <!-- ERROR AND SUCCESS MESSAGE AREA-->

    <p class="red_txt errorMsg" style="display:none"> </p>

    <p class="green_txt sucMsg" style="display:none"> </p>

    <div class="clear"></div>

</div>

<!-- END Section 8 "Do you want to show a subscription form (increases sign ups)?" main div Start -->

<?php

function isChecked($givenVal, $value)

{

    if ($givenVal == $value)

        return 'checked="true"';

    else

        return '';
}

function isSeletcted($givenVal, $value)

{

    if ($givenVal == $value)

        return 'selected="true"';

    else

        return '';
}

function sfsi_get_font($name, $value)

{

    ?>

    <select name="<?php echo $name; ?>" id="<?php echo $name; ?>" class="select-same">

        <option value="Arial, Helvetica, sans-serif" <?php echo isSeletcted("Arial, Helvetica, sans-serif", $value) ?>>

            <?php _e("Arial",'ultimate-social-media-icons') ?>

        </option>

        <option value="Arial Black, Gadget, sans-serif" <?php echo isSeletcted("Arial Black, Gadget, sans-serif", $value) ?>>

            <?php _e("Arial Black",'ultimate-social-media-icons') ?>

        </option>

        <option value="Calibri" <?php echo isSeletcted("Calibri", $value) ?>><?php _e("Calibri",'ultimate-social-media-icons') ?></option>

        <option value="Comic Sans MS" <?php echo isSeletcted("Comic Sans MS", $value) ?>><?php _e("Comic Sans MS",'ultimate-social-media-icons') ?></option>

        <option value="Courier New" <?php echo isSeletcted("Courier New", $value) ?>><?php _e("Courier New",'ultimate-social-media-icons') ?></option>

        <option value="Georgia" <?php echo isSeletcted("Georgia", $value) ?>><?php _e("Georgia",'ultimate-social-media-icons') ?></option>

        <option value="Helvetica,Arial,sans-serif" <?php echo isSeletcted("Helvetica,Arial,sans-serif", $value) ?>>

            <?php _e("Helvetica",'ultimate-social-media-icons') ?>

        </option>

        <option value="Impact" <?php echo isSeletcted("Impact", $value) ?>><?php _e("Impact",'ultimate-social-media-icons') ?></option>

        <option value="Lucida Console" <?php echo isSeletcted("Lucida Console", $value) ?>><?php _e("Lucida Console",'ultimate-social-media-icons') ?></option>

        <option value="Tahoma,Geneva" <?php echo isSeletcted("Tahoma,Geneva", $value) ?>><?php _e("Tahoma",'ultimate-social-media-icons') ?></option>

        <option value="Times New Roman" <?php echo isSeletcted("Times New Roman", $value) ?>><?php _e("Times New Roman",'ultimate-social-media-icons') ?></option>

        <option value="Trebuchet MS" <?php echo isSeletcted("Trebuchet MS", $value) ?>><?php _e("Trebuchet MS",'ultimate-social-media-icons') ?></option>

        <option value="Verdana" <?php echo isSeletcted("Verdana", $value) ?>><?php _e("Verdana",'ultimate-social-media-icons') ?></option>

    </select>

<?php

}

function sfsi_get_fontstyle($name, $value)

{

    ?>

    <select name="<?php echo $name; ?>" id="<?php echo $name; ?>" class="select-same">

        <option value="normal" <?php echo isSeletcted("normal", $value) ?>><?php _e("Normal",'ultimate-social-media-icons') ?></option>

        <option value="inherit" <?php echo isSeletcted("inherit", $value) ?>><?php _e("Inherit",'ultimate-social-media-icons') ?></option>

        <option value="oblique" <?php echo isSeletcted("oblique", $value) ?>><?php _e("Oblique",'ultimate-social-media-icons') ?></option>

        <option value="italic" <?php echo isSeletcted("italic", $value) ?>><?php _e("Italic",'ultimate-social-media-icons') ?></option>

        <option value="bold" <?php echo isSeletcted("bold", $value) ?>><?php _e("Bold",'ultimate-social-media-icons') ?></option>

    </select>

<?php

}

function sfsi_get_alignment($name, $value)

{

    ?>

    <select name="<?php echo $name; ?>" id="<?php echo $name; ?>" class="select-same">

        <option value="left" <?php echo isSeletcted("left", $value) ?>><?php _e("Left Align",'ultimate-social-media-icons') ?></option>

        <option value="center" <?php echo isSeletcted("center", $value) ?>><?php _e("Centered",'ultimate-social-media-icons') ?></option>

        <option value="right" <?php echo isSeletcted("right", $value) ?>><?php _e("Right Align",'ultimate-social-media-icons') ?></option>

    </select>

<?php

}

function get_sfsiSubscriptionForm($hglht = null)

{

    ?>

    <div class="sfsi_subscribe_Popinner">

        <div class="form-overlay"></div>

        <form method="post">

            <h5 <?php if ($hglht == "h5") {
                    echo 'class="sfsi_highlight"';
                } ?>><?php _e("Get new posts by email:",'ultimate-social-media-icons') ?></h5>

            <div class="sfsi_subscription_form_field">

                <input type="email" name="email" placeholder="Enter your email" value="" <?php if ($hglht == "email") {
                                                                                                            echo 'class="sfsi_highlight"';
                                                                                                        } ?> />

            </div>

            <div class="sfsi_subscription_form_field">

                <input type="submit" name="subscribe" value="Subscribe" <?php if ($hglht == "submit") {
                                                                            echo 'class="sfsi_highlight"';
                                                                        } ?> />

            </div>

        </form>

    </div>

<?php

}