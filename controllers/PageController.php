<?php

class PageController extends AbstractController
{
    public function home(): void
    {
        $newProductManager = new ProductManager();
        $newCategoryManager = new CategoryManager();

        $categories = $newCategoryManager->findAll();

        $categories_array = [];

        foreach ($categories as $key => $category) {
            $products_array = $newProductManager->findProductsByCategory($category->getId());
            $category->setProducts($products_array);
            $categories_array[] = $category;
        }


        $this->render("home", ['categories' => $categories_array]);
    }

    public function products(): void
    {
        $newProductManager = new ProductManager();
        $products = $newProductManager->selectAllProduct();
        if ($products) {
            $this->render("products", ['products' => $products]);
        }
    }

    public function product(): void
    {
        $newProductManager = new ProductManager();
        $product = $newProductManager->selectOneProduct($_GET['product_id']);
        if ($product) {
            $this->render("product", ['product' => $product]);
        }
    }

    public function category(): void
    {
        $newProductManager = new ProductManager();
        $newCategoryManager = new CategoryManager();

        $products = $newProductManager->findProductsByCategory($_GET['category_id']);

        if ($products) {
            $this->render("category", ['category' => $products]);
        }
    }

    public function showList(): void
    {
        $newOrderManager = new OrderManager();
        $products = $newOrderManager->showList($_SESSION['id']);
        $this->render("panier", ['products' => $products]);
    }
}
