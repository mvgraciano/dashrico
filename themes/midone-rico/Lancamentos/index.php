<?php $v->layout("_theme"); ?>

<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 lg:col-span-12">
        <div class="intro-y box mt-5">
            <div class="intro-y box mt-5">
                <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
                    <div>
                        <a href="<?= url("/ricoshops/assinaturas/{$assinatura->id}") ?>" class="button w-24 mr-1 mb-2 shadow-md flex items-center justify-center bg-theme-17 text-theme-11"><i data-feather="corner-down-left" class="w-4 h-4 mr-2"></i>Voltar</a>
                    </div>
                    <div class="mr-auto ml-auto">
                        <h2 class="font-medium text-base">
                            <?= $assinatura->ricoshop()->nome_empresa ?> / <?= $assinatura->plano()->nome ?>
                        </h2>
                    </div>
                    <div>
                        <a href="<?= url("/ricoshops/assinaturas/{$assinatura->id}/financeiro/lancamento") ?>" class="button w-48 mr-1 mb-2 shadow-md flex items-center justify-center bg-theme-18 text-theme-9"><i data-feather="dollar-sign" class="w-4 h-4 mr-2"></i>Novo Lançamento</a>
                    </div>
                </div>
                <div class="p-5">
                    <div class="grid grid-cols-12 items-center mt-1">
                        <div class="col-span-6">
                            <p href="" class="font-semibold">Empresa</p>
                            <div class="text-gray-600"><?= $assinatura->ricoshop()->nome_empresa ?></div>
                        </div>
                        <div class="col-span-6">
                            <p href="" class="font-semibold">Plano</p>
                            <div class="text-gray-600"><?= $assinatura->plano()->nome ?></div>
                        </div>
                    </div>
                </div>
                <div class="p-5" id="responsive-table">
                    <div class="preview">
                        <div class="overflow-x-auto">
                            <table class="table table--sm">
                                <thead>
                                    <tr class="bg-gray-200 text-gray-700">
                                        <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Descrição</th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Valor</th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Vencimento</th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($lancamentos) : ?>
                                        <?php foreach ($lancamentos as $lancamento) : ?>
                                            <tr>
                                                <td class="border-b whitespace-no-wrap"><?= $lancamento->descricao ?></td>
                                                <td class="border-b whitespace-no-wrap"><?= brl_format($lancamento->valor) ?></td>
                                                <td class="border-b whitespace-no-wrap <?= $lancamento->vencimentoClass() ?>"><?= date_fmt($lancamento->vencimento, "d/m/Y") ?></td>
                                                <td class="border-b whitespace-no-wrap">
                                                    <a class="button button--sm mr-1 mb-2 bg-theme-14 text-theme-10" href="<?= url("/ricoshops/lancamento/{$lancamento->id}/mail") ?>">Enviar e-mail</a>
                                                </td>
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
</div>