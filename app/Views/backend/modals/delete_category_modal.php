<div class="modal fade" id="delete-category-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered" data-backdrop="static">
        <form class="modal-content" action="<?php echo base_url('common/dashboard/update_categories') ?>" method="post" id="delete_form">
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
                <div class="mb-4 form-group">
                    Souhaitez vous supprimer cette catégorie ?
                    <h6>Cliquer Sur supprimer ou sur fermer pour annuler</h6>
                    <input type="hidden" name="id_categories"  value="<?= $category['id_categories'] ?>">
                    <input type="hidden" name="action" value="delete">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    Annuler
                </button>
                <input type="submit" class="btn btn-primary" value="Supprimer">
            </div>
        </form>
    </div>
</div>