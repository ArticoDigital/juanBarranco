<?php

require_once "Schema.php";

function insertGallery($schema, $id, $name, array $images){
    $schema->insert('sp_gallery', [
        'id' => $id,
        'name' => $name,
        'slug' => str_replace(' ', '-', strtolower($name)),
        'updated_at' => date('Y-m-d')
    ]);

    foreach ($images as $image) :
        $schema->insert('sp_images', [
            'name' => $image,
            'gallery_id' => $id
        ]);
    endforeach;
}

function wp_swiper_activation_hook() {

    $schema = new Schema;
    $schema->create('sp_gallery', [
        'id INT PRIMARY KEY AUTO_INCREMENT',
        'name VARCHAR(100) NOT NULL',
        'slug VARCHAR(100) NOT NULL',
        'updated_at DATE NOT NULL'
    ]);

    $schema->create('sp_images', [
        'id INT PRIMARY KEY AUTO_INCREMENT',
        'name VARCHAR(500) NOT NULL',
        'gallery_id INT NOT NULL',
        'CONSTRAINT images_gallery_fk FOREIGN KEY (gallery_id) REFERENCES ' . $schema->getPrefix('sp_gallery') . ' (id)'
    ]);

    insertGallery($schema, 1, 'Galeria 1', [
        plugins_url('swiper/public/images/1.jpg'),
        plugins_url('swiper/public/images/4.jpg'),
        plugins_url('swiper/public/images/5.jpg'),
    ]);

    insertGallery($schema, 2, 'Galeria 2', [
        plugins_url('swiper/public/images/2.png')
    ]);

    insertGallery($schema, 3, 'Galeria 3', [
        plugins_url('swiper/public/images/3.png')
    ]);

    insertGallery($schema, 4, 'Casos de exito', [
        plugins_url('swiper/public/images/archimate.png'),
        plugins_url('swiper/public/images/cobit2.png'),
        plugins_url('swiper/public/images/isaca.png'),
        plugins_url('swiper/public/images/itil.jpg'),
        plugins_url('swiper/public/images/ogc.jpg'),
        plugins_url('swiper/public/images/open1.jpg'),
        plugins_url('swiper/public/images/oracle1.png'),
        plugins_url('swiper/public/images/togaf.png'),
        plugins_url('swiper/public/images/togaf2.png')
    ]);
}