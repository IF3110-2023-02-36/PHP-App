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

    public function removeProductFromCart($userId, $productId) {
        $query = "DELETE FROM carts WHERE user_id = ? AND product_id = ?";

        $stmt = $this->database->getConn()->prepare($query);
        $stmt->bind_param("ii", $userId, $productId);

        return $stmt->execute();
    }
}
