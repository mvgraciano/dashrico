<?php $v->layout("_theme", ["title" => "Pague a sua fatura"]); ?>

<h2>Olá <?= $nome ?>.</h2>
<p>Você está recebendo este e-mail apenas como um lembrete, pois faltam menos de 15 dias para o vencimento de sua próxima fatura.</p>
<p><b>Descrição da Fatura: </b><?= $lancamento->descricao ?></p>
<p><b>Valor:</b> <?= brl_format($lancamento->valor) ?></p>
<p><b>Vencimento:</b> <?= date_fmt($lancamento->vencimento, "d/m/Y") ?></p>
