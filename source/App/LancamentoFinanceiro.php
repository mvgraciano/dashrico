<?php

namespace Source\App;

use DateTime;
use Source\Core\Controller;
use Source\Core\Session;
use Source\Core\View;
use Source\Support\Email;

class LancamentoFinanceiro extends Controller
{

    public function __construct()
    {
        parent::__construct(__DIR__ . "/../../themes/" . CONF_VIEW_THEME . "/");
        (new Session())->set("tab_active", "assinaturas");
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
            "title" => "Ricoshops - Financeiro",
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

            if (!filter_var($data['valor'], FILTER_VALIDATE_INT) && !preg_match(CONF_REGEX_MONEY_VALUE, $data['valor'])) {
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
            "title" => "Novo Lançamento Financeiro",
            "assinatura" => $assinatura,
            "message" => ($message ?? null),
            "idAssinatura" => $data['id']
        ]);
    }

    public function sendMail(array $data)
    {
        $lancamento = (new \Source\Model\LancamentoFinanceiro())->findById($data["id"]);
        $assinatura = $lancamento->assinatura();
        $shop = $assinatura->ricoshop();

        $view = new View(__DIR__ . "/../../shared/views/email");
        $message = $view->render("paid", [
            "nome" => $shop->nome_empresa,
            "lancamento" => $lancamento
        ]);

        $mail = (new Email())->bootstrap(
            "Olá cliente, pague a sua fatura",
            $message,
            $shop->email,
            $shop->nome_empresa
        );

        if($mail->send()){
            $this->message->success("E-mail enviado com sucesso.")->flash();
        } else {
            $this->message->warning("Não foi possível enviar o e-mail, tente novamente em alguns minutos.")->flash();
        }
        
        redirect("/ricoshops/assinaturas/{$assinatura->id}/financeiro");
    }

    public function paid(array $data)
    {
        $lancamento = (new \Source\Model\LancamentoFinanceiro())->findById($data["id"]);
        $lancamento->pago = 1;
        if($lancamento->save()){
            $this->message->success("Pagamento confirmado com sucesso.")->flash();
        } else {
            $this->message->success("Não foi possível dar baixa no lançamento, por favor tente novamente.")->flash();
        }
        $assinatura = $lancamento->assinatura();
        redirect("/ricoshops/assinaturas/{$assinatura->id}/financeiro");
    }
    
    public function cancel(array $data)
    {
        $lancamento = (new \Source\Model\LancamentoFinanceiro())->findById($data["id"]);
        $lancamento->status = 0;
        if($lancamento->save()){
            $this->message->success("Fatura cancelada com sucesso.")->flash();
        } else {
            $this->message->success("Não foi possível cancelar a fatura, por favor tente novamente.")->flash();
        }
        $assinatura = $lancamento->assinatura();
        redirect("/ricoshops/assinaturas/{$assinatura->id}/financeiro");
    }
}
