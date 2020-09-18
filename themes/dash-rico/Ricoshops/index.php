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
                        <H1>RICOSHOPS</H1>
                    </div>
                    <div class="card-body">
                        <?php $v->insert("Ricoshops/form-new") ?>
                        <table class="table table-sm table-striped table-hover mt-4">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col" class="text-right">Ref</th>
                                    <th scope="col" class="text-right">CNPJ</th>
                                    <th scope="col" class="text-center">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($shops) : ?>
                                    <?php foreach ($shops as $shop) : ?>
                                        <tr>
                                            <th scope="row"><?= $shop->id ?></th>
                                            <td><?= $shop->nome_empresa ?></td>
                                            <td class="text-right"><?= $shop->cod_referencia ?? "-" ?></td>
                                            <td class="text-right"><?= $shop->cnpj ?></td>
                                            <td class="text-center"><a class="btn btn-sm btn-success" href="<?= url("/ricoshops/loja/") . str_slug($shop->nome_empresa) ?>">Ver informações</a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <?= $paginator; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>