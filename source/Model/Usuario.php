<?php

namespace Source\Model;

use Source\Core\Model;

class Usuario extends Model
{
    public function __construct()
    {
        parent::__construct("usuarios", ["id"], ["nome", "email", "senha"]);
    }

    /**
     * @param string $nome
     * @param string $email
     * @param string $senha
     * @return Usuario
     */
    public function bootstrap(
        string $nome,
        string $email,
        string $senha
    ): Usuario {
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;
        return $this;
    }

    /**
     * @param string $email
     * @param string $columns
     * @return null|Usuario
     */
    public function findByEmail(string $email, string $columns = "*"): ?Usuario
    {
        $find = $this->find("email = :email", "email={$email}", $columns);
        return $find->fetch();
    }

    /**
     * @return bool
     */
    public function save(): bool
    {
        if (!$this->required()) {
            $this->message->warning("Nome, e-mail e senha são obrigatórios");
            return false;
        }

        if (!is_email($this->email)) {
            $this->message->warning("O e-mail informado não tem um formato válido");
            return false;
        }

        $this->senha = passwd($this->senha);

        /** Update */
        if (!empty($this->id)) {
            $userId = $this->id;

            if ($this->find("email = :e AND id != :id", "e={$this->email}&id={$userId}", "id")->fetch()) {
                $this->message->warning("O e-mail informado já está cadastrado");
                return false;
            }

            $this->update($this->safe(), "id = :id", "id={$userId}");
            if ($this->fail()) {
                $this->message->error("Erro ao atualizar, verifique os dados");
                return false;
            }
        }

        /** Create */
        if (empty($this->id)) {
            if ($this->findByEmail($this->email, "id")) {
                $this->message->warning("O e-mail informado já está cadastrado");
                return false;
            }

            $userId = $this->create($this->safe());
            if ($this->fail()) {
                $this->message->error("Erro ao cadastrar, verifique os dados");
                return false;
            }
        }

        $this->data = ($this->findById($userId))->data();
        return true;
    }
}
