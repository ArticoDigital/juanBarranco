<?php

add_action( 'admin_action_create', 'create_admin_action' );
add_action( 'admin_action_update', 'update_admin_action' );

/*** UPDATE GALLERY ***/

function update_admin_action(){
    $title = $_POST['gallery_title'];
    $id = $_POST['id'];

    if(count($_POST) < 3){
        wp_redirect(admin_url('admin.php?page=swiper/app/elements/new.php&name=' . str_replace(' ', '%20', $title) . '&error=' . str_replace(' ', '%20', 'Debe agregar al menos 1 imágen')));
    }
    else {
        $schema = new Schema;
        $schema->update('sp_gallery', [
            'name' => $title,
            'updated_at' => date('Y-m-d')
        ], [
            'id' => $id
        ]);

        $schema->delete('sp_images', ['gallery_id' => $id]);

        foreach ($_POST as $key => $item) {
            if (strpos($key, 'image') !== false){
                $schema->insert('sp_images', [
                    'name' => $item,
                    'gallery_id' => $id
                ]);
            }
        }

        wp_redirect(admin_url('admin.php?page=swiper/app/index.php'));
    }
}

/*** CREATE GALLERY ***/

function create_admin_action() {
    $title = $_POST['gallery_title'];

    if(count($_POST) < 3){
        wp_redirect(admin_url('admin.php?page=swiper/app/elements/new.php&name=' . str_replace(' ', '%20', $title) . '&error=' . str_replace(' ', '%20', 'Debe agregar al menos 1 imágen')));
    }
    else {
        $schema = new Schema;
        $gallery = $schema->insert('sp_gallery', [
            'name' => $_POST['gallery_title'],
            'slug' => str_replace(' ', '-', strtolower($_POST['gallery_title'])),
            'updated_at' => date('Y-m-d')
        ]);

        foreach ($_POST as $key => $item) {
            if (strpos($key, 'image') !== false){
                $schema->insert('sp_images', [
                    'name' => $item,
                    'gallery_id' => $gallery
                ]);
            }
        }

        wp_redirect(admin_url('admin.php?page=swiper/app/index.php'));
    }
}

/*** ADD MEDIA UPDATE SCRIPT ***/

if( is_admin() ) {
    function my_admin_load_styles_and_scripts() {
        $mode = get_user_option( 'media_library_mode', get_current_user_id() ) ? get_user_option( 'media_library_mode', get_current_user_id() ) : 'grid';
        $modes = array( 'grid', 'list' );
        if ( isset( $_GET['mode'] ) && in_array( $_GET['mode'], $modes ) ) {
            $mode = $_GET['mode'];
            update_user_option( get_current_user_id(), 'media_library_mode', $mode );
        }
        if( ! empty ( $_SERVER['PHP_SELF'] ) && 'upload.php' === basename( $_SERVER['PHP_SELF'] ) && 'grid' !== $mode ) {
            wp_dequeue_script( 'media' );
        }
        wp_enqueue_media();
    }
    add_action( 'admin_enqueue_scripts', 'my_admin_load_styles_and_scripts' );
}