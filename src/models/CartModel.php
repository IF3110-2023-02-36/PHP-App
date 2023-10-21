<?php

class CartModel extends Model {
    public function getUserCart($userId) {
        $query = "SELECT * FROM carts WHERE user_id = ?";

        $stmt = $this->database->getConn()->prepare($query);
        $stmt->bind_param("i", $userId);
        $stmt->execute();

        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function getCartItems($cartId) {
        $query = "SELECT * FROM carts 
                  JOIN products ON carts.product_id = products.id
                  WHERE carts.id = ?";

        $stmt = $this->database->getConn()->prepare($query);
        $stmt->bind_param("i", $cartId);
        $stmt->execute();

        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function addProductToCart($userId, $productId, $quantity) {
        $query = "INSERT INTO carts (user_id, product_id, quantity) VALUES (?, ?, ?)";

        $stmt = $this->database->getConn()->prepare($query);
        $stmt->bind_param("iii", $userId, $productId, $quantity);

        return $stmt->execute();
    }

    public function updateProductFromCart($userId, $productId, $quantity){
        $stmt = $this->database->getConn()->prepare("UPDATE carts SET quantity = ? WHERE user_id =$userId AND product_id =$productId");

        $stmt->bind_param("i", $quantity);
    
    // Menjalankan pernyataan SQL
        if ($stmt->execute()) {
            return true; // Produk berhasil ditambahkan
        } else {
            return false; // Gagal menambahkan produk
        }
    }


    public function removeProductFromCart($userId, $productId) {
        $query = "DELETE FROM carts WHERE user_id = ? AND product_id = ?";

        $stmt = $this->database->getConn()->prepare($query);
        $stmt->bind_param("ii", $userId, $productId);

        return $stmt->execute();
    }

    public function isProductInCart($user_id, $product_id){
        $query = "SELECT * FROM carts WHERE user_id = ? AND product_id = ?";

        $stmt = $this->database->getConn()->prepare($query);
        $stmt->bind_param("ii", $user_id, $product_id);
        $stmt->execute();

        return sizeof($stmt->get_result()->fetch_all()) > 0;
    }
}
