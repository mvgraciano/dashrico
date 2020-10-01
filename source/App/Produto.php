<?php

namespace Source\App;

use Source\Core\Controller;
use Source\Model\Produto as ModelProduto;
use Source\Support\Pager;

class Produto extends Controller
{
    public function __construct()
    {
        parent::__construct(__DIR__ . "/../../themes/" . CONF_VIEW_THEME . "/");
        // $model =(new ModelProduto())->reloadProducts();
    }

    public function productsIndex(?array $data)
    {
        $productList = (new ModelProduto())->load_all();
        $dataPage = ($data['page'] ?? 1);
        $pager = new Pager(url("/produtos/"));
        $pager->pager(count($productList), 10, $dataPage);

        $head = $this->seo->render(
            CONF_SITE_NAME . " - Produtos",
            CONF_SITE_NAME . " - Produtos",
            url("/produtos"),
            ""
        );

        echo $this->view->render("products", [
            "head" => $head,
            "title" => "Produtos",
            "produtos" => (new ModelProduto())->load_per_page(10, $dataPage),
            "paginator" => $pager->render(),
            "message" => null
        ]);
    }
}
