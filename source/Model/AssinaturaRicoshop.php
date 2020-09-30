<?php

namespace Source\Model;

use Source\Core\Model;

class AssinaturaRicoshop extends Model{
    public function __construct()
    {
        parent::__construct("assinaturas_planos", ["id"], ["valor_aquisicao", "plano_id", "loja_id"]);
    }

    public function bootstrap(float $valor_aquisicao, int $loja_id, int $plano_id){
        $this->valor_aquisicao = $valor_aquisicao;
        $this->loja_id = $loja_id;
        $this->plano_id = $plano_id;
        return $this;
    }

    public function save(): bool
    {
        if(!$this->required()){
            $this->message->warning("Valor de Aquisição é obrigatório");
            return false;
        }

        /** Update */
        if (!empty($this->id)) {
            $assinaturaId = $this->id;

            $this->update($this->safe(), "id = :id", "id={$assinaturaId}");
            if ($this->fail()) {
                $this->message->error("Erro ao atualizar, verifique os dados");
            }
        }

        /** Create */
        if(empty($this->id)){
            if ($this->find("loja_id = :loja_id", "loja_id={$this->loja_id}", "id")->fetch()) {
                $this->message->warning("Esta loja já possui uma assinatura cadastrada");
                return false;
            }

            $assinaturaId = $this->create($this->safe());
            if ($this->fail()) {
                $this->message->error("Erro ao cadastrar, verifique os dados");
                return false;
            }
        }

        $this->data = ($this->findById($assinaturaId))->data();
        return true;
    }

    /**
     * @return PlanoRicoshop|null
     */
    public function plano(): ?PlanoRicoshop
    {
        if ($this->plano_id) {
            return (new PlanoRicoshop())->findById($this->plano_id);
        }
        return null;
    }

    /**
     * @return Ricoshop|null
     */
    public function ricoshop(): ?Ricoshop
    {
        if ($this->loja_id){
            return (new Ricoshop())->findById($this->loja_id);
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