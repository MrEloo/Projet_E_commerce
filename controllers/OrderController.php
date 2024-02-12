<?php

class OrderController extends AbstractController
{
    public function addOrder(): void
    {
        $newOrderManager = new OrderManager();
        $newOrderManager->AddOrderToList($_GET['product_id']);
        $this->redirect("index.php");
    }
}
