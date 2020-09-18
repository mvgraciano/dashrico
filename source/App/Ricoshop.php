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
                $message = $this->message->info("Informe o nome da loja e o cnpj para continuar.")->render();
                $success = false;
            }

            if ($success) {
                $shop = new ModelRicoshop();
                $shop->bootstrap(
                    $data['nome'],
                    $data['cnpj']
                );
                if ($shop->save()) {
                    $success = true;
                    $message = $this->message->success("Registro atualizado com sucesso")->render();
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
            "shops" => $shops->order("created_at DESC")->limit($pager->limit())->offset($pager->offset())->fetch(true),
            "paginator" => $pager->render(),
            "message" => ($message ?? null)
        ]);
    }

    public function show(array $data)
    {
        $shopName = filter_var($data["nome"], FILTER_SANITIZE_STRIPPED);
        $name = implode(" ", explode("-", $data["nome"]));
        $shop = (new ModelRicoshop())->find("nome_empresa LIKE :nome", "nome=%{$name}%")->fetch();
        $shopSlugName = str_slug("{$name}");

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
            "shop" => $shop
        ]);
    }

    public function edit(array $data)
    {
        $modelRicoshop = new ModelRicoshop();
        $shop = $modelRicoshop->findById($data["id"])->order("");
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
                $shop->cod_referencia = $data["id"];
                $shop->dominio = $data["dominio"];
                $shop->telefone = $data["telefone"];
                $shop->email = $data["email"];
                $shop->contrato = $data["contrato"];
                $shop->status = $data["status"];
                $shop->obs = $data["osbervacao"];
                if (!$shop->save()) {
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
            "shop" => $shop,
            "message" => ($message ?? null)
        ]);
    }
}
