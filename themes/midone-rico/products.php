<?php $v->layout("_theme"); ?>
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 lg:col-span-12">
        <div class="intro-y box mt-5">
            <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
                <div class="mr-auto ml-auto">
                    <h2 class="font-medium text-base">
                        Produtos
                    </h2>
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
                                    <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Preço</th>
                                    <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Quantidade Estoque</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (isset($produtos)) : ?>
                                    <?php foreach ($produtos as $produto) : ?>
                                        <?php if (!is_null($produto)) : ?>
                                            <tr>
                                                <td class="border-b whitespace-no-wrap"><?= $produto['vpxProductId'] ?></td>
                                                <td class="border-b whitespace-no-wrap"><?= $produto['vpxProductName'] ?></td>
                                                <td class="border-b whitespace-no-wrap">R$ <?= brl_format() ?></td>
                                                <td class="border-b whitespace-no-wrap">0</td>
                                            </tr>
                                        <?php endif; ?>
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