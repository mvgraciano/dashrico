<?php

namespace Source\App;

use DateTime;
use Source\Core\Controller;

class LancamentoFinanceiro extends Controller
{

    public function __construct()
    {
        parent::__construct(__DIR__ . "/../../themes/" . CONF_VIEW_THEME . "/");
    }

    public function index(array $data)
    {
        $assinatura = (new \Source\Model\AssinaturaRicoshop())->findById($data['id']);

        if (!$assinatura) {
            redirect("ricoshops/assinaturas");
        }

        $lancamentos = (new \Source\Model\LancamentoFinanceiro())
                        ->find("assinatura_id = :assinatura_id", "assinatura_id={$assinatura->id}")
                        ->order("vencimento ASC")
                        ->fetch(true);

        $head = $this->seo->render(
            CONF_SITE_NAME . " - Financeiro Assinaturas",
            CONF_SITE_NAME . " - Financeiro Assinaturas",
            url("/ricoshops/assinaturas"),
            ""
        );

        echo $this->view->render("Lancamentos/index", [
            "head" => $head,
            "message" => ($message ?? null),
            "assinatura" => $assinatura,
            "lancamentos" => $lancamentos
        ]);
    }

    public function new(?array $data)
    {
        $success = true;
        $assinatura = (new \Source\Model\AssinaturaRicoshop())->findById($data['id']);

        if (!$assinatura) {
            redirect("ricoshops/assinaturas");
        }

        if (!empty($data['csrf'])) {
            if (!csrf_verify($data)) {
                $message = $this->message->error("Erro ao enviar, favor use o formulário")->render();
                $success = false;
            }

            if (in_array("", $data)) {
                $message = $this->message->info("Informe todos os campos para continuar.")->render();
                $success = false;
            }

            $atualDay = (new DateTime('now'))->format("Y-m-d");
            if ($data["data_vencimento"] < $atualDay) {
                $message = $this->message->info("A data de vencimento não deve ser menor que a data atual")->render();
                $success = false;
            }

            if (!preg_match(CONF_REGEX_MONEY_VALUE, $data['valor'])) {
                $message = $this->message->info("Informe um valor no formato correto")->render();
                $success = false;
            }

            if ($success) {
                $lancamentos = [];

                $lancamento = new \Source\Model\LancamentoFinanceiro();
                $lancamento->boostrap($data["valor"], $data["data_vencimento"], $data["referente"], $data["idAssinatura"]);
                $parcelas = $data["parcelas"];
                // Aquisição
                if ($lancamento->referente == 1) {
                    if ($parcelas == 1) {
                        $lancamento->descricao = "Aquisição 1/1";
                        $lancamentos[] = $lancamento;
                    } else {
                        $valorParcela = ($lancamento->valor / $parcelas);

                        for ($parcela = 0; $parcela < $parcelas; $parcela++) {
                            $lanc = (new \Source\Model\LancamentoFinanceiro())->boostrap(
                                brl_to_defaut($valorParcela),
                                date("Y-m-d", strtotime($lancamento->vencimento . "+{$parcela}month")),
                                1,
                                $lancamento->assinatura_id
                            );
                            $lanc->descricao = "Aquisição " . ($parcela + 1) . "/{$parcelas}";
                            $lancamentos[] = $lanc;
                        }
                    }
                }

                // Mensalidade
                if ($lancamento->referente == 2) {
                    if ($parcelas == 1) {
                        $lancamento->descricao = "Mensalidade " . (new DateTime($lancamento->vencimento))->format("m/Y");
                        $lancamentos[] = $lancamento;
                    } else {
                        for ($parcela = 0; $parcela < $parcelas; $parcela++) {
                            $lanc = (new \Source\Model\LancamentoFinanceiro())->boostrap(
                                brl_to_defaut($lancamento->valor),
                                date("Y-m-d", strtotime($lancamento->vencimento . "+{$parcela}month")),
                                2,
                                $lancamento->assinatura_id
                            );
                            $dataMensal = date("Y-m-d", strtotime($lancamento->vencimento . "+{$parcela}month"));
                            $lanc->descricao = "Mensalidade " . (new DateTime($dataMensal))->format("m/y");
                            $lancamentos[] = $lanc;
                        }
                    }
                }
                $resultSuccess = 0;
                    foreach ($lancamentos as $parcela) {
                        if ($parcela->save()) {
                            $resultSuccess++;
                        }
                    }
                    if ($resultSuccess == $parcelas) {
                        $success = true;
                        $message = $this->message->success("Cadastros realizados com sucesso")->render();
                    } elseif ($resultSuccess < $parcelas && $resultSuccess > 0) {
                        $success = false;
                        $message = $this->message->warning("Não foi possível inserir alguns registros, tente novamente")->render();
                    } elseif ($resultSuccess == 0) {
                        $success = false;
                        $message = $this->message->error("Não foi possível gerar os registros, tente novamente mais tarde.")->render();
                    }
            }
        }

        $head = $this->seo->render(
            CONF_SITE_NAME . " - Novo Lançamento Financeiro",
            CONF_SITE_NAME . " - Novo Lançamento Financeiro",
            url("/ricoshops/assinaturas"),
            ""
        );

        echo $this->view->render("Lancamentos/new", [
            "head" => $head,
            "assinatura" => $assinatura,
            "message" => ($message ?? null),
            "idAssinatura" => $data['id']
        ]);
    }
}
