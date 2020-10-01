<?php $v->layout("_theme"); ?>
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 lg:col-span-12">
        <div class="intro-y box mt-5">
            <div class="intro-y box mt-5">
                <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
                    <div>
                        <a href="<?= url("/ricoshops") ?>" class="button w-24 mr-1 mb-2 shadow-md flex items-center justify-center bg-theme-17 text-theme-11"><i data-feather="corner-down-left" class="w-4 h-4 mr-2"></i>Voltar</a>
                    </div>
                    <div class="mr-auto ml-auto">
                        <h2 class="font-medium text-base">
                            <?= $shop->nome_empresa ?>
                        </h2>
                    </div>
                    <div>
                        <a href="<?= url("/ricoshops/{$shop->id}/edit") ?>" class="button w-24 mr-1 mb-2 shadow-md flex items-center justify-center bg-theme-14 text-theme-10"><i data-feather="edit-3" class="w-4 h-4 mr-2"></i>Editar</a>
                    </div>
                </div>
                <div class="p-5">
                    <div class="grid grid-cols-12 items-center mt-1">
                        <div class="col-span-4">
                            <p href="" class="font-semibold">Código</p>
                            <div class="text-gray-600"><?= $shop->id ?></div>
                        </div>
                        <div class="col-span-4">
                            <p href="" class="font-semibold">Referência</p>
                            <div class="text-gray-600"><?= $shop->cod_referencia ?></div>
                        </div>
                    </div>
                    <div class="grid grid-cols-12 items-center mt-1">
                        <div class="col-span-12">
                            <p href="" class="font-semibold">Nome</p>
                            <div class="text-gray-600"><?= $shop->nome_empresa ?></div>
                        </div>
                    </div>
                    <div class="grid grid-cols-12 items-center mt-1">
                        <div class="col-span-4">
                            <p href="" class="font-semibold">CNPJ</p>
                            <div class="text-gray-600"><?= $shop->cnpj ?></div>
                        </div>
                        <div class="col-span-4">
                            <p href="" class="font-semibold">Telefone</p>
                            <div class="text-gray-600"><?= $shop->telefone ?? '-' ?></div>
                        </div>
                        <div class="col-span-4">
                            <p href="" class="font-semibold">E-mail</p>
                            <div class="text-gray-600"><?= $shop->email ?? '-' ?></div>
                        </div>
                    </div>
                    <div class="grid grid-cols-12 items-center mt-1">
                        <div class="col-span-4">
                            <p href="" class="font-semibold">Domínio</p>
                            <div class="text-gray-600"><?= $shop->dominio ?? '-' ?></div>
                        </div>
                        <div class="col-span-4">
                            <p href="" class="font-semibold">Contrato enviado?</p>
                            <div class="text-gray-600"><?= $shop->contrato == 0 ? 'Não' : 'Sim' ?></div>
                        </div>
                        <div class="col-span-4">
                            <p href="" class="font-semibold">Status</p>
                            <div class="text-gray-600"><?= $shop->verificarStatus() ?></div>
                        </div>
                    </div>
                    <div class="grid grid-cols-12 items-center mt-1">
                        <div class="col-span-12">
                            <p href="" class="font-semibold">Observação</p>
                            <div class="text-gray-600"><?= $shop->obs ?? '-' ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>