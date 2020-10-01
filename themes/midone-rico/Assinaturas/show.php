<?php $v->layout("_theme"); ?>
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 lg:col-span-12">
        <div class="intro-y box mt-5">
            <div class="intro-y box mt-5">
                <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
                    <div>
                        <a href="<?= url("/ricoshops/assinaturas") ?>" class="button w-24 mr-1 mb-2 shadow-md flex items-center justify-center bg-theme-17 text-theme-11"><i data-feather="corner-down-left" class="w-4 h-4 mr-2"></i>Voltar</a>
                    </div>
                    <div class="mr-auto ml-auto">
                        <h2 class="font-medium text-base">
                            <?= $assinatura->ricoshop()->nome_empresa ?> / <?= $assinatura->plano()->nome ?>
                        </h2>
                    </div>
                    <div class="flex items-center p-5">
                        <a href="<?= url("/ricoshops/assinaturas/{$assinatura->id}/edit") ?>" class="button w-24 mr-1 mb-2 shadow-md flex items-center justify-center bg-theme-14 text-theme-10"><i data-feather="edit-3" class="w-4 h-4 mr-2"></i>Editar</a>
                        <a href="<?= url("/ricoshops/assinaturas/{$assinatura->id}/financeiro") ?>" class="button w-32 mr-1 mb-2 shadow-md flex items-center justify-center bg-theme-18 text-theme-9"><i data-feather="dollar-sign" class="w-4 h-4 mr-2"></i>Financeiro</a>
                    </div>
                </div>
                <div class="p-5">
                    <div class="grid grid-cols-12 items-center mt-1">
                        <div class="col-span-12">
                            <p href="" class="font-semibold">Código</p>
                            <div class="text-gray-600"><?= $assinatura->id ?></div>
                        </div>
                    </div>
                    <div class="grid grid-cols-12 items-center mt-1">
                        <div class="col-span-4">
                            <p href="" class="font-semibold">Empresa</p>
                            <div class="text-gray-600"><?= $assinatura->ricoshop()->nome_empresa ?></div>
                        </div>
                        <div class="col-span-4">
                            <p href="" class="font-semibold">Plano</p>
                            <div class="text-gray-600"><?= $assinatura->plano()->nome ?></div>
                        </div>
                        <div class="col-span-4">
                            <p href="" class="font-semibold">Status</p>
                            <div class="text-gray-600"><?= $assinatura->verificarStatus() ?></div>
                        </div>
                    </div>
                    <div class="grid grid-cols-12 items-center mt-1">
                        <div class="col-span-3">
                            <p href="" class="font-semibold">Valor de Aquisição</p>
                            <div class="text-gray-600"><?= brl_format($assinatura->valor_aquisicao) ?></div>
                        </div>
                        <div class="col-span-3">
                            <p href="" class="font-semibold">Aquisição Parcelada?</p>
                            <div class="text-gray-600"><?= $assinatura->valor_aquisicao_parcelado == 0 ? 'Não' : 'Sim' ?></div>
                        </div>
                        <div class="col-span-3">
                            <p href="" class="font-semibold">Quantidade de Parcelas</p>
                            <div class="text-gray-600"><?= $assinatura->valor_aquisicao_quantidade_parcelas ?></div>
                        </div>
                        <div class="col-span-3">
                            <p href="" class="font-semibold">Aquisição Quitada?</p>
                            <div class="text-gray-600"><?= $assinatura->valor_aquisicao_pago == 0 ? 'Não' : 'Sim' ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>