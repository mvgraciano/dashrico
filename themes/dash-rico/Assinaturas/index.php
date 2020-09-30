<?php $v->layout("_theme"); ?>

<?php if ($message) : ?>
    <?= $message; ?>
<?php endif; ?>

<div class="row mt-3">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div>
                            <h2>RICOSHOPS - ASSINATURAS</h2>
                        </div>
                        <div>
                            <a href="<?= url("/ricoshops/assinaturas/nova") ?>" class="btn btn-success">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
                                </svg>
                                Cadastrar
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm table-striped table-hover mt-4">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Loja</th>
                                    <th scope="col">Plano</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" class="text-center">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($assinaturas) : ?>
                                    <?php foreach ($assinaturas as $assinatura) : ?>
                                        <td scope="row"><?= $assinatura->id ?></th>
                                        <td><?= $assinatura->ricoshop()->nome_empresa ?></td>
                                        <td><?= $assinatura->plano()->nome ?></td>
                                        <td><?= $assinatura->verificarStatus() ?></td>
                                        <td class="text-center"><a class="btn btn-sm btn-success" href="<?= url("/ricoshops/assinaturas/{$assinatura->id}") ?>">Ver informações</a></td>
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