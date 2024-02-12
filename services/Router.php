<?php

/**
 * @author : Gaellan
 * @link : https://github.com/Gaellan
 */

class Router
{
    private AuthController $ac;
    private PageController $pc;
    private OrderController $oc;

    public function __construct()
    {
        $this->ac = new AuthController();
        $this->pc = new PageController();
        $this->oc = new OrderController();
    }
    public function handleRequest(array $get): void
    {
        if (!isset($get["route"]) || $get["route"] === 'route') {
            $this->pc->home();
        } else if (isset($get["route"]) && $get["route"] === "register") {
            $this->ac->register();
        } else if (isset($get["route"]) && $get["route"] === "check-register") {
            $this->ac->checkRegister();
        } else if (isset($get["route"]) && $get["route"] === "login") {
            $this->ac->login();
        } else if (isset($get["route"]) && $get["route"] === "check-login") {
            $this->ac->checkLogin();
        } else if (isset($get["route"]) && $get["route"] === "logout") {
            $this->ac->logout();
        } else if (isset($get["route"]) && $get["route"] === "products") {
            $this->pc->products();
        } else if (isset($get["route"]) && $get["route"] === "panier") {
            $this->pc->showList();
        } else if (isset($get["route"]) && $get["route"] === "product") {
            if (isset($get["product_id"])) {
                $this->pc->product($get["product_id"]);
            } else {
                $this->pc->home();
            }
        } else if (isset($get["route"]) && $get["route"] === "category") {
            if (isset($get["category_id"])) {
                $this->pc->category($get["category_id"]);
            } else {
                $this->pc->home();
            }
        } else if (isset($get["route"]) && $get["route"] === "addOrder") {
            if (isset($get["product_id"])) {
                $this->oc->AddOrder($get["product_id"]);
            } else {
                $this->pc->home();
            }
        }
    }
}
