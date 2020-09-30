<?php $v->layout("_theme"); ?>

<?php if ($message) : ?>
   <?= $message; ?>
<?php endif; ?>

<?php if ($assinatura) : ?>
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header text-center">
                            <div>
                                <H2>Editar: <?= $assinatura->ricoshop()->nome_empresa ?> / <?= $assinatura->plano()->nome ?></H2>
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
<?php endif; ?>