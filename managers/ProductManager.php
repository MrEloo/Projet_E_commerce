<?php

/**
 * @author : Gaellan
 * @link : https://github.com/Gaellan
 */


class ProductManager extends AbstractManager
{

    public function selectAllProduct(): array
    {
        $selectAllQuery = $this->db->prepare('SELECT products.*, images.name AS image_name, images.url AS image_url, images.alt AS image_alt, categories.name AS catergory_name, categories.description AS categrory_description 
        FROM products 
        JOIN images ON images.id = products.image_id
        JOIN categories ON categories.id = products.category_id');
        $selectAllQuery->execute();
        $products_data = $selectAllQuery->fetchAll(PDO::FETCH_ASSOC);

        $products_array = [];

        foreach ($products_data as $key => $products) {
            $category = new Category($products['catergory_name'], $products['categrory_description']);
            $product = new Product($products['name'], $products['description'], $products['price'], $products['image_name'], $products['image_url'], $products['image_alt'], $category);
            $product->setId($products['id']);
            $product_array[] = $product;
        }
        return $product_array;
    }

    public function selectOneProduct($id): object
    {
        $selectOneQuery = $this->db->prepare('SELECT products.*, images.name AS image_name, images.url AS image_url, images.alt AS image_alt, categories.name AS catergory_name, categories.description AS categrory_description, categories.id AS category_id 
        FROM products 
        JOIN images ON images.id = products.image_id
        JOIN categories ON categories.id = products.category_id
        WHERE products.id = :id');
        $parameters = [
            'id' => $id
        ];
        $selectOneQuery->execute($parameters);

        $product_data = $selectOneQuery->fetch(PDO::FETCH_ASSOC);

        if ($product_data) {
            $category = new Category($product_data['catergory_name'], $product_data['categrory_description']);
            $product = new Product($product_data['name'], $product_data['description'], $product_data['price'], $product_data['image_name'], $product_data['image_url'], $product_data['image_alt'], $category);
            $product->setId($product_data['id']);
            $category->setId($product_data['category_id']);

            return $product;
        } else {
            return null;
        }
    }

    public function findProductsByCategory($id): array
    {
        $selectProductsByCategoryQuery = $this->db->prepare('SELECT products.*, categories.name AS catergory_name, categories.description AS categrory_description, images.name AS image_name, images.url AS image_url, images.alt AS image_alt FROM products JOIN categories ON categories.id = products.category_id JOIN images ON images.id = products.image_id WHERE products.category_id =:id');
        $parameters = [
            'id' => $id
        ];
        $selectProductsByCategoryQuery->execute($parameters);
        $products_data = $selectProductsByCategoryQuery->fetchAll(PDO::FETCH_ASSOC);

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
