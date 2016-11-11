<?php
    $schema = new Schema();
    $galleries = $schema->select('sp_gallery', '*');
?>

<div class="wrap">
    <h1>
        <?= esc_html(get_admin_page_title()); ?>
        <a href="admin.php?page=swiper/app/elements/new.php" class="page-title-action">Añadir nueva</a>
    </h1>
    <div class="wrap">
        <?php if(count($galleries)) :?>
        <table class="wp-list-table widefat fixed striped posts">
            <thead>
            <tr>
                <th scope="col" id="title" class="manage-column column-title column-primary sortable desc">
                    <a href="#"><span>Título</span></a>
                </th>
                <th scope="col" id="slug" class="manage-column column-title column-primary sortable desc">
                    <a href="#"><span>Número de imagenes</span></a>
                </th>
                <th scope="col" id="date" class="manage-column column-date sortable asc">
                    <a href="#"><span>Fecha</span></a>
                </th>
                <th scope="col" id="date" class="manage-column column-date sortable asc">
                    <a href="#"><span>Acciones</span></a>
                </th>
            </tr>
            </thead>

            <tbody id="the-list">
            <?php foreach($galleries as $key => $gallery) : ?>

            <tr id="post-<?= $gallery->id ?>" class="iedit author-self level-0 post-1 type-post status-publish format-standard hentry category-sin-categoria">
                <td class="title column-title has-row-actions column-primary page-title" data-colname="Título">
                    <strong>
                        <a class="row-title" href="admin.php?page=swiper/app/elements/edit.php&id=<?= $gallery->id ?>" aria-label="“<?= $gallery->name ?>” (Editar)"><?= $gallery->name ?></a>
                    </strong>
                </td>
                <td class="number-images">
                    <?php
                        $gal = $schema->select('sp_images', 'id', ['gallery_id' => $gallery->id]);
                    ?>
                    <span><?= count($gal) ?></span>
                </td>
                <td class="date column-date" data-colname="Fecha">Publicada<br>
                    <abbr title="<?= $gallery->updated_at ?>"><?= $gallery->updated_at ?></abbr>
                </td>
                <td>
                    <a href="admin.php?page=swiper/app/elements/edit.php&id=<?= $gallery->id ?>" type="submit" class="button button-secundary">Actualizar</a>
                </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <?php else : ?>
            <h3>No se han creado galerias</h3>
        <?php endif; ?>
    </div>
</div>