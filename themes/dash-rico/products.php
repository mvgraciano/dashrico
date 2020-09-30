<?php $v->layout("_theme"); ?>

<div class="row mt-3">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center">
                        <h2>PRODUTOS</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm table-striped table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Preço</th>
                                    <th scope="col" class="text-right">Qtd. Estoque</th>
                                    <th scope="col" class="text-center">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (isset($produtos)) : ?>
                                    <?php foreach ($produtos as $produto) : ?>
                                        <?php if (!is_null($produto)) : ?>
                                            <tr>
                                                <th scope="row"><?= $produto['vpxProductId'] ?></th>
                                                <td><?= $produto['vpxProductName'] ?></td>
                                                <td>R$ <?= brl_format() ?></td>
                                                <td class="text-right">0</td>
                                                <td class="text-center"><a class="btn btn-sm btn-success">Ver informações</a></td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <?= $paginator; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>