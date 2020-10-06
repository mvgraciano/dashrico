<?php

namespace Source\App;

use Source\Core\Controller;
use Source\Model\Ricoshop as ModelRicoshop;
use Source\Support\Pager;

class Ricoshop extends Controller
{
    public function __construct()
    {
        parent::__construct(__DIR__ . "/../../themes/" . CONF_VIEW_THEME . "/");
    }

    public function ricoshopsIndex(array $data)
    {
        if (!empty($data['csrf'])) {
            $success = true;
            if (!csrf_verify($data)) {
                $message = $this->message->error("Erro ao enviar, favor use o formulário")->render();
                $success = false;
            }

            if (in_array("", $data)) {
                $message = $this->message->info("Informe o nome da loja, e-mail e o cnpj para continuar.")->render();
                $success = false;
            }

            if ($success) {
                $shop = new ModelRicoshop();
                $shop->bootstrap(
                    $data['nome'],
                    $data['cnpj'],
                    $data['email']
                );
                if ($shop->save()) {
                    $success = true;
                    $message = $this->message->success("Cadastro realizado com sucesso")->render();
                } else {
                    $success = false;
                    $message = $shop->message()->render();
                }
            }
        }

        $shops = (new ModelRicoshop())->find();
        $pager = new Pager(url("/ricoshops/"));
        $pager->pager($shops->count(), 10, ($data['page'] ?? 1));

        $head = $this->seo->render(
            CONF_SITE_NAME . " - Ricoshops",
            CONF_SITE_NAME . " - Ricoshops",
            url("/ricoshops"),
            ""
        );

        echo $this->view->render("Ricoshops/index", [
            "head" => $head,
            "title" => "Ricoshops - Cadastros",
            "shops" => $shops->order("created_at DESC")->limit($pager->limit())->offset($pager->offset())->fetch(true),
            "paginator" => $pager->render(),
            "message" => ($message ?? null)
        ]);
    }

    public function show(array $data)
    {
        $shopName = filter_var($data["nome"], FILTER_SANITIZE_STRIPPED);
        $name = implode(" ", explode("-", $data["nome"]));
        $shop = (new ModelRicoshop())->find("nome_empresa LIKE :nome", "nome={$name}%")->fetch();
        
        if (!$shop) {
            redirect("/ricoshops");
        }

        $head = $this->seo->render(
            CONF_SITE_NAME . " - {$shop->nome_empresa}",
            CONF_SITE_NAME . " - {$shop->nome_empresa}",
            url("/ricoshops/loja/") . str_slug($shop->nome_empresa),
            ""
        );

        echo $this->view->render("Ricoshops/show", [
            "head" => $head,
            "title" => "Detalhes Loja",
            "shop" => $shop,
            "message" => ($message ?? null)
        ]);
    }

    public function edit(array $data)
    {
        $modelRicoshop = new ModelRicoshop();
        $shop = $modelRicoshop->findById($data["id"]);
        $success = true;

        if (!$shop) {
            redirect(url("/ricoshops/"));
        }

        if (!empty($data['csrf'])) {
            if (!csrf_verify($data)) {
                $message = $this->message->error("Erro ao enviar, favor use o formulário")->render();
                $success = false;
            }

            if (empty($data['nome']) || empty($data['cnpj'])) {
                $message = $this->message->warning("Informe o nome da empresa e o CNPJ para continuar")->render();
                $success = false;
            }

            if ($success) {
                $shop->id = $data["idShop"];
                $shop->nome_empresa = $data["nome"];
                $shop->cnpj = str_clean_special_chars($data["cnpj"]);
                $shop->cod_referencia = (!empty($data["referencia"]) ? $data["referencia"] : null);
                $shop->dominio = (!empty($data["dominio"]) ? $data["dominio"] : null);
                $shop->telefone = (!empty($data["telefone"]) ? str_clean_special_chars($data["telefone"]) : null);
                $shop->email = (!empty($data["email"]) ? $data["email"] : null);
                $shop->contrato = $data["contrato"];
                $shop->status = $data["status"];
                $shop->obs = (!empty($data["osbervacao"]) ? $data["osbervacao"] : null);
                if ($shop->save()) {
                    $success = true;
                    $message = $this->message->success("Registro atualizado com sucesso")->render();
                } else {
                    $success = false;
                    $message = $shop->message()->render();
                }
            }
        }

        $head = $this->seo->render(
            CONF_SITE_NAME . " - Editar {$shop->nome_empresa}",
            CONF_SITE_NAME . " - Editar {$shop->nome_empresa}",
            url("/ricoshops/loja/{$shop->id}/edit"),
            ""
        );

        echo $this->view->render("Ricoshops/edit", [
            "head" => $head,
            "title" => "Editar Loja",
            "shop" => $shop,
            "message" => ($message ?? null)
        ]);
    }
}
