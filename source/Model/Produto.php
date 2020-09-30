<?php

namespace Source\Model;


class Produto
{
    public function reloadProducts()
    {
        $fc = file_get_contents('http://192.168.0.192/modules/product/servlet/ProductServlet.class.php?action=ws-product');
        if ($fc) {
            $file = fopen(__DIR__ . '/../../files/products.json', "w");
            file_put_contents(
                __DIR__ . '/../../files/products.json',
                str_replace("Erro em operação no Banco de Dados SQL Server: o erro não foi reconhecido pelo sistema. Informe ao desenvolvedor o seguinte código: 20018", "", $fc)
            );
            fclose($file);
        }
    }

    public function load_all()
    {
        $products = readJsonFile(__DIR__ . '/../../files/products.json');
        if ($products) {
            return $products['productList'];
        }
        return $products;
    }

    public function findById(int $id)
    {
        foreach (readJsonFile(__DIR__ . '/../../files/products.json')['productList'] as $product) {
            if ($product['vpxProductId'] == $id) {
                return $product;
            }
        }
        return null;
    }

    public function load_qtd_products(int $qtd = 10, int $produtoInicial = 1)
    {
        $i = ($produtoInicial == 0 ? 0 : $produtoInicial - 1);
        $products = [];
        $productList = readJsonFile(__DIR__ . '/../../files/products.json')['productList'];
        while ($i < $qtd + ($produtoInicial - 1) && $i < count($this->load_all())) {
            if ($productList[$i]) {
                array_push($products, $productList[$i]);
            }
            $i++;
        }
        return $products;
    }

    public function load_per_page(int $qtd = 10, int $page = 1)
    {
        $inicial = ($page - 1) * $qtd;
        return $this->load_qtd_products($qtd, $inicial);
    }
}
