<?php $v->layout("_theme"); ?>

<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 lg:col-span-12">
        <div class="intro-y box mt-5">
            <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">

                <div class="mr-auto ml-auto">
                    <h2 class="font-medium text-base">
                        <?= $assinatura->ricoshop()->nome_empresa ?> / <?= $assinatura->plano()->nome ?>
                    </h2>
                </div>
            </div>
            <?php $v->insert("Assinaturas/form") ?>
        </div>
    </div>
</div>