<?php

namespace Source\App;

use Source\Core\Controller;
use Source\Core\Session;
use Source\Model\Auth;
use Source\Model\PlanoRicoshop as ModelPlanoRicoshop;

class PlanoRicoshop extends Controller
{

    public function __construct()
    {
        parent::__construct(__DIR__ . "/../../themes/" . CONF_VIEW_THEME . "/");
        if (!$this->user = Auth::usuario()) {
            redirect("/entrar");
        }
        (new Session())->set("tab_active", "planos");
    }

    public function index(array $data)
    {

        if (!empty($data['csrf'])) {
            $success = true;
            if (!csrf_verify($data)) {
                $message = $this->message->error("Erro ao enviar, favor use o formulário")->render();
                $success = false;
            }

            if (in_array("", $data)) {
                $message = $this->message->info("Informe o nome do plano e o valor mensal para continuar.")->render();
                $success = false;
            }

            if(!filter_var($data['valor_mensal'], FILTER_VALIDATE_INT) && !preg_match(CONF_REGEX_MONEY_VALUE, $data['valor_mensal'])){
                $message = $this->message->warning("Informe um valor no formato correto")->render();
                $success = false;
            }

            if ($success) {
                $plano = new ModelPlanoRicoshop();
                $plano->boostrap(
                    $data['nome'],
                    brl_to_defaut($data["valor_mensal"])
                );
                if ($plano->save()) {
                    $success = true;
                    $message = $this->message->success("Registro inserido com sucesso")->render();
                } else {
                    $success = false;
                    $message = $plano->message()->render();
                }
            }
        }

        $planos = (new ModelPlanoRicoshop())->find()->fetch(true);

        $head = $this->seo->render(
            CONF_SITE_NAME . " - Planos Ricoshops",
            CONF_SITE_NAME . " - Planos Ricoshops",
            url("/ricoshops/planos"),
            ""
        );

        echo $this->view->render("Planos/index", [
            "head" => $head,
            "title" => "Ricoshops - Planos",
            "planos" => $planos,
            "message" => ($message ?? null)
        ]);
    }

    public function show(array $data)
    {
        $planoName = filter_var($data["nome"], FILTER_SANITIZE_STRIPPED);
        $planoName = implode(" ", explode("-", $planoName));
        $plano = (new ModelPlanoRicoshop())->find("nome = :nome", "nome={$planoName}")->fetch();

        if (!$plano) {
            redirect("/ricoshops/planos");
        }

        $head = $this->seo->render(
            CONF_SITE_NAME . " - Ricoshop Plano - {$plano->nome}",
            CONF_SITE_NAME . " - Ricoshop Plano - {$plano->nome}",
            url("/ricoshops/planos/") . str_slug($plano->nome),
            ""
        );

        echo $this->view->render("Planos/show", [
            "head" => $head,
            "title" => "Detalhes Plano",
            "plano" => $plano,
            "message" => null
        ]);
    }

    public function edit(?array $data)
    {
        $modelPlano = new ModelPlanoRicoshop();
        $plano = $modelPlano->findById($data["id"]);
        $success = true;

        if (!$plano) {
            redirect(url("/ricoshops/planos"));
        }

        if (!empty($data['csrf'])) {
            if (!csrf_verify($data)) {
                $message = $this->message->error("Erro ao enviar, favor use o formulário")->render();
                $success = false;
            }

            if (empty($data['nome']) || empty($data['valor_mensal'])) {
                $message = $this->message->warning("Informe o nome do plano e o valor mensal para continuar")->render();
                $success = false;
            }
            
            if(!filter_var($data['valor_mensal'], FILTER_VALIDATE_INT) && !preg_match(CONF_REGEX_MONEY_VALUE, $data['valor_mensal'])){
                $message = $this->message->warning("Informe um valor no formato correto")->render();
                $success = false;
            }

            if ($success) {
                $plano->id = $data["idPlano"];
                $plano->nome = $data["nome"];
                $plano->valor_mensal = brl_to_defaut($data["valor_mensal"]);
                $plano->descricao = $data["descricao"];
                if ($plano->save()) {
                    $success = true;
                    $message = $this->message->success("Registro atualizado com sucesso")->render();
                } else {
                    $success = false;
                    $message = $plano->message()->render();
                }
            }
        }

        $head = $this->seo->render(
            CONF_SITE_NAME . " - Editar {$plano->nome}",
            CONF_SITE_NAME . " - Editar {$plano->nome}",
            url("/ricoshops/planos/{$plano->id}/edit"),
            ""
        );

        echo $this->view->render("Planos/edit", [
            "head" => $head,
            "title" => "Editar Plano",
            "plano" => $plano,
            "message" => ($message ?? null)
        ]);
    }
}
