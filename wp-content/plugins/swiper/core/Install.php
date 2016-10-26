<?php

require_once "Schema.php";

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
        'name VARCHAR(100) NOT NULL',
        'gallery_id INT NOT NULL',
        'CONSTRAINT images_gallery_fk FOREIGN KEY (gallery_id) REFERENCES ' . $schema->getPrefix('sp_gallery') . ' (id)'
    ]);
}