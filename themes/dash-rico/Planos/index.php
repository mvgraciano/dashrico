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
                        <h2>RICOSHOPS - PLANOS</h2>
                    </div>
                    <div class="card-body">
                        <?php $v->insert("Planos/form-new") ?>
                        <table class="table table-sm table-striped table-hover mt-4">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col" class="text-right">Valor Mensal</th>
                                    <th scope="col" class="text-center">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($planos) : ?>
                                    <?php foreach ($planos as $plano) : ?>
                                        <tr>
                                            <td scope="row"><?= $plano->id ?></th>
                                            <td><?= $plano->nome ?></td>
                                            <td class="text-right"><?= brl_format($plano->valor_mensal) ?></td>
                                            <td class="text-center"><a class="btn btn-sm btn-success" href="<?= url("/ricoshops/planos/") . str_slug($plano->nome) ?>">Ver informações</a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>