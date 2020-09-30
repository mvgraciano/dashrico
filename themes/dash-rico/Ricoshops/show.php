<?php $v->layout("_theme"); ?>

<div class="row mt-3">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div>
                            <a href="<?= url("/ricoshops") ?>" class="btn btn-warning">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-return-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z" />
                                </svg>
                                Voltar
                            </a>
                        </div>
                        <div>
                            <H1><?= $shop->nome_empresa ?></H1>
                        </div>
                        <div>
                            <a href="<?= url("/ricoshops/{$shop->id}/edit") ?>" class="btn btn-info">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                </svg>
                                Editar
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab2" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Dados Básicos</a>
                            </li>
                            <?php if ($shop->assinatura()) : ?>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="assinatura-tab" data-toggle="tab" href="#assinatura" role="tab" aria-controls="assinatura" aria-selected="false">Assinatura</a>
                                </li>
                            <?php endif; ?>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div><b>Código: </b></div>
                                        <div><?= $shop->id ?></div>
                                    </div>
                                    <div class="col-md-8">
                                        <div><b>Código Referência: </b></div>
                                        <div><?= $shop->cod_referencia ?></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div><b>Nome: </b></div>
                                        <div><?= $shop->nome_empresa ?></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div><b>CNPJ: </b></div>
                                        <div><?= $shop->cnpj ?></div>
                                    </div>
                                    <div class="col-md-4">
                                        <div><b>Telefone: </b></div>
                                        <div><?= $shop->telefone ?? '-' ?></div>
                                    </div>
                                    <div class="col-md-4">
                                        <div><b>E-mail: </b></div>
                                        <div><?= $shop->email ?? '-' ?></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div><b>Dominio: </b></div>
                                        <div><?= $shop->dominio ?? '-' ?></div>
                                    </div>
                                    <div class="col-md-4">
                                        <div><b>Contrato enviado: </b></div>
                                        <div><?= $shop->contrato == 0 ? 'Não' : 'Sim' ?></div>
                                    </div>
                                    <div class="col-md-4">
                                        <div><b>Status: </b></div>
                                        <div><?= $shop->verificarStatus() ?></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div><b>Observação: </b></div>
                                        <div><?= $shop->obs ?? '-' ?></div>
                                    </div>
                                </div>
                            </div>
                            <?php if ($shop->assinatura()) : ?>
                                <div class="tab-pane fade" id="assinatura" role="tabpanel" aria-labelledby="assinatura-tab">
                                    <div class="row mt-3">
                                        <div class="col-md-4">
                                            <div><b>Empresa: </b></div>
                                            <div><?= $shop->nome_empresa ?></div>
                                        </div>
                                        <div class="col-md-4">
                                            <div><b>Plano: </b></div>
                                            <div><?= $shop->assinatura()->plano()->nome ?></div>
                                        </div>
                                        <div class="col-md-4">
                                            <div><b>Status:</b></div>
                                            <div><?= $shop->assinatura()->verificarStatus() ?></div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-3">
                                            <div><b>Valor de Aquisição: </b></div>
                                            <div><?= brl_format($shop->assinatura()->valor_aquisicao) ?></div>
                                        </div>
                                        <div class="col-md-3">
                                            <div><b>Aquisição Parcelada? </b></div>
                                            <div><?= $shop->assinatura()->valor_aquisicao_parcelado == 0 ? 'Não' : 'Sim' ?></div>
                                        </div>
                                        <div class="col-md-3">
                                            <div><b>Quantidade de Parcelas:</b></div>
                                            <div><?= $shop->assinatura()->valor_aquisicao_quantidade_parcelas ?></div>
                                        </div>
                                        <div class="col-md-3">
                                            <div><b>Aquisição Quitada? </b></div>
                                            <div><?= $shop->assinatura()->valor_aquisicao_pago == 0 ? 'Não' : 'Sim' ?></div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>