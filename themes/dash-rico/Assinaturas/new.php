<?php $v->layout("_theme"); ?>

<?php if ($message) : ?>
   <?= $message; ?>
<?php endif; ?>


<div class="row mt-3">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center">
                        <div>
                            <H1>Nova Assinatura</H1>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php $v->insert("Assinaturas/form") ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>