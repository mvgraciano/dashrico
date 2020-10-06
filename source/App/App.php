<?php

namespace Source\App;

use Source\Core\Controller;
use Source\Core\Session;
use Source\Model\AssinaturaRicoshop;
use Source\Model\LancamentoFinanceiro;

class App extends Controller
{
    public function __construct()
    {
        parent::__construct(__DIR__ . "/../../themes/" . CONF_VIEW_THEME . "/");
        (new Session())->set("tab_active", "dashboard");
    }

    public function home()
    {
        $month = date('m');
        $year = date('Y');
        $month_year = date('m/Y');

        $qtd_lojas_novas_mes = ((new AssinaturaRicoshop())
            ->find(
                "year(created_at) = :ano AND month(created_at) = :mes",
                "ano={$year}&mes={$month}",
                "count('*') as qtd_assinaturas_mes"
            )->fetch());

        $valor_mensalidades_recebido_mes = (new LancamentoFinanceiro())
            ->find(
                "referente = :referente AND pago = :pago AND year(vencimento) = :ano AND month(vencimento) = :mes AND status = :status",
                "referente=2&pago=1&ano={$year}&mes={$month}&status=1",
                "SUM(valor) AS valor_mensalidades_recebido_mes"
            )->fetch();

        $valor_aquisicoes_recebidas_mes = (new LancamentoFinanceiro())
            ->find(
                "referente = :referente AND pago = :pago AND year(vencimento) = :ano AND month(vencimento) = :mes AND status = :status",
                "referente=1&pago=1&ano={$year}&mes={$month}&status=1",
                "SUM(valor) AS valor_aquisicao_recebido_mes"
            )->fetch();

        $valor_aquisicoes_receber_mes = (new LancamentoFinanceiro())
            ->find(
                "referente = :referente AND pago = :pago AND year(vencimento) = :ano AND month(vencimento) = :mes AND status = :status",
                "referente=1&pago=0&ano={$year}&mes={$month}&status=1",
                "SUM(valor) AS valor_aquisicao_receber_mes"
            )->fetch();

        $head = $this->seo->render(
            CONF_SITE_NAME . " - Dashboard",
            CONF_SITE_NAME . " - Dashboard",
            url(),
            ""
        );

        echo $this->view->render("Home/home", [
            "head" => $head,
            "message" => null,
            "title" => null,
            "month_year" => $month_year,
            "qtd_lojas_mes" => $qtd_lojas_novas_mes->qtd_assinaturas_mes,
            "valor_aquisicao_recebido_mes" => abs($valor_aquisicoes_recebidas_mes->valor_aquisicao_recebido_mes),
            "valor_aquisicao_receber_mes" => abs($valor_aquisicoes_receber_mes->valor_aquisicao_receber_mes),
            "valor_mensalidades_recebido_mes" => abs($valor_mensalidades_recebido_mes->valor_mensalidades_recebido_mes)
        ]);
    }
}
