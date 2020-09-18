<?php $v->layout("_theme"); ?>

<?php if ($message) : ?>
   <?= $message; ?>
<?php endif; ?>

<?php if ($shop) : ?>
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header text-center">
                            <div>
                                <H1>Editar: <?= $shop->nome_empresa ?></H1>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php $v->insert("Ricoshops/form") ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>