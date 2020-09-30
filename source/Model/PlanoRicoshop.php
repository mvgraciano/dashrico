<?php

namespace Source\Model;

use Source\Core\Model;

class PlanoRicoshop extends Model{

    public function __construct()
    {
        parent::__construct("planos_ricoshops", ["id"], ["nome", "valor_mensal"]);
    }

    /**
     * @param string $nome
     * @param float $valor_mensal
     * @return PlanoRicoshop
     */
    public function boostrap(string $nome, float $valor_mensal){
        $this->nome = $nome;
        $this->valor_mensal = $valor_mensal;
        return $this;
    }

    public function save(): bool
    {
        if(!$this->required()){
            $this->message->warning("Nome e Valor Mensal são obrigatórios");
            return false;
        }

        /** Update */
        if (!empty($this->id)) {
            $planoId = $this->id;

            if ($this->find("nome = :nome AND id != :id", "nome={$this->nome}&id={$planoId}", "id")->fetch()) {
                $this->message->warning("O nome informado já está cadastrado");
                return false;
            }

            $this->update($this->safe(), "id = :id", "id={$planoId}");
            if ($this->fail()) {
                $this->message->error("Erro ao atualizar, verifique os dados");
                return false;
            }
        }

        /** Create */
        if(empty($this->id)){
            if ($this->find("nome = :nome", "nome={$this->nome}", "id")->fetch()) {
                $this->message->warning("O nome informado já está cadastrado");
                return false;
            }

            $planoId = $this->create($this->safe());
            if ($this->fail()) {
                $this->message->error("Erro ao cadastrar, verifique os dados");
                return false;
            }
        }

        $this->data = ($this->findById($planoId))->data();
        return true;
    }
}