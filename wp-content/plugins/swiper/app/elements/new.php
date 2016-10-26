<div class="wrap">
    <?php
        if(isset($_GET['error'])) {
            echo $_GET['error'];
        }
    ?>
    <h1><?= esc_html('Nueva galería'); ?></h1>
    <form action="<?= admin_url('admin.php') ?>" method="post">
        <input type="hidden" name="action" value="create">
        <div id="poststuff">
            <div id="post-body" class="metabox-holder">
                <div id="post-body-content" style="position: relative;">
                    <div id="titlediv">
                        <div id="titlewrap">
                            <input type="text" name="gallery_title" size="30" value="<?php if(isset($_GET['error'])) : echo $_GET['name']; endif ?>" id="title" spellcheck="true" autocomplete="off" placeholder="Introduce el nombre de la galería aquí">
                        </div>
                        <div id="postdivrich" class="postarea wp-editor-expand">
                            <div id="wp-content-wrap" class="wp-core-ui wp-editor-wrap tmce-active has-dfw" style="padding-top: 55px;">
                                <link rel="stylesheet" id="editor-buttons-css" href="http://juanbarranco.app/wp-includes/css/editor.min.css?ver=4.6.1" type="text/css" media="all">
                                <div id="wp-content-editor-tools" class="wp-editor-tools hide-if-no-js" style="position: absolute; top: 0; width: 849px;">
                                    <div id="wp-content-media-buttons" class="wp-media-buttons">
                                        <button type="button" id="insert-gallery" class="button add_media">
                                            <span class="wp-media-buttons-icon"></span>
                                            Añadir imágen
                                        </button>
                                    </div>
                                </div>

                                <div id="categorydiv" class="postbox ">
                                    <h2 class="hndle ui-sortable-handle">
                                        <span>Imágenes</span>
                                        <span style="font-weight: normal">(Arrastre y suelte las imágenes en la posición que requiera)</span>
                                    </h2>
                                    <div class="inside">
                                        <div id="images_div" class="categorydiv"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <input type="submit" class="button button-primary" value="Crear galería">
        <a href="admin.php?page=swiper/app/index.php" class="button button-primary">Cancelar</a>
    </form>
</div>

<script src="<?= plugins_url('swiper/public/js/media.js') ?>"></script>