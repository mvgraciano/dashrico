<form method="post" action="">
    <?= csrf_input(); ?>
    <input type="hidden" class="form-control" id="idShop" name="idShop" value="<?= ($shop->id ?? ""); ?>">
    <div class="form-row">
        <div class="form-group col-md-2">
            <label for="referencia">Cód. Referencia</label>
            <input type="text" class="form-control" id="referencia" name="referencia" value="<?= ($shop->cod_referencia ?? ""); ?>">
        </div>
        <div class="form-group col-md-5">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="<?= ($shop->nome_empresa ?? ""); ?>">
        </div>
        <div class="form-group col-md-5">
            <label for="cnpj">CNPJ</label>
            <input type="text" class="form-control" id="cnpj" name="cnpj" value="<?= ($shop->cnpj ?? ""); ?>" data-mask="00.000.000/0000-00" maxlength="14" placeholder="___.___.___-__">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="email">E-mail</label>
            <input type="text" class="form-control" id="email" name="email" value="<?= ($shop->email ?? ""); ?>">
        </div>
        <div class="form-group col-md-6">
            <label for="telefone">Telefone</label>
            <input type="text" class="form-control" id="telefone" name="telefone" value="<?= ($shop->telefone ?? ""); ?>" data-mask="(00)00000-0000" maxlength="11" placeholder="(__)_____-____">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="dominio">Dominio</label>
            <input type="text" class="form-control" id="dominio" name="dominio" value="<?= ($shop->dominio ?? ""); ?>">
        </div>
        <div class="form-group col-md-4">
            <label for="status">Status</label>
            <select id="status" name="status" class="form-control">
                <?php if (!$shop) : ?>
                    <option selected>-- SELECIONE --</option>
                <?php endif; ?>
                <option value="1" <?= ($shop->status == 1 ? 'selected' : "") ?>>Ativo</option>
                <option value="2" <?= ($shop->status == 2 ? 'selected' : "") ?>>Pausado</option>
                <option value="3" <?= ($shop->status == 3 ? 'selected' : "") ?>>Cancelado</option>
            </select>
        </div>
        <div class="form-group col-md-4">
            <label for="contrato_enviado">Contrato Enviado?</label>
            <select id="contrato_enviado" name="contrato" class="form-control">
                <?php if (!$shop) : ?>
                    <option selected>-- SELECIONE --</option>
                <?php endif; ?>
                <option value="0" <?= ($shop->contrato == 0 ? 'selected' : "") ?>>Não</option>
                <option value="1" <?= ($shop->contrato == 1 ? 'selected' : "") ?>>Sim</option>
            </select>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="osbervacao">Observação</label>
            <textarea class="form-control" id="osbervacao" name="osbervacao" rows="3"><?= ($shop->obs ?? ""); ?></textarea>
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