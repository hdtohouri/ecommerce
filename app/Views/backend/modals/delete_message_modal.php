<div class="modal fade" id="delete-message-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered" data-backdrop="static">
        <form class="modal-content" action="<?php echo base_url('common/adminspace/dashboard/message') ?>" method="post" id="add_category_form">
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
                    Souhaitez vous supprimer ce message ?
                    <h6>Cliquer Sur supprimer ou sur annuler</h6>
                    <?php if (isset($message['id_contact_us'])) : ?>
                        <input type="hidden" name="message_id"  value="<?=  $message['id_contact_us'] ?>">
                        <input type="hidden" name="action" value="delete">
                    <?php endif; ?>                    
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