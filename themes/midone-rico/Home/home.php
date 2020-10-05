<?php $v->layout("_theme"); ?>

<div class="intro-y flex items-center h-10">
    <h2 class="text-lg font-medium truncate mr-5">
        Dados Mensais - (10/2020)
    </h2>
</div>
<div class="grid grid-cols-12 gap-6 mt-3">
    <div class="col-span-12 sm:col-span-12 xl:col-span-3 intro-y">
        <div class="report-box zoom-in">
            <div class="box p-5">
                <div class="flex">
                    <i data-feather="shopping-cart" class="report-box__icon text-theme-10"></i>
                    <div class="ml-auto">
                        <div class="report-box__indicator bg-theme-9 tooltip cursor-pointer" title="33% Higher than last month"> 33% <i data-feather="chevron-up" class="w-4 h-4"></i> </div>
                    </div>
                </div>
                <div class="text-3xl font-bold leading-8 mt-6"><?= $qtd_lojas ?></div>
                <div class="text-base text-gray-600 mt-1">Novas Lojas Vendidas</div>
                <div>Meta: 10</div>
            </div>
        </div>
    </div>
    <div class="col-span-12 sm:col-span-12 xl:col-span-3 intro-y">
        <div class="report-box zoom-in">
            <div class="box p-5">
                <div class="flex">
                    <i data-feather="credit-card" class="report-box__icon text-theme-11"></i>
                </div>
                <div class="text-3xl font-bold leading-8 mt-6"><?= brl_format($valor_mensalidades_recebido_mes) ?></div>
                <div class="text-base text-gray-600 mt-1">Valor de Mensalidades Recebido no Mês Atual</div>
            </div>
        </div>
    </div>
    <div class="col-span-12 sm:col-span-12 xl:col-span-3 intro-y">
        <div class="report-box zoom-in">
            <div class="box p-5">
                <div class="flex">
                    <i data-feather="credit-card" class="report-box__icon text-theme-11"></i>
                </div>
                <div class="text-3xl font-bold leading-8 mt-6"><?= brl_format($valor_aquisicao_recebido_mes) ?></div>
                <div class="text-base text-gray-600 mt-1">Valor de Aquisição Recebido no Mês Atual</div>
            </div>
        </div>
    </div>
    <div class="col-span-12 sm:col-span-12 xl:col-span-3 intro-y">
        <div class="report-box zoom-in">
            <div class="box p-5">
                <div class="flex">
                    <i data-feather="dollar-sign" class="report-box__icon text-theme-9"></i>
                </div>
                <div class="text-3xl font-bold leading-8 mt-6"><?= brl_format($valor_aquisicao_receber_mes) ?></div>
                <div class="text-base text-gray-600 mt-1">Valor de Aquisição a Receber no Mês Atual</div>
            </div>
        </div>
    </div>
</div>

<!-- <div class="intro-y flex items-center h-10">
    <h2 class="text-lg font-medium truncate mr-5">
        Aquisição - Total
    </h2>
</div>
<div class="grid grid-cols-12 gap-6 mt-3">
    <div class="col-span-12 sm:col-span-12 xl:col-span-4 intro-y">
        <div class="report-box zoom-in">
            <div class="box p-5">
                <div class="flex">
                    <i data-feather="shopping-cart" class="report-box__icon text-theme-10"></i>
                </div>
                <div class="text-3xl font-bold leading-8 mt-6"><?= $qtd_lojas ?></div>
                <div class="text-base text-gray-600 mt-1">Lojas Vendidas</div>
            </div>
        </div>
    </div>
    <div class="col-span-12 sm:col-span-12 xl:col-span-4 intro-y">
        <div class="report-box zoom-in">
            <div class="box p-5">
                <div class="flex">
                    <i data-feather="credit-card" class="report-box__icon text-theme-11"></i>
                </div>
                <div class="text-3xl font-bold leading-8 mt-6"><?= brl_format($valor_aquisicao_recebido) ?></div>
                <div class="text-base text-gray-600 mt-1">Valor de Aquisição Recebido</div>
            </div>
        </div>
    </div>
    <div class="col-span-12 sm:col-span-12 xl:col-span-4 intro-y">
        <div class="report-box zoom-in">
            <div class="box p-5">
                <div class="flex">
                    <i data-feather="dollar-sign" class="report-box__icon text-theme-9"></i>
                </div>
                <div class="text-3xl font-bold leading-8 mt-6"><?= brl_format($valor_aquisicao_receber) ?></div>
                <div class="text-base text-gray-600 mt-1">Valor de Aquisição a Receber</div>
            </div>
        </div>
    </div>
