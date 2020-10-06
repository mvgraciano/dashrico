<form method="post" action="">
    <div class="p-5">
        <div class="preview">
            <div class="grid grid-cols-12  gap-2 mt-1">
                <?= csrf_input(); ?>
                <input type="hidden" id="assinatura_id" name="assinatura_id" value="<?= ($assinatura->id ?? ""); ?>">
                <div class="col-span-4 mt-1">
                    <label class="ml-1">Loja</label>
                    <select id="loja_id" name="loja_id" <?= (isset($assinatura) ? 'disabled' : '') ?> class="input w-full border">
                        <?php if (!$assinatura) : ?>
                            <option value="">-- SELECIONE --</option>
                            <?php foreach ($shops as $shop) : ?>
                                <option value="<?= $shop->id ?>"><?= $shop->nome_empresa ?></option>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <option value="<?= $shops->id ?>" <?= ($assinatura->ricoshop()->id == $shops->id ? 'selected' : "") ?>><?= $shops->nome_empresa ?></option>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="col-span-4 mt-1">
                    <label class="ml-1">Plano</label>
                    <select id="plano_id" name="plano_id" class="input w-full border">
                        <?php if (!$assinatura) : ?>
                            <option value="">-- SELECIONE --</option>
                        <?php endif; ?>
                        <?php foreach ($planos as $plano) : ?>
                            <option value="<?= $plano->id ?>" <?= (isset($assinatura) && $assinatura->plano()->id == $plano->id ? 'selected' : "") ?>><?= $plano->nome ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-span-4 mt-1">
                    <label class="ml-1">Status</label>
                    <select id="status" name="status" class="input w-full border">
                        <option value="0" <?= (isset($assinatura) && $assinatura->status == 0 ? 'selected' : "") ?>>Em Construção</option>
                        <option value="1" <?= (isset($assinatura) && $assinatura->status == 1 ? 'selected' : "") ?>>Ativo</option>
                        <option value="2" <?= (isset($assinatura) && $assinatura->status == 2 ? 'selected' : "") ?>>Pausado</option>
                        <option value="3" <?= (isset($assinatura) && $assinatura->status == 3 ? 'selected' : "") ?>>Cancelado</option>
                    </select>
                </div>
            </div>
            <div class="grid grid-cols-12  gap-2 mt-1">
                <div class="col-span-3 mt-1">
                    <label class="ml-1">Valor de Aquisição</label>
                    <input type="text" id="valor_aquisicao" name="valor_aquisicao" value="<?= ($assinatura->valor_aquisicao ?? ""); ?>" maxlength="7" placeholder="__,__" class="input w-full border">
                </div>
                <div class="col-span-3 mt-1">
                    <label class="ml-1">Aquisição Parcelada?</label>
                    <select id="aquisicao_parcelada" name="aquisicao_parcelada" class="input w-full border">
                        <?php if (!$assinatura) : ?>
                            <option selected>-- SELECIONE --</option>
                        <?php endif; ?>
                        <option value="0" <?= (isset($assinatura) && $assinatura->valor_aquisicao_parcelado == 0 ? 'selected' : "") ?>>Não</option>
                        <option value="1" <?= (isset($assinatura) && $assinatura->valor_aquisicao_parcelado == 1 ? 'selected' : "") ?>>Sim</option>
                    </select>
                </div>
                <div class="col-span-3 mt-1">
                    <label class="ml-1">Quantidade de Parcelas</label>
                    <input type="text" id="qtd_parcelas" name="qtd_parcelas" value="<?= ($assinatura->valor_aquisicao_quantidade_parcelas ?? ""); ?>" class="input w-full border">
                </div>
                <div class="col-span-3 mt-1">
                    <label class="ml-1">Aquisição Quitada?</label>
                    <select id="aquisicao_quitada" name="aquisicao_quitada" class="input w-full border">
                        <?php if (!$assinatura) : ?>
                            <option selected>-- SELECIONE --</option>
                        <?php endif; ?>
                        <option value="0" <?= (isset($assinatura) && $assinatura->valor_aquisicao_pago == 0 ? 'selected' : "") ?>>Não</option>
                        <option value="1" <?= (isset($assinatura) && $assinatura->valor_aquisicao_pago == 1 ? 'selected' : "") ?>>Sim</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="flex items-center p-5">
        <div class="mr-auto">
            <a href="<?= url("/ricoshops/assinaturas") ?>" class="button w-24 mr-1 mb-2 shadow-md flex items-center justify-center bg-theme-17 text-theme-11">
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