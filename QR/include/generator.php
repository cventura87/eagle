        <div class="container">
            <div class="row mt-3">
                <div class="col-md-8 bg-white pt-3 mb-3">
                    <div id="alert_placeholder">
                        <?php
                        if (strlen($_ERROR) > 0) { ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert">
                                    <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                                </button><?php echo $_ERROR; ?>
                            </div>
                        <?php
                        } ?>
                    </div>
                    <div class="row">
                    <?php 
                    if ($_CONFIG['uploader'] == true) { ?>
                        <div class="col-12 mb-2">
                            <form method="post" enctype="multipart/form-data" id="sottometti">
                                <span class="btn btn-outline-primary btn-file">
                                    <i class="fa fa-upload"></i> 
                                    <input type="file" name="file" id="file">
                                </span>
                                <label><?php echo getString('upload_or_select_watermark'); ?></label>
                            </form>
                        </div>
                    <?php 
                    }
                        /**
                        * Marcas de agua
                        */ ?>
                        <form role="form" id="create" class="needs-validation" novalidate>
                            <input type="submit" class="d-none">
                            <input type="hidden" name="section" id="getsec" value="<?php echo $getsection; ?>">
                        <?php 
                        //
                        // Marcas de agua por defecto
                        //
                        $waterdir = "images/watermarks/";
                        $watermarks = glob($waterdir.'*.{gif,jpg,png}', GLOB_BRACE);
                        $count = count($watermarks);
                        if ($_CONFIG['uploader'] == true || $count > 0) { ?>
                            <div class="col-12">
                                <div class="logoselecta form-group">
                                    <div class="btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-light p-1 <?php if ($optionlogo == "none" && $uploaded == false) echo "active"; ?>" 
                                            data-toggle="tooltip" data-placement="bottom">
                                            <input type="radio" name="optionlogo" value="none"
                                            <?php if ($optionlogo == "none" && $uploaded == false) echo "checked"; ?>>
                                            <img class="img-fluid" src="images/x.png">
                                        </label>
                                        <?php 
                                        foreach ($watermarks as $key => $water) {
                                            echo '<label class="btn btn-light p-1';
                                            if ($optionlogo == $water) echo ' active ';
                                            echo '" data-toggle="tooltip" data-placement="bottom">
                                            <input type="radio" name="optionlogo" value="'.$water.'"';
                                            if ($optionlogo == $water) echo ' checked';
                                            echo ' id="optionlogo'.$key.'"><img src="'.$water.'"></label>';
                                        }

                                        if ($logo && $upthumb) { ?>
                                            <label class="btn btn-light p-1 <?php if ($optionlogo == $upthumb || $uploaded == true) echo "active"; ?>">
                                                <input type="radio" name="optionlogo" id="optionsRadios6" value="<?php echo $upthumb; ?>"
                                                <?php if ($optionlogo == $upthumb || $uploaded == true) echo "checked"; ?>>
                                                <img src="<?php echo $upthumb; ?>">
                                            </label>
                                            <?php
                                        } ?>
                                    </div>
                                </div>
                            </div>
                            <?php 
                        }
                        /**
                        * CONFIGURACIÓN PRINCIPAL DEL CÓDIGO QR
                        */
                        ?>  
                            <div class="col-sm-12 mb-2">
                                <div class="row">
                                    <div class="col-6 col-md-3">
                                        <label><?php echo getString('background'); ?></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text getcol"><i class="fa fa-qrcode fa-lg"></i></span>
                                            </div>
                                            <input type="text" class="form-control colorpickerback" data-format="hex" 
                                            value="<?php echo $stringbackcolor; ?>" name="backcolor">
                                        </div>
                                    </div>

                                    <div class="col-6 col-md-3">
                                        <label><?php echo getString('foreground'); ?></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text getcol"><i class="fa fa-qrcode fa-lg"></i></span>
                                            </div>
                                            <input type="text" class="form-control colorpickerfront" data-format="hex" 
                                            value="<?php echo $stringfrontcolor; ?>" name="frontcolor">
                                        </div>
                                    </div>

                                    <div class="col-6 col-md-3">
                                        <label><?php echo getString('size'); ?></label>
                                        <select name="size" class="custom-select">
                                    <?php
                                    for ($i=8; $i<=32; $i+=4) {
                                        $value = $i*25;
                                        echo '<option value="'.$i.'" '.( $matrixPointSize == $i ? 'selected' : '' ) . '>'.$value.'</option>';
                                    }; ?>
                                        </select>
                                    </div>

                                    <div class="col-6 col-md-3">
                                        <label><?php echo getString('error_correction_level'); ?></label>
                                        <select name="level" class="custom-select">
                                            <option value="L" <?php if ($errorCorrectionLevel=="L") echo "selected"; ?>>
                                                <?php echo getString('precision_l'); ?>
                                            </option>
                                            <option value="M" <?php if ($errorCorrectionLevel=="M") echo "selected"; ?>>
                                                <?php echo getString('precision_m'); ?>
                                            </option>
                                            <option value="Q" <?php if ($errorCorrectionLevel=="Q") echo "selected"; ?>>
                                                <?php echo getString('precision_q'); ?>
                                            </option>
                                            <option value="H" <?php if ($errorCorrectionLevel=="H") echo "selected"; ?>>
                                                <?php echo getString('precision_h'); ?>
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-sm-12">
                                <div class="custom-control custom-switch">
                                  <input type="checkbox" class="custom-control-input" id="trans-bg" name="transparent">
                                  <label class="custom-control-label" for="trans-bg"><?php echo getString('transparent_background'); ?></label>
                                </div>
                            </div>
                            <?php
                            $styles = array('default', 'circle', 'plus', '3d');
                            $styleselecta = '<div class="btn-group-toggle styleselecta d-inline-block" data-toggle="buttons">';
                            foreach ($styles as $key => $style) {
                                $activeattr = ($key == 0) ? 'checked' : '';
                                $activeclass = ($key == 0) ? 'active' : '';

                                $styleselecta .= '<label class="btn btn-light p-1 '.$activeclass.'">
                                    <input type="radio" name="style" value="'.$style.'" '.$activeattr.'>
                                    <img title="'.$style.'" class="img-fluid" src="images/styleselect-'.$style.'.jpg">
                                </label>';
                            }
                            $styleselecta .= '</div>';
                            ?>
                            <div class="col-sm-12 mb-2">
                                <?php echo $styleselecta; ?>
                            </div>

                            <?php 
                            /**
                            * Datos de QR
                            */ ?>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <ul class="nav nav-pills nav-fill" role="tablist">
                                    
                                    <?php 
                                     
                                    if ($_CONFIG['bitcoin'] == true) { ?>
                                        <li class="nav-item">
                                            <a class="nav-link<?php if ($getsection == "#bitcoin") echo " active"; ?>" href="#bitcoin" role="tab" data-toggle="tab"><i class="fa fa-bitcoin"></i> <span class="d-none d-sm-inline-block"><?php echo getString('bitcoin'); ?></span></a>
                                        </li>
                                    <?php 
                                    } ?>

                                    </ul>
                                    <div class="tab-content mt-3">
                                    <?php
                                  
                                    require 'tab-bitcoin.php';
                                    ?>
                                    </div> <!-- tab content -->
                                </div> <!-- form group -->
                            </div><!-- col sm12-->
                        </form>
                    </div> <!-- row -->
                </div><!-- col sm-8 -->

                <div class="col-md-4">
                    <?php 
                    //
                    // FINAL QR CODE placeholder
                    //
                    ?>
                    <div class="placeresult">
                        <div class="form-group text-center wrapresult">
                            <div class="resultholder">
                                <img class="img-fluid" src="<?php echo $_CONFIG['placeholder']; ?>" />
                                <div class="infopanel"></div>
                            </div>
                        </div>
                        <div class="preloader"><i class="fa fa-cog fa-spin"></i></div>
                        <div class="form-group text-center linksholder"></div>
                        <button class="btn btn-lg btn-block btn-primary ellipsis" id="submitcreate">
                        <i class="fa fa-magic"></i> <?php echo getString('generate_qrcode'); ?></button>
                    </div>
                </div><!-- col sm4-->
            </div><!-- row -->
        </div><!-- container -->
