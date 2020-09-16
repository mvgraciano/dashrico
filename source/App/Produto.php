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
    }

    public function productsIndex(?array $data)
    {
        $productList = (new ModelProduto())->load_all();
        $dataPage = ($data['page'] ?? 1);
        $pager = new Pager(url("/produtos/"));
        $pager->pager(count($productList), 10, $dataPage);

        echo $this->view->render("products", [
            "produtos" => (new ModelProduto())->load_per_page(10, $dataPage),
            "paginator" => $pager->render()
        ]);
    }
}
