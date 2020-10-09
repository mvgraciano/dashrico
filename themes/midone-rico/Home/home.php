<?php $v->layout("_theme"); ?>

<div class="intro-y flex items-center h-10">
    <h2 class="text-lg font-medium truncate mr-5">
        Dados Mensais - (<?= $month_year ?>)
    </h2>
</div>
<div class="grid grid-cols-12 gap-6 mt-3">
    <div class="col-span-12 sm:col-span-12 xl:col-span-3 intro-y">
        <div class="report-box zoom-in">
            <div class="box p-5">
                <div class="flex">
                    <i data-feather="shopping-cart" class="report-box__icon text-theme-10"></i>
                    <div class="ml-auto">
                        <div class="report-box__indicator <?= $qtd_lojas_mes >= 12 ? 'bg-theme-9' : 'bg-theme-11' ?> tooltip cursor-pointer" title=" <?= get_percentage($qtd_lojas_mes, 12); ?>% da meta atingida">
                            <?= get_percentage($qtd_lojas_mes, 12); ?>%
                            <?= $qtd_lojas_mes >= 12 ? '<i data-feather="chevron-up" class="w-4 h-4"></i>' : '<i data-feather="chevron-down" class="w-4 h-4"></i>' ?></div>
                    </div>
                </div>
                <div class="text-3xl font-bold leading-8 mt-6"><?= $qtd_lojas_mes ?></div>
                <div class="text-base text-gray-600 mt-1">Novas Lojas Vendidas</div>
                <div>Meta: 12</div>
            </div>
        </div>
    </div>
    <div class="col-span-12 sm:col-span-12 xl:col-span-3 intro-y">
        <div class="report-box zoom-in">
            <div class="box p-5">
                <div class="flex">
                    <i data-feather="credit-card" class="report-box__icon text-theme-12"></i>
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
<div class="grid grid-cols-12 gap-6">
    <div class="col-span-12 xxl:col-span-9 grid grid-cols-12 gap-6">
        <div class="col-span-12 lg:col-span-6 mt-8">
            <div class="intro-y block sm:flex items-center h-10">
                <h2 class="text-lg font-medium truncate mr-5">
                    Faturamento
                </h2>
            </div>
            <div class="intro-y box p-5 mt-12 sm:mt-5">
                <div class="flex flex-col xl:flex-row xl:items-center">
                    <div class="flex">
                        <div>
                            <div class="text-theme-20 dark:text-gray-300 text-lg xl:text-xl font-bold">$15,000</div>
                            <div class="text-gray-600 dark:text-gray-600">Este Mês</div>
                        </div>
                        <div class="w-px h-12 border border-r border-dashed border-gray-300 dark:border-dark-5 mx-4 xl:mx-6"></div>
                        <div>
                            <div class="text-gray-600 dark:text-gray-600 text-lg xl:text-xl font-medium">$10,000</div>
                            <div class="text-gray-600 dark:text-gray-600">Último Mês</div>
                        </div>
                    </div>
                </div>
                <div class="report-chart">
                    <canvas id="report-line-chart" height="160" class="mt-6"></canvas>
                </div>
            </div>
        </div>
        <div class="col-span-12 sm:col-span-6 lg:col-span-3 mt-8">
            <div class="intro-y flex items-center h-10">
                <h2 class="text-lg font-medium truncate mr-5">
                    Top Mensal
                </h2>
            </div>
            <div class="intro-y box p-5 mt-5">
                <canvas class="mt-3" id="report-pie-chart" height="280"></canvas>
                <div class="mt-8">
                    <div class="flex items-center mt-4">
                        <div class="w-2 h-2 bg-theme-11 rounded-full mr-3"></div>
                        <span class="truncate">Agosto</span>
                        <div class="h-px flex-1 border border-r border-dashed border-gray-300 mx-3 xl:hidden"></div>
                        <span class="font-medium xl:ml-auto">15%</span>
                    </div>
                    <div class="flex items-center mt-4">
                        <div class="w-2 h-2 bg-theme-1 rounded-full mr-3"></div>
                        <span class="truncate">Setembro</span>
                        <div class="h-px flex-1 border border-r border-dashed border-gray-300 mx-3 xl:hidden"></div>
                        <span class="font-medium xl:ml-auto">65%</span>
                    </div>
                    <div class="flex items-center mt-4">
                        <div class="w-2 h-2 bg-theme-12 rounded-full mr-3"></div>
                        <span class="truncate">Outubro</span>
                        <div class="h-px flex-1 border border-r border-dashed border-gray-300 mx-3 xl:hidden"></div>
                        <span class="font-medium xl:ml-auto">10%</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-span-12 sm:col-span-6 lg:col-span-3 mt-8">
            <div class="intro-y flex items-center h-10">
                <h2 class="text-lg font-medium truncate mr-5">
                    Top Semanal
                </h2>
            </div>
            <div class="intro-y box p-5 mt-5">
                <canvas class="mt-3" id="report-donut-chart" height="280"></canvas>
                <div class="mt-8">
                    <div class="flex items-center">
                        <div class="w-2 h-2 bg-theme-11 rounded-full mr-3"></div>
                        <span class="truncate">Semana 1</span>
                        <div class="h-px flex-1 border border-r border-dashed border-gray-300 mx-3 xl:hidden"></div>
                        <span class="font-medium xl:ml-auto">15%</span>
                    </div>
                    <div class="flex items-center mt-4">
                        <div class="w-2 h-2 bg-theme-1 rounded-full mr-3"></div>
                        <span class="truncate">Semana 2</span>
                        <div class="h-px flex-1 border border-r border-dashed border-gray-300 mx-3 xl:hidden"></div>
                        <span class="font-medium xl:ml-auto">65%</span>
                    </div>
                    <div class="flex items-center mt-4">
                        <div class="w-2 h-2 bg-theme-12 rounded-full mr-3"></div>
                        <span class="truncate">Semana 3</span>
                        <div class="h-px flex-1 border border-r border-dashed border-gray-300 mx-3 xl:hidden"></div>
                        <span class="font-medium xl:ml-auto">10%</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
