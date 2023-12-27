<div class="modal fade" id="edit-article-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Editer cet article ?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    ×
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo base_url('common/adminspace/dashboard/list_product'); ?>" enctype="multipart/form-data">
                    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" class="ci_csrf_data">
                    <?php if (isset($product['id_product'])) : ?>
                        <input type="hidden" name="id_product" value="<?= $product['id_product'] ?>">
                        <input type="hidden" name="action" value="editer">
                    <?php endif; ?> 
                    <div class="mb-4">
                        <label for="Nom_article" class="form-label">Nom Article</label>
                        <input type="text" class="form-control" name="Nom_article" placeholder="Veuillez saisir le nom de l'article" />
                        <?php if (isset($validation) && $validation->hasError('Nom_article')) {
                            echo "<div style='color: #ff0000'>" . $validation->getError('Nom_article') . "</div>";
                        } ?>
                    </div>
                    <div class="mb-4">
                        <label for="file" class="form-label">Image de l'Article</label>
                        <input type="file" class="form-control" name="file" placeholder="Veuillez selectionner l'image" />
                        <?php if (isset($validation) && $validation->hasError('file')) {
                            echo "<div style='color: #ff0000'>" . $validation->getError('file') . "</div>";
                        } ?>
                    </div>
                    <div class="mb-4">
                        <label for="quantité_article" class="form-label">Quantité de l'Article</label>
                        <input type="number" min="1" class="form-control" name="quantité_article" placeholder="Veuillez saisir la quantité de l'article" />
                        <?php if (isset($validation) && $validation->hasError('quantité_article')) {
                            echo "<div style='color: #ff0000'>" . $validation->getError('quantité_article') . "</div>";
                        } ?>
                    </div>
                    <div class="mb-4">
                        <label for="description_article" class="form-label">Description de l'Article</label>
                        <textarea class="form-control" name="description_article" placeholder="Veuillez saisir la quantité de l'article" cols="30" rows="10"></textarea>
                        <?php if (isset($validation) && $validation->hasError('description_article')) {
                            echo "<div style='color: #ff0000'>" . $validation->getError('description_article') . "</div>";
                        } ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            Annuler
                        </button>
                        <input type="submit" class="btn btn-primary" value="Editer l'Article">
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>