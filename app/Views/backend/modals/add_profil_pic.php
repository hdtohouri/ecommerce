<div class="modal fade" id="add-profil-pic" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered" data-backdrop="static">
        <form class="modal-content" action="<?php echo base_url('common/dashboard/add_profil_pic') ?>" enctype="multipart/form-data" method="post" id="add_category_form">
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
                <div class="mb-4">
                    <label for="file" class="form-label">Photo de Profil</label>
                    <input type="file" class="form-control" name="file" placeholder="Veuillez selectionner l'image" />
                    <?php if (isset($validation) && $validation->hasError('file')) {
                        echo "<div style='color: #ff0000'>" . $validation->getError('file') . "</div>";
                    } ?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    Annuler
                </button>
                <button type="submit" class="btn btn-primary action">
                    Save changes
                </button>
            </div>
        </form>
    </div>
</div>