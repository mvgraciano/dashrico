<?php $v->layout("_theme"); ?>

<div class="grid grid-cols-12 gap-6 mt-2">
    <div class="intro-y col-span-12 lg:col-span-12">
        <div class="intro-y box mt-5">
            <div class="flex items-center p-5 ">
                <div class="mr-auto ml-auto">
                    <h2 class="font-medium text-base">
                        Ricoshops - Cadastros
                    </h2>
                </div>
            </div>
            <div class="p-5 border-b border-gray-200 dark:border-dark-5" id="inline-form">
                <div class="preview">
                    <form method="post" action="">
                        <div class="grid grid-cols-12 gap-2">
                            <?= csrf_input(); ?>
                            <input type="text" id="nome" name="nome" class="input w-full border col-span-4" placeholder="Nome" maxlength="45">
                            <input type="text" id="email" name="email" class="input w-full border col-span-3" placeholder="E-mail" maxlength="45">
                            <input type="text" id="cnpj" name="cnpj" data-mask="00.000.000/0000-00" class="input w-full border col-span-3" placeholder="CNPJ">
                            <button type="submit" class="button bg-theme-18 text-theme-9 col-span-2">Cadastrar</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="p-5" id="responsive-table">
                <div class="preview">
                    <div class="overflow-x-auto">
                        <table class="table table--sm">
                            <thead>
                                <tr class="bg-gray-200 text-gray-700">
                                    <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">#</th>
                                    <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Nome</th>
                                    <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Domínio</th>
                                    <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">CNPJ</th>
                                    <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($shops) : ?>
                                    <?php foreach ($shops as $shop) : ?>
                                        <tr>
                                            <td class="border-b whitespace-no-wrap"><?= $shop->id ?></td>
                                            <td class="border-b whitespace-no-wrap"><?= $shop->nome_empresa ?></td>
                                            <td class="border-b whitespace-no-wrap"><?= $shop->dominio ?? "-" ?></td>
                                            <td class="border-b whitespace-no-wrap"><?= $shop->cnpj ?></td>
                                            <td class="border-b whitespace-no-wrap">
                                                <a href="<?= url("/ricoshops/loja/") . str_slug($shop->nome_empresa) ?>" class="button button--sm bg-theme-18 text-theme-9 col-span-2">Ver informações</a>
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