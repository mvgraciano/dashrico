<?php $v->layout("_theme"); #var_dump(date("d/m/Y", strtotime("+16month"))); 
?>

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
                            <h2>RICOSHOPS - FINANCEIRO</h2>
                        </div>
                        <div>
                            <a href="<?= url("/ricoshops/assinaturas/{$assinatura->id}/financeiro/lancamento") ?>" class="btn btn-success">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
                                </svg>
                                Novo Lançamento
                            </a>
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
                        <table class="table table-sm table-striped table-hover mt-4">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Descrição</th>
                                    <th scope="col">Valor</th>
                                    <th scope="col">Vencimento</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($lancamentos) : ?>
                                    <?php foreach ($lancamentos as $lancamento) : ?>
                                        <td><?= $lancamento->descricao ?></td>
                                        <td><?= brl_format($lancamento->valor) ?></td>
                                        <td class="<?= $lancamento->vencimentoClass() ?>"><?= date_fmt($lancamento->vencimento, "d/m/Y") ?></td>
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