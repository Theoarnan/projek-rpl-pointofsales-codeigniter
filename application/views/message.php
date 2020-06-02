<!-- Flash Data -->
<?php if ($this->session->has_userdata('success')) { ?>
<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <i class="fas fa-check"></i> <?= $this->session->flashdata('success'); ?>
</div>
<?php } ?>

<?php if ($this->session->has_userdata('error')) { ?>
<div class="alert alert-error alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <i class="fas fa-ban"></i> <?= strip_tags(str_replace('<p>','', $this->session->flashdata('error'))) ; ?>
</div>
<?php } ?>