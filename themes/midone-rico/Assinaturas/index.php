<?php $v->layout("_theme"); ?>

<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 lg:col-span-12">
        <div class="intro-y box mt-5">
            <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
                <div class="mr-auto ml-auto">
                    <h2 class="font-medium text-base">
                        Ricoshops - Assinaturas
                    </h2>
                </div>
                <div>
                    <a href="<?= url("/ricoshops/assinaturas/nova") ?>" class="button w-32 mr-1 mb-2 shadow-md flex items-center justify-center bg-theme-18 text-theme-9"><i data-feather="edit-3" class="w-4 h-4 mr-2"></i>Cadastrar</a>
                </div>
            </div>
            <div class="p-5" id="responsive-table">
                <div class="preview">
                    <div class="overflow-x-auto">
                        <table class="table table--sm">
                            <thead>
                                <tr class="bg-gray-200 text-gray-700">
                                    <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">#</th>
                                    <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Loja</th>
                                    <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Plano</th>
                                    <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Status</th>
                                    <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($assinaturas) : ?>
                                    <?php foreach ($assinaturas as $assinatura) : ?>
                                        <tr>
                                            <td class="border-b whitespace-no-wrap"><?= $assinatura->id ?></td>
                                            <td class="border-b whitespace-no-wrap"><?= $assinatura->ricoshop()->nome_empresa ?></td>
                                            <td class="border-b whitespace-no-wrap"><?= $assinatura->plano()->nome ?></td>
                                            <td class="border-b whitespace-no-wrap"><?= $assinatura->verificarStatus() ?></td>
                                            <td class="border-b whitespace-no-wrap">
                                                <a href="<?= url("/ricoshops/assinaturas/{$assinatura->id}/edit") ?>" class="button button--sm w-24 bg-theme-14 text-theme-10 col-span-2">Editar</a>
                                                <a href="<?= url("/ricoshops/assinaturas/{$assinatura->id}/financeiro") ?>" class="button button--sm w-24 bg-theme-18 text-theme-9 col-span-2">Financeiro</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                        <?= $paginator; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>