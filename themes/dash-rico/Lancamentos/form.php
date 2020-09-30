<form method="post" action="">
    <?= csrf_input(); ?>
    <input type="hidden" class="form-control" id="idAssinatura" name="idAssinatura" value="<?= ($idAssinatura ?? ""); ?>">
    <div class="form-row">
        <div class="form-group col-md-3">
            <label for="referente">Referente</label>
            <select class="form-control" id="referente" name="referente">
                <option value="">-- SELECIONE --</option>
                <option value="1">Aquisição</option>
                <option value="2">Mensalidades</option>
            </select>
        </div>
        <div class="form-group col-md-3">
            <label for="valor">Valor</label>
            <input type="text" class="form-control" id="valor" name="valor" maxlength="7" placeholder="__,__">
        </div>
        <div class="form-group col-md-3">
            <label for="data_vencimento">Vencimento / Inicio Recorrência</label>
            <input type="date" class="form-control" id="data_vencimento" name="data_vencimento">
        </div>
        <div class="form-group col-md-3">
            <label for="parcelas">Parcelas</label>
            <select class="form-control" id="parcelas" name="parcelas">
                <option value="">-- SELECIONE --</option>
                <?php for ($parc = 1; $parc <= 12; $parc++) : ?>
                    <option value="<?= $parc ?>"><?= $parc ?></option>
                <?php endfor; ?>
            </select>
        </div>
    </div>
    <div class="d-flex justify-content-between mt-3">
        <a href="<?= url("/ricoshops/assinaturas/{$assinatura->id}/financeiro") ?>" class="btn btn-warning">
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