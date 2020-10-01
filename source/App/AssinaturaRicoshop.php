<?php

namespace Source\App;

use Source\Core\Controller;
use Source\Model\PlanoRicoshop;
use Source\Model\Ricoshop;
use Source\Support\Pager;

class AssinaturaRicoshop extends Controller
{

    public function __construct()
    {
        parent::__construct(__DIR__ . "/../../themes/" . CONF_VIEW_THEME . "/");
    }

    public function index(?array $data)
    {
        $assinaturas = (new \Source\Model\AssinaturaRicoshop())->find();
        if ($assinaturas) {
            $pager = new Pager(url("/ricoshops/assinaturas/"));
            $pager->pager($assinaturas->count(), 10, ($data['page'] ?? 1));
            $paginator = $pager->render();
        }

        $head = $this->seo->render(
            CONF_SITE_NAME . " - Assinaturas Ricoshops",
            CONF_SITE_NAME . " - Assinaturas Ricoshops",
            url("/ricoshops/assinaturas"),
            ""
        );

        echo $this->view->render("Assinaturas/index", [
            "head" => $head,
            "title" => "Ricoshops - Assinaturas",
            "assinaturas" => $assinaturas->fetch(true),
            "message" => ($message ?? null),
            "paginator" => ($paginator ?? null)
        ]);
    }

    public function show(array $data)
    {
        $assinaturaId = filter_var($data["id"], FILTER_VALIDATE_INT);
        $assinatura = (new \Source\Model\AssinaturaRicoshop())->findById($assinaturaId);

        if (!$assinatura) {
            redirect("/ricoshops/assinaturas");
        }

        $head = $this->seo->render(
            CONF_SITE_NAME . " - Ricoshop Assinatura - {$assinatura->ricoshop()->nome_empresa}",
            CONF_SITE_NAME . " - Ricoshop Assinatura - {$assinatura->ricoshop()->nome_empresa}",
            url("/ricoshops/assinaturas/{$assinatura->id}"),
            ""
        );

        echo $this->view->render("Assinaturas/show", [
            "head" => $head,
            "title" => "Detalhes Assinatura",
            "assinatura" => $assinatura,
            "message" => null
        ]);
    }

    public function edit(?array $data)
    {
        $assinatura = new \Source\Model\AssinaturaRicoshop();
        $assinatura = $assinatura->findById($data["id"]);
        $success = true;

        if (!$assinatura) {
            redirect("/ricoshops/assinaturas");
        }

        if (!empty($data['csrf'])) {
            if (!csrf_verify($data)) {
                $message = $this->message->error("Erro ao enviar, favor use o formulário")->render();
                $success = false;
            }

            if (empty($data['valor_aquisicao'])) {
                $message = $this->message->warning("Informe o Valor de Aquisição para continuar")->render();
                $success = false;
            }

            if (!preg_match(CONF_REGEX_MONEY_VALUE, $data['valor_aquisicao'])) {
                $message = $this->message->warning("Informe um valor no formato correto")->render();
                $success = false;
            }

            if ($success) {
                $assinatura->id = $data["assinatura_id"];
                $assinatura->valor_aquisicao = $data["valor_aquisicao"];
                $assinatura->valor_aquisicao_parcelado = $data["aquisicao_parcelada"];
                $assinatura->valor_aquisicao_quantidade_parcelas = $data["qtd_parcelas"];
                $assinatura->valor_aquisicao_pago = $data["aquisicao_quitada"];
                $assinatura->status = $data["status"];
                $assinatura->plano_id = $data["plano_id"];
                if ($assinatura->save()) {
                    $success = true;
                    $message = $this->message->success("Registro atualizado com sucesso")->render();
                } else {
                    $success = false;
                    $message = $assinatura->message()->render();
                }
            }
        }

        $shops = (new Ricoshop())->findById($assinatura->loja_id);
        $planos = (new PlanoRicoshop())->find()->fetch(true);

        $head = $this->seo->render(
            CONF_SITE_NAME . " - Editar Assinatura - {$assinatura->ricoshop()->nome_empresa}",
            CONF_SITE_NAME . " - Editar Assinatura - {$assinatura->ricoshop()->nome_empresa}",
            url("/ricoshops/assinaturas/{$assinatura->id}/edit"),
            ""
        );

        echo $this->view->render("Assinaturas/edit", [
            "head" => $head,
            "title" => "Editar Assinatura",
            "assinatura" => $assinatura,
            "shops" => $shops,
            "planos" => $planos,
            "message" => ($message ?? null)
        ]);
    }

    public function new(?array $data)
    {
        $success = true;

        if (!empty($data['csrf'])) {
            if (!csrf_verify($data)) {
                $message = $this->message->error("Erro ao enviar, favor use o formulário")->render();
                $success = false;
            }

            if (empty($data['valor_aquisicao']) || empty($data['loja_id']) || empty($data['plano_id'])) {
                $message = $this->message->warning("A loja, o plano e o valor de aquisição são campos obrigatórios")->render();
                $success = false;
            }

            if (!preg_match(CONF_REGEX_MONEY_VALUE, $data['valor_aquisicao'])) {
                $message = $this->message->warning("Informe um valor no formato correto")->render();
                $success = false;
            }

            if ($success) {
                $loja_id = (int)$data["loja_id"];
                $plano_id = (int)$data["plano_id"];
                $assinatura = new \Source\Model\AssinaturaRicoshop();
                $assinatura->bootstrap($data["valor_aquisicao"], $loja_id, $plano_id);
                $assinatura->valor_aquisicao_parcelado = $data["aquisicao_parcelada"];
                $assinatura->valor_aquisicao_quantidade_parcelas = $data["qtd_parcelas"];
                $assinatura->valor_aquisicao_pago = $data["aquisicao_quitada"];
                $assinatura->status = $data["status"];
                if ($assinatura->save()) {
                    $success = true;
                    $message = $this->message->success("Cadastro realizado com sucesso")->render();
                } else {
                    $success = false;
                    $message = $assinatura->message()->render();
                }
            }
        }

        $shops = (new Ricoshop())->find()->fetch(true);
        $planos = (new PlanoRicoshop())->find()->fetch(true);

        $head = $this->seo->render(
            CONF_SITE_NAME . " - Nova Assinatura",
            CONF_SITE_NAME . " - Nova Assinatura",
            url("/ricoshops/assinaturas/nova"),
            ""
        );

        echo $this->view->render("Assinaturas/new", [
            "head" => $head,
            "title" => "Nova Assinatura",
            "shops" => $shops,
            "planos" => $planos,
            "message" => ($message ?? null)
        ]);
    }
}
