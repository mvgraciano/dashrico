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
                            <H1>Novo Lançamento Financeiro</H1>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div><b>Empresa: </b></div>
                                <div><?= $assinatura->ricoshop()->nome_empresa ?></div>
                            </div>
                            <div class="col-md-6">
                                <div><b>Plano: </b></div>
                                <div><?= $assinatura->plano()->nome ?></div>
                            </div>
                        </div>
                        <hr>
                        <?php $v->insert("Lancamentos/form", ["idAssinatura" => $idAssinatura]) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>