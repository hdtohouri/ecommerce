<div class="modal fade" id="edit-category-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered" data-backdrop="static">
        <form class="modal-content" action="<?php echo base_url('common/adminspace/dashboard/update_categories') ?>" method="post" id="add_category_form">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">
                    Large modal
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    ×
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" class="ci_csrf_data">
                <div class="form-group">
                    <label for="">Nom Categorie</label>
                    <input type="text" class="form-control" name="categorie_name" value="<?= set_value('categorie_name') ?>" placeholder="Veuillez saisir le nom de la categorie">
                    <?php if (isset($category['id_categories'])) : ?>
                        <input type="hidden" name="id_categories"  value="<?= $category['id_categories'] ?>">
                        <input type="hidden" name="action" value="edit">
                    <?php endif; ?> 
                    <?php if (isset($validation) && $validation->hasError('categorie_name')) {
                        echo "<div style='color: #ff0000'>" . $validation->getError('categorie_name') . "</div>";
                    } ?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    Annuler
                </button>
                <input type="submit" class="btn btn-primary" value="Modifier">
            </div>
        </form>
    </div>
</div>