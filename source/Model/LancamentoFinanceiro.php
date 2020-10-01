<?php

namespace Source\Model;

use Source\Core\Model;

class LancamentoFinanceiro extends Model
{

    public function __construct()
    {
        parent::__construct("lancamentos", ["id"], ["valor", "vencimento", "referente", "assinatura_id"]);
    }

    public function boostrap($valor, $vencimento, $referente, $assinatura_id)
    {
        $this->valor = $valor;
        $this->vencimento = $vencimento;
        $this->referente = $referente;
        $this->assinatura_id = $assinatura_id;
        return $this;
    }

    public function save(): bool
    {
        if (!$this->required()) {
            $this->message->warning("Todos os dados são obrigatórios");
            return false;
        }

        if (!preg_match(CONF_REGEX_MONEY_VALUE, $this->valor)) {
            $this->message->warning("Informe um valor no formato correto")->render();
            return false;
        }

        /** Update */
        if (!empty($this->id)) {
            $id = $this->id;
            $this->update($this->safe(), "id = :id", "id={$id}");
            if ($this->fail()) {
                $this->message->error("Erro ao atualizar, verifique os dados");
                return false;
            }
        }

        /** Create */
        if (empty($this->id)) {
            $id = $this->create($this->safe());
            if ($this->fail()) {
                $this->message->error("Erro ao cadastrar, verifique os dados");
                return false;
            }
        }

        $this->data = ($this->findById($id))->data();
        return true;
    }

    public function assinatura(): AssinaturaRicoshop
    {
        return (new AssinaturaRicoshop())->findById($this->assinatura_id);
    }

    public function vencimentoClass(): string
    {
        $now = new \DateTime();
        $vencimento = new \DateTime($this->vencimento);
        $expire = $now->diff($vencimento);

        if (!$expire->days && $expire->invert) {
            // return 'text-secondary';
            return 'text-gray-700';
        } elseif (!$expire->invert) {
            // return 'text-success';
            return 'text-theme-9';
        } else {
            // return 'text-danger';
            return 'text-theme-6';
        }
    }
}
