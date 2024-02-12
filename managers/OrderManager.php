<?php

/**
 * @author : Gaellan
 * @link : https://github.com/Gaellan
 */


class OrderManager extends AbstractManager
{
    public function AddOrderToList($product_id)
    {
        //J'instancie mes class
        $newProductManager = new ProductManager();

        //Je vais chercher le produit et l'user
        $product = $newProductManager->selectOneProduct($product_id);

        //j'ajoute à la table order le userid et sa date de creation
        $createInOrderQuery = $this->db->prepare('INSERT INTO orders (user_id, created_at) VALUES (:user_id, :created_at)');
        $parameters = [
            'user_id' => $_SESSION['id'],
            'created_at' => date('Y-m-d H:i:s'),
        ];



        //je vais chercher le dernier order en date
        $createInOrderQuery->execute($parameters);
        $selectQuery = $this->db->prepare('SELECT * FROM orders WHERE id = LAST_INSERT_ID()');
        $selectQuery->fetch(PDO::FETCH_ASSOC);

        $lastInsertedOrderId = $this->db->lastInsertId();

        //Je fais le lien entre les deux table
        $createInOrder_ProductsQuery = $this->db->prepare('INSERT INTO orders_products (order_id, product_id) VALUES (:order_id, :product_id)');
        $parameters2 = [
            'order_id' => $lastInsertedOrderId,
            'product_id' => $product->getId(),
        ];
        $createInOrder_ProductsQuery->execute($parameters2);
    }

    public function showList($id): array
    {
        $selectListQuery = $this->db->prepare('SELECT * FROM products JOIN orders_products ON products.id = orders_products.product_id JOIN users ON users.id = orders.user_id WHERE orders.user_id = :id  ');
        $parameters = [
            'id' => $id
        ];
        $selectListQuery->execute($parameters);
        $products_data = $selectListQuery->fetchAll(PDO::FETCH_ASSOC);

        $products_array = [];

        foreach ($products_data as $key => $products) {
            $category = new Category($products['catergory_name'], $products['categrory_description']);
            $product = new Product($products['name'], $products['description'], $products['price'], $products['image_name'], $products['image_url'], $products['image_alt'], $category);
            $product->setId($products['id']);
            $products_array[] = $product;
        }
        return $products_array;
    }
}
