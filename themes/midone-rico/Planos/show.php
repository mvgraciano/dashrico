<?php $v->layout("_theme"); ?>

<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 lg:col-span-12">
        <div class="intro-y box mt-5">
            <div class="intro-y box mt-5">
                <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
                    <div>
                        <a href="<?= url("/ricoshops/planos") ?>" class="button w-24 mr-1 mb-2 shadow-md flex items-center justify-center bg-theme-17 text-theme-11"><i data-feather="corner-down-left" class="w-4 h-4 mr-2"></i>Voltar</a>
                    </div>
                    <div class="mr-auto ml-auto">
                        <h2 class="font-medium text-base">
                            <?= $plano->nome ?>
                        </h2>
                    </div>
                    <div>
                        <a href="<?= url("/ricoshops/planos/{$plano->id}/edit") ?>" class="button w-24 mr-1 mb-2 shadow-md flex items-center justify-center bg-theme-14 text-theme-10"><i data-feather="edit-3" class="w-4 h-4 mr-2"></i>Editar</a>
                    </div>
                </div>
                <div class="p-5">
                    <div class="grid grid-cols-12 items-center mt-1">
                        <div class="col-span-4">
                            <p href="" class="font-semibold">Código</p>
                            <div class="text-gray-600"><?= $plano->id ?></div>
                        </div>
                        <div class="col-span-4">
                            <p href="" class="font-semibold">Nome</p>
                            <div class="text-gray-600"><?= $plano->nome ?></div>
                        </div>
                        <div class="col-span-4">
                            <p href="" class="font-semibold">Valor</p>
                            <div class="text-gray-600"><?= brl_format($plano->valor_mensal) ?></div>
                        </div>
                    </div>
                    <div class="grid grid-cols-12 items-center mt-1">
                        <div class="col-span-12">
                            <p href="" class="font-semibold">Descrição</p>
                            <div class="text-gray-600"><?= $plano->descricao ?? '-' ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>