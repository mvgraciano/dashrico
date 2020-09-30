<form method="post" action="">
    <?= csrf_input(); ?>
    <input type="hidden" class="form-control" id="idPlano" name="idPlano" value="<?= ($plano->id ?? ""); ?>">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="<?= ($plano->nome ?? ""); ?>">
        </div>
        <div class="form-group col-md-6">
            <label for="valor_mensal">Valor Mensal</label>
            <input type="text" class="form-control" id="valor_mensal" name="valor_mensal" value="<?= ($plano->valor_mensal ?? ""); ?>" maxlength="7" placeholder="__,__">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="descricao">Descrição</label>
            <textarea class="form-control" id="descricao" name="descricao" rows="3"><?= ($plano->descricao ?? ""); ?></textarea>
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