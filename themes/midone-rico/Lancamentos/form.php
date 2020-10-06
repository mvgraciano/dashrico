<div class="p-5 border-b border-gray-200 dark:border-dark-5">
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
<form method="post" action="">
    <?= csrf_input(); ?>
    <input type="hidden" class="form-control" id="idAssinatura" name="idAssinatura" value="<?= ($idAssinatura ?? ""); ?>">
    <div class="p-5">
        <div class="preview">
            <div class="grid grid-cols-12  gap-2 mt-1">
                <div class="col-span-3 mt-1">
                    <label class="ml-1">Referente</label>
                    <select id="referente" name="referente" class="input w-full border">
                        <option value="">-- SELECIONE --</option>
                        <option value="1">Aquisição</option>
                        <option value="2">Mensalidades</option>
                    </select>
                </div>
                <div class="col-span-3 mt-1">
                    <label class="ml-1">Valor</label>
                    <input type="text" id="valor" name="valor" maxlength="7" placeholder="__,__" class="input w-full border">
                </div>
                <div class="col-span-3 mt-1">
                    <label class="ml-1">Vencimento / Início Recorrência</label>
                    <input type="date" id="data_vencimento" name="data_vencimento" class="input w-full border">
                </div>
                <div class="col-span-3 mt-1">
                    <label class="ml-1">Parcelas</label>
                    <select id="parcelas" name="parcelas" class="input w-full border">
                        <option value="">-- Selecione --</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="flex items-center p-5">
        <div class="mr-auto">
            <a href="<?= url("/ricoshops/assinaturas/{$assinatura->id}/financeiro") ?>" class="button w-24 mr-1 mb-2 shadow-md flex items-center justify-center bg-theme-17 text-theme-11">
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