</div>

<div class="intro-y flex items-center h-10 mt-5">
    <h2 class="text-lg font-medium truncate mr-5">
        Aquisição - Mensal (<?= $month_year ?>)
    </h2>
</div>
<div class="grid grid-cols-12 gap-6 mt-3">
    <div class="col-span-12 sm:col-span-12 xl:col-span-4 intro-y">
        <div class="report-box zoom-in">
            <div class="box p-5">
                <div class="flex">
                    <i data-feather="shopping-cart" class="report-box__icon text-theme-10"></i>
                    <div class="ml-auto">
                        <div class="report-box__indicator bg-theme-9 tooltip cursor-pointer" title="33% Higher than last month"> 33% <i data-feather="chevron-up" class="w-4 h-4"></i> </div>
                    </div>
                </div>
                <div class="text-3xl font-bold leading-8 mt-6"><?= $qtd_lojas ?></div>
                <div class="text-base text-gray-600 mt-1">Novas Lojas Vendidas</div>
                <div>Meta: 10</div>
            </div>
        </div>
    </div>
    <div class="col-span-12 sm:col-span-12 xl:col-span-4 intro-y">
        <div class="report-box zoom-in">
            <div class="box p-5">
                <div class="flex">
                    <i data-feather="credit-card" class="report-box__icon text-theme-11"></i>
                </div>
                <div class="text-3xl font-bold leading-8 mt-6"><?= brl_format($valor_aquisicao_recebido_mes) ?></div>
                <div class="text-base text-gray-600 mt-1">Valor de Aquisição Recebido no Mês</div>
            </div>
        </div>
    </div>
    <div class="col-span-12 sm:col-span-12 xl:col-span-4 intro-y">
        <div class="report-box zoom-in">
            <div class="box p-5">
                <div class="flex">
                    <i data-feather="dollar-sign" class="report-box__icon text-theme-9"></i>
                </div>
                <div class="text-3xl font-bold leading-8 mt-6"><?= brl_format($valor_aquisicao_receber_mes) ?></div>
                <div class="text-base text-gray-600 mt-1">Valor de Aquisição a Receber no Mês</div>
            </div>
        </div>
    </div>
</div> -->
<!-- <div class="intro-y flex items-center h-10 mt-5">
    <h2 class="text-lg font-medium truncate mr-5">
        Mensalidades
    </h2>
</div>
<div class="grid grid-cols-12 gap-6 mt-3">
    <div class="col-span-12 sm:col-span-12 xl:col-span-4 intro-y">
        <div class="report-box zoom-in">
            <div class="box p-5">
                <div class="flex">
                    <i data-feather="shopping-cart" class="report-box__icon text-theme-10"></i>
                </div>
                <div class="text-3xl font-bold leading-8 mt-6"><?= $qtd_mensalidades_receber_mes ?></div>
                <div class="text-base text-gray-600 mt-1">Mensalidades a Receber no mês</div>
            </div>
        </div>
    </div>
    <div class="col-span-12 sm:col-span-12 xl:col-span-4 intro-y">
        <div class="report-box zoom-in">
            <div class="box p-5">
                <div class="flex">
                    <i data-feather="credit-card" class="report-box__icon text-theme-11"></i>
                </div>
                <div class="text-3xl font-bold leading-8 mt-6"><?= brl_format($valor_mensalidades_recebido_mes) ?></div>
                <div class="text-base text-gray-600 mt-1">Valor de Mensalidades Recebido no Mês Atual</div>
            </div>
        </div>
    </div>
    <div class="col-span-12 sm:col-span-12 xl:col-span-4 intro-y">
        <div class="report-box zoom-in">
            <div class="box p-5">
                <div class="flex">
                    <i data-feather="monitor" class="report-box__icon text-theme-12"></i>
                </div>
                <div class="text-3xl font-bold leading-8 mt-6"><?= brl_format($valor_recebido_mensalidades) ?></div>
                <div class="text-base text-gray-600 mt-1">Valor Total Recebido com Mensalidades</div>
            </div>
        </div>
    </div>
</div> -->