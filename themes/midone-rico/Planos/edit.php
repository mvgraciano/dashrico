<?php $v->layout("_theme"); ?>

<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 lg:col-span-12">
        <div class="intro-y box mt-5">
            <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
                <div class="mr-auto ml-auto">
                    <h2 class="font-medium text-base">
                        <?= $plano->nome ?>
                    </h2>
                </div>
            </div>
            <form method="post" action="">
                <?= csrf_input(); ?>
                <input type="hidden" class="form-control" id="idPlano" name="idPlano" value="<?= ($plano->id ?? ""); ?>">
                <div class="p-5">
                    <div class="preview">
                        <div class="grid grid-cols-12  gap-2 mt-1">
                            <div class="col-span-6 mt-1">
                                <label class="ml-1">Nome</label>
                                <input type="text" id="nome" name="nome" value="<?= ($plano->nome ?? ""); ?>" class="input w-full border">
                            </div>
                            <div class="col-span-6 mt-1">
                                <label class="ml-1">Valor Mensal</label>
                                <input type="text" id="valor_mensal" name="valor_mensal" value="<?= ($plano->valor_mensal ?? ""); ?>" maxlength="7" placeholder="__,__" class="input w-full border">
                            </div>
                        </div>
                        <div class="grid grid-cols-12  gap-2 mt-1">
                            <div class="col-span-12 mt-1">
                                <label class="ml-1">Descrição</label>
                                <textarea id="descricao" name="descricao" class="input w-full border" rows="3"><?= ($plano->descricao ?? ""); ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex items-center p-5">
                    <div class="mr-auto">
                        <a href="<?= url("/ricoshops/planos") ?>" class="button w-24 mr-1 mb-2 shadow-md flex items-center justify-center bg-theme-17 text-theme-11">
                            <i data-feather="corner-down-left" class="w-4 h-4 mr-2"></i>Voltar
                        </a>
                    </div>
                    <div>
                        <button type="submit" class="button w-24 mr-1 mb-2 shadow-md flex items-center justify-center bg-theme-18 text-theme-9">
                            <i data-feather="thumbs-up" class="w-4 h-4 mr-2"></i>Salvar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>