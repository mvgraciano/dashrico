<?php

namespace Source\App;

use Source\Core\Controller;
use Source\Core\Session;
use Source\Model\AssinaturaRicoshop;
use Source\Model\Auth;
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
        if (!$this->user = Auth::usuario()) {
            redirect("/entrar");
        }
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

    public function login(array $data)
    {
        if (Auth::usuario()) {
            redirect("/");
        }
        if (!empty($data['csrf'])) {
            $success = true;
            if (!csrf_verify($data)) {
                $message = $this->message->error("Erro ao enviar, favor use o formulário")->render();
                $success = false;
            }

            if (empty($data['email']) || empty($data['password'])) {
                $message = $this->message->warning("Informe seu e-mail e senha para entrar")->render();
                $success = false;
            }

            if ($success) {
                $auth = new Auth();
                $login = $auth->login($data['email'], $data['password']);

                if ($login) {
                    redirect("/");
                } else {
                    $message = $auth->message()->before("Ooops! ")->render();
                }
            }
        }

        echo $this->view->render("login", ["message" => ($message ?? null)]);
        
    }

    public function logout()
    {
        Auth::logout();
        redirect("/entrar");
    }
}
