<?php

namespace Source\Support;

use Source\Core\Session;

class Message
{
    /** @var string */
    private $text;

    /** @var string */
    private $type;

    /** @var string */
    private $before;

    /** @var string */
    private $after;

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->render();
    }

    /**
     * @return string
     */
    public function getText(): ?string
    {
        return $this->before . $this->text . $this->after;
    }

    /**
     * @return string
     */
    public function getType(): ?string
    {
        return $this->type;
    }


    /**
     * @param string $text
     * @return Message
     */
    public function before(string $text): Message
    {
        $this->before = $text;
        return $this;
    }


    /**
     * @param string $text
     * @return Message
     */
    public function after(string $text): Message
    {
        $this->after = $text;
        return $this;
    }

    /**
     * @param string $message
     * @return Message
     */
    public function info(string $message): Message
    {
        // $this->type = "alert-info";
        $this->type = "bg-theme-14 text-theme-1";
        $this->text = $this->filter($message);
        return $this;
    }

    /**
     * @param string $message
     * @return Message
     */
    public function success(string $message): Message
    {
        // $this->type = "alert-success";
        $this->type = "bg-theme-18 text-theme-9";
        $this->text = $this->filter($message);
        return $this;
    }

    /**
     * @param string $message
     * @return Message
     */
    public function warning(string $message): Message
    {
        // $this->type = "alert-warning";
        $this->type = "bg-theme-17 text-theme-11";
        $this->text = $this->filter($message);
        return $this;
    }

    /**
     * @param string $message
     * @return Message
     */
    public function error(string $message): Message
    {
        // $this->type = "alert-danger";
        $this->type = "bg-theme-31 text-theme-6";
        $this->text = $this->filter($message);
        return $this;
    }

    /**
     * @return string
     */
    public function render(): string
    {
        // return "<div class='mt-3 alert {$this->getType()}'>{$this->getText()}</div>";
        return "<div class='rounded-md flex items-center px-5 py-2 mt-2 border {$this->getType()}'> <i data-feather='alert-octagon' class='w-6 h-6 mr-2'></i>{$this->getText()}</div>";
    }

    /**
     * @return string
     */
    public function json(): string
    {
        return json_encode(["error" => $this->getText()]);
    }

    /**
     * Set flash Session Key
     */
    public function flash(): void
    {
        (new Session())->set("flash", $this);
    }

    /**
     * @param string $message
     * @return string
     */
    private function filter(string $message): string
    {
        return filter_var($message, FILTER_SANITIZE_STRIPPED);
    }
}