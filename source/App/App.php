<?php

namespace Source\App;

use Source\Core\Controller;
use Source\Model\AssinaturaRicoshop;
use Source\Model\LancamentoFinanceiro;

class App extends Controller
{
    public function __construct()
    {
        parent::__construct(__DIR__ . "/../../themes/" . CONF_VIEW_THEME . "/");
    }

    public function home()
    {
        $qtd_lojas = ((new AssinaturaRicoshop())->find(null, null, "count('*') as qtd_assinaturas")->fetch())->qtd_assinaturas;

        $aquisicoes_recebidas = (new LancamentoFinanceiro())
            ->find(
                "referente = :referente AND pago = :pago",
                "referente=1&pago=1",
                "SUM(valor) AS valor_aquisicao_recebido"
            )->fetch();

        $aquisicoes_receber = (new LancamentoFinanceiro())
            ->find(
                "referente = :referente AND pago = :pago",
                "referente=1&pago=0",
                "SUM(valor) AS valor_aquisicao_receber"
            )->fetch();

        $month = date('m');
        $year = date('Y');
        $month_year = date('m/Y');

        $qtd_lojas_novas_mes = ((new AssinaturaRicoshop())
            ->find(
                "year(created_at) = :ano AND month(created_at) = :mes",
                "ano={$year}&mes={$month}",
                "count('*') as qtd_assinaturas_mes"
            )->fetch());

        $valor_aquisicoes_recebidas_mes = (new LancamentoFinanceiro())
            ->find(
                "referente = :referente AND pago = :pago AND year(vencimento) = :ano AND month(vencimento) = :mes",
                "referente=1&pago=1&ano={$year}&mes={$month}",
                "SUM(valor) AS valor_aquisicao_recebido_mes"
            )->fetch();

        $valor_aquisicoes_receber_mes = (new LancamentoFinanceiro())
            ->find(
                "referente = :referente AND pago = :pago AND year(vencimento) = :ano AND month(vencimento) = :mes",
                "referente=1&pago=0&ano={$year}&mes={$month}",
                "SUM(valor) AS valor_aquisicao_receber_mes"
            )->fetch();

        $qtd_mensalidades_receber_mes = (new LancamentoFinanceiro())
            ->find(
                "referente = :referente AND pago = :pago AND year(vencimento) = :ano AND month(vencimento) = :mes",
                "referente=2&pago=0&ano={$year}&mes={$month}",
                "count('*') as qtd_mensalidades_receber_mes"
            )->fetch();

        $valor_mensalidades_recebido_mes = (new LancamentoFinanceiro())
            ->find(
                "referente = :referente AND pago = :pago AND year(vencimento) = :ano AND month(vencimento) = :mes",
                "referente=2&pago=1&ano={$year}&mes={$month}",
                "SUM(valor) AS valor_mensalidades_recebido_mes"
            )->fetch();

        $valor_recebido_mensalidades = (new LancamentoFinanceiro())
            ->find(
                "referente = :referente AND pago = :pago",
                "referente=2&pago=1",
                "SUM(valor) AS valor_recebido_mensalidades"
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
            "qtd_lojas" => $qtd_lojas,
            "valor_aquisicao_recebido" => abs($aquisicoes_recebidas->valor_aquisicao_recebido),
            "valor_aquisicao_receber" => abs($aquisicoes_receber->valor_aquisicao_receber),
            "month_year" => $month_year,
            "qtd_lojas_mes" => $qtd_lojas_novas_mes,
            "valor_aquisicao_recebido_mes" => abs($valor_aquisicoes_recebidas_mes->valor_aquisicao_recebido_mes),
            "valor_aquisicao_receber_mes" => abs($valor_aquisicoes_receber_mes->valor_aquisicao_receber_mes),
            "qtd_mensalidades_receber_mes" => abs($qtd_mensalidades_receber_mes->qtd_mensalidades_receber_mes),
            "valor_mensalidades_recebido_mes" => abs($valor_mensalidades_recebido_mes->valor_mensalidades_recebido_mes),
            "valor_recebido_mensalidades" => abs($valor_recebido_mensalidades->valor_recebido_mensalidades)
        ]);
        // redirect("/ricoshops");
    }
}
