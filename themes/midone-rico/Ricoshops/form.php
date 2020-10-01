<form method="post" action="">
    <div class="p-5">
        <div class="preview">
            <div class="grid grid-cols-12  gap-2 mt-1">
                <?= csrf_input(); ?>
                <input type="hidden" id="idShop" name="idShop" value="<?= ($shop->id ?? ""); ?>">
                <div class="col-span-4 mt-1">
                    <label class="ml-1">Cód. Referencia</label>
                    <input type="text" id="referencia" name="referencia" value="<?= ($shop->cod_referencia ?? ""); ?>" class="input w-full border">
                </div>
                <div class="col-span-4 mt-1">
                    <label class="ml-1">Nome</label>
                    <input type="text" id="nome" name="nome" value="<?= ($shop->nome_empresa ?? ""); ?>" class="input w-full border">
                </div>
                <div class="col-span-4 mt-1">
                    <label class="ml-1">CNPJ</label>
                    <input type="text" id="cnpj" name="cnpj" value="<?= ($shop->cnpj ?? ""); ?>" data-mask="00.000.000/0000-00" maxlength="14" class="input w-full border" placeholder="__.___.___/____-__">
                </div>
            </div>
            <div class="grid grid-cols-12  gap-2 mt-1">
                <div class="col-span-6 mt-1">
                    <label class="ml-1">E-mail</label>
                    <input type="text" id="email" name="email" value="<?= ($shop->email ?? ""); ?>" class="input w-full border">
                </div>
                <div class="col-span-6 mt-1">
                    <label class="ml-1">Telefone</label>
                    <input type="text" id="telefone" name="telefone" value="<?= ($shop->telefone ?? ""); ?>" data-mask="(00)0000-0000" maxlength="11" placeholder="(__)_____-____" class="input w-full border">
                </div>
            </div>
            <div class="grid grid-cols-12  gap-2 mt-1">
                <div class="col-span-4 mt-1">
                    <label class="ml-1">Domínio</label>
                    <input type="text" id="dominio" name="dominio" value="<?= ($shop->dominio ?? ""); ?>" class="input w-full border">
                </div>
                <div class="col-span-4 mt-1">
                    <label class="ml-1">Status</label>
                    <select id="status" name="status" class="input w-full border">
                        <?php if (!$shop) : ?>
                            <option value="">-- SELECIONE --</option>
                        <?php endif; ?>
                        <option value="0" <?= ($shop->status == 0 ? 'selected' : "") ?>>Em Construção</option>
                        <option value="1" <?= ($shop->status == 1 ? 'selected' : "") ?>>Ativo</option>
                        <option value="2" <?= ($shop->status == 2 ? 'selected' : "") ?>>Pausado</option>
                        <option value="3" <?= ($shop->status == 3 ? 'selected' : "") ?>>Cancelado</option>
                    </select>
                </div>
                <div class="col-span-4 mt-1">
                    <label class="ml-1">Contrato enviado?</label>
                    <select id="contrato_enviado" name="contrato" class="input w-full border">
                        <?php if (!$shop) : ?>
                            <option value="">-- SELECIONE --</option>
                        <?php endif; ?>
                        <option value="0" <?= ($shop->contrato == 0 ? 'selected' : "") ?>>Não</option>
                        <option value="1" <?= ($shop->contrato == 1 ? 'selected' : "") ?>>Sim</option>
                    </select>
                </div>
            </div>
            <div class="grid grid-cols-12  gap-2 mt-1">
                <div class="col-span-12 mt-1">
                    <label class="ml-1">Observação</label>
                    <textarea id="osbervacao" name="osbervacao" class="input w-full border" rows="3"><?= ($shop->obs ?? ""); ?></textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="flex items-center p-5">
        <div class="mr-auto">
            <a href="<?= url_back() ?>" class="button w-24 mr-1 mb-2 shadow-md flex items-center justify-center bg-theme-17 text-theme-11">
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