<?php $v->layout("_theme"); ?>

<div class="row mt-3">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center">
                        <H1>RICOSHOPS</H1>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <form>
                                    <div class="form-row align-items-center">
                                        <div class="col-md-5 my-1">
                                            <label class="sr-only" for="inlineFormInput">Nome</label>
                                            <input type="text" class="form-control mb-2" id="inlineFormInput" placeholder="Nome">
                                        </div>
                                        <div class="col-md-5 my-1">
                                            <label class="sr-only" for="inlineFormInputGroup">CNPJ</label>
                                            <input type="text" class="form-control mb-2" id="inlineFormInput" placeholder="CNPJ">
                                        </div>
                                        <div class="col-md-2">
                                            <label class="sr-only" for="inlineFormInputGroup">CNPJ</label>
                                            <button type="submit" class="btn btn-success btn-block mb-2">Cadastrar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <table class="table table-sm table-striped table-hover mt-4">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col" class="text-right">Ref</th>
                                    <th scope="col" class="text-right">CNPJ</th>
                                    <th scope="col" class="text-center">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1022</th>
                                    <td>Boteco do Chiquinho</td>
                                    <td class="text-right">BU9483</td>
                                    <td class="text-right">82.569.800/0001-92</td>
                                    <td class="text-center"><a class="btn btn-sm btn-success">Ver informações</a></td>
                                </tr>
                                <tr>
                                    <th scope="row">2455</th>
                                    <td>Mercearia do Adão</td>
                                    <td class="text-right">CC2344</td>
                                    <td class="text-right">931.967.280-64</td>
                                    <td class="text-center"><a class="btn btn-sm btn-success">Ver informações</a></td>
                                </tr>
                                <tr>
                                    <th scope="row">3195</th>
                                    <td>Bar da Deusa</td>
                                    <td class="text-right">ZX4311</td>
                                    <td class="text-right">936.982.110-41</td>
                                    <td class="text-center"><a class="btn btn-sm btn-success">Ver informações</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>