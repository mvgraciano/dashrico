<?php $v->layout("_theme"); ?>

<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 lg:col-span-12">
        <div class="intro-y box mt-5">
            <div class="flex items-center p-5">
                <div class="mr-auto ml-auto">
                    <h2 class="font-medium text-base">
                        Ricoshops - Planos
                    </h2>
                </div>
            </div>
            <div class="p-5 border-b border-gray-200 dark:border-dark-5" id="inline-form">
                <div class="preview">
                    <form method="post" action="">
                        <div class="grid grid-cols-12 gap-2">
                            <?= csrf_input(); ?>
                            <input type="text" id="nome" name="nome" class="input w-full border col-span-5" placeholder="Nome">
                            <input type="text" id="valor_mensal" name="valor_mensal" placeholder="Valor Mensal" class="input w-full border col-span-5" placeholder="Valor Mensal">
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
                                    <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Valor Mensal</th>
                                    <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($planos) : ?>
                                    <?php foreach ($planos as $plano) : ?>
                                        <tr>
                                            <td class="border-b whitespace-no-wrap"><?= $plano->id ?></td>
                                            <td class="border-b whitespace-no-wrap"><?= $plano->nome ?></td>
                                            <td class="border-b whitespace-no-wrap"><?= brl_format($plano->valor_mensal) ?></td>
                                            <td class="border-b whitespace-no-wrap">
                                                <a type="button" href="<?= url("/ricoshops/planos/") . str_slug($plano->nome) ?>" class="button bg-theme-18 text-theme-9 col-span-2">Ver informações</a>
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