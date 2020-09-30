<form method="post" action="">
    <?= csrf_input(); ?>
    <input type="hidden" class="form-control" id="assinatura_id" name="assinatura_id" value="<?= ($assinatura->id ?? ""); ?>">
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="loja_id">Loja</label>
            <select class="form-control" id="loja_id" name="loja_id" <?= (isset($assinatura) ? 'disabled' : '') ?>>
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
        <div class="form-group col-md-4">
            <label for="plano_id">Plano</label>
            <select class="form-control" id="plano_id" name="plano_id">
                <?php if (!$assinatura) : ?>
                    <option value="">-- SELECIONE --</option>
                <?php endif; ?>
                <?php foreach ($planos as $plano) : ?>
                    <option value="<?= $plano->id ?>" <?= (isset($assinatura) && $assinatura->plano()->id == $plano->id ? 'selected' : "") ?>><?= $plano->nome ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group col-md-4">
            <label for="status">Status</label>
            <select id="contrato_enviado" id="status" name="status" class="form-control">
                <option value="0" <?= (isset($assinatura) && $assinatura->status == 0 ? 'selected' : "") ?>>Em Construção</option>
                <option value="1" <?= (isset($assinatura) && $assinatura->status == 1 ? 'selected' : "") ?>>Ativo</option>
                <option value="2" <?= (isset($assinatura) && $assinatura->status == 2 ? 'selected' : "") ?>>Pausado</option>
                <option value="3" <?= (isset($assinatura) && $assinatura->status == 3 ? 'selected' : "") ?>>Cancelado</option>
            </select>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-3">
            <label for="valor_aquisicao">Valor de Aquisição</label>
            <input type="text" class="form-control" id="valor_aquisicao" name="valor_aquisicao" value="<?= ($assinatura->valor_aquisicao ?? ""); ?>" maxlength="7" placeholder="__,__">
        </div>
        <div class="form-group col-md-3">
            <label for="aquisicao_parcelada">Aquisição Parcelada?</label>
            <select class="form-control" id="aquisicao_parcelada" name="aquisicao_parcelada" <?= (!$assinatura ? 'disabled' : '') ?>>
                <?php if (!$assinatura) : ?>
                    <option selected>-- SELECIONE --</option>
                <?php endif; ?>
                <option value="0" <?= (isset($assinatura) && $assinatura->valor_aquisicao_parcelado == 0 ? 'selected' : "") ?>>Não</option>
                <option value="1" <?= (isset($assinatura) && $assinatura->valor_aquisicao_parcelado == 1 ? 'selected' : "") ?>>Sim</option>
            </select>
        </div>
        <div class="form-group col-md-3">
            <label for="qtd_parcelas">Quantidade de Parcelas</label>
            <input type="text" class="form-control" id="qtd_parcelas" name="qtd_parcelas" value="<?= ($assinatura->valor_aquisicao_quantidade_parcelas ?? ""); ?>">
        </div>
        <div class="form-group col-md-3">
            <label for="aquisicao_quitada">Aquisição Quitada?</label>
            <select class="form-control" id="aquisicao_quitada" name="aquisicao_quitada" <?= (!$assinatura ? 'disabled' : '') ?>>
                <?php if (!$assinatura) : ?>
                    <option selected>-- SELECIONE --</option>
                <?php endif; ?>
                <option value="0" <?= (isset($assinatura) && $assinatura->valor_aquisicao_pago == 0 ? 'selected' : "") ?>>Não</option>
                <option value="1" <?= (isset($assinatura) && $assinatura->valor_aquisicao_pago == 1 ? 'selected' : "") ?>>Sim</option>
            </select>
        </div>
    </div>
    <div class="d-flex justify-content-between mt-3">
        <a href="<?= url_back() ?>" class="btn btn-warning">
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-return-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z" />
            </svg>
            Voltar
        </a>
        <button type="submit" class="btn btn-success">
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-check" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z" />
            </svg>
            Salvar
        </button>
    </div>
</form>