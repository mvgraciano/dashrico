<div class="row">
    <div class="col-md-12 text-center">
        <form method="post" action="">
            <?= csrf_input(); ?>
            <div class="form-row align-items-center">
                <div class="col-md-5 my-1">
                    <label class="sr-only" for="nome">Nome</label>
                    <input type="text" class="form-control mb-2" id="nome" name="nome" placeholder="Nome">
                </div>
                <div class="col-md-5 my-1">
                    <label class="sr-only" for="cnpj">CNPJ</label>
                    <input type="text" class="form-control mb-2" id="cnpj" name="cnpj" data-mask="00.000.000/0000-00" maxlength="14" placeholder="___.___.___-__">
                </div>
                <div class="col-md-2">
                    <label class="sr-only" for="inlineFormInputGroup">CNPJ</label>
                    <button type="submit" class="btn btn-success btn-block mb-2">Cadastrar</button>
                </div>
            </div>
        </form>
    </div>
</div>