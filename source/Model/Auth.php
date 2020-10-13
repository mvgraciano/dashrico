<?php

namespace Source\Model;

use Source\Core\Model;
use Source\Core\Session;
use Source\Model\Usuario;

class Auth extends Model
{
    public function __construct()
    {
        parent::__construct("usuarios", ["id"], ["email", "senha"]);
    }

    /**
     * @return Usuario|null
     */
    public static function usuario(): ?Usuario
    {
        $session = new Session();
        if (!$session->has("authUser")) {
            return null;
        }

        return (new Usuario())->findById($session->authUser);
    }

    /**
     * @param string $email
     * @param string $senha
     * @return boolean
     */
    public function login(string $email, string $senha): bool
    {
        if (!is_email($email)){
            $this->message->warning("O e-mail informado é inválido.");
            return false;
        }

        $user = (new Usuario())->findByEmail($email);
        if (!$user) {
            $this->message->error("O e-mail informado não está cadastrado.");
            return false;
        }

        if (!passwd_verify($senha, $user->senha)) {
            $this->message->error("A senha informada não confere.");
            return false;
        }

        if (passwd_rehash($user->senha)) {
            $user->senha = $senha;
            $user->save();
        }

        (new Session())->set("authUser", $user->id);
        $this->message->success("Login efetuado com sucesso")->flash();
        return true;
    }

    /**
     * @return void
     */
    public static function logout(): void
    {
        $session = new Session();
        $session->unset("authUser");
    }
}