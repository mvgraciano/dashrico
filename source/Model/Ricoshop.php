<?php

namespace Source\Model;

use Source\Core\Model;

class Ricoshop extends Model
{

    public function __construct()
    {
        parent::__construct("ricoshops", ["id"], ["nome_empresa", "cnpj", "email"]);
    }

    /**
     * @param string $nome_empresa
     * @param string $cnpj
     * @return Ricoshop
     */
    public function bootstrap(
        string $nome_empresa,
        string $cnpj,
        string $email
    ): Ricoshop {
        $this->nome_empresa = $nome_empresa;
        $this->email = $email;
        $this->cnpj = str_clean_special_chars($cnpj);
        return $this;
    }

    /**
     * @param string $cnpj
     * @param string $columns
     * @return null|Ricoshop
     */
    public function findByCnpj(string $cnpj, string $columns = "*"): ?Ricoshop
    {
        $find = $this->find("cnpj = :cnpj", "cnpj={$cnpj}", $columns);
        return $find->fetch();
    }

    /**
     * @return bool
     */
    public function save(): bool
    {
        if (!$this->required()) {
            $this->message->warning("Nome, CNPJ e e-mail são obrigatórios");
            return false;
        }

        if (!is_cnpj($this->cnpj)) {
            $this->message->warning("O CNPJ informado é inválido");
            return false;
        }

        if (!is_email($this->email)) {
            $this->message->warning("O e-mail informado é inválido");
            return false;
        }

        /** Ricoshop Update */
        if (!empty($this->id)) {
            $shopId = $this->id;

            if ($this->find("cnpj = :cnpj AND id != :id", "cnpj={$this->cnpj}&id={$shopId}", "id")->fetch()) {
                $this->message->warning("O CNPJ informado já está cadastrado");
                return false;
            }

            $this->update($this->safe(), "id = :id", "id={$shopId}");
            if ($this->fail()) {
                $this->message->error("Erro ao atualizar, verifique os dados");
                return false;
            }
        }

        /** Ricoshop Create */
        if (empty($this->id)) {
            if ($this->findByCnpj($this->cnpj, "id")) {
                $this->message->warning("O CNPJ informado já está cadastrado");
                return false;
            }

            $shopId = $this->create($this->safe());
            if ($this->fail()) {
                $this->message->error("Erro ao cadastrar, verifique os dados");
                return false;
            }
        }

        $this->data = ($this->findById($shopId))->data();
        return true;
    }

    /**
     * @return AssinaturaRicoshop|null
     */
    public function assinatura(): ?AssinaturaRicoshop
    {
        $assinatura = (new AssinaturaRicoshop())->find("loja_id = :loja_id", "loja_id={$this->id}")->fetch();
        if ($assinatura) {
            return $assinatura;
        }

        return null;
    }

    public function verificarStatus(): string
    {
        $status = $this->status;
        if ($status == 0) {
            return 'Em Construção';
        }

        if ($status == 1) {
            return 'Ativo';
        }

        if ($status == 2) {
            return 'Pausado';
        }

        return 'Cancelado';
    }
}
