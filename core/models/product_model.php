<?php

if(!defined('AUTOLOAD')) {
    die('Direct access is not allowed');
}

require_once DOCUMENT_ROOT . 'core/database/connection.php';

class ProductModel
{
	public static function getProducts()
	{
		$conn = Connection::getInstance();
        $query = "SELECT * FROM products WHERE active = 1";

        return $conn->doSelect($query);
	}

	// search products by title. PREVENT SQLi
	public static function searchProductsByTitle($title)
	{
		$conn = Connection::getInstance();
		$secureTitle = $conn->escapeString($title);
		$query = "SELECT * FROM products WHERE title LIKE '%{$secureTitle}%'";

		return $conn->doSelect($query);
	}

	public static function getProductById($id)
	{
		// $id = (int) $id;

		$conn = Connection::getInstance();
        $query = "SELECT id, title, description, image FROM products WHERE id = {$id} AND active = true";
//echo $query;
        return $conn->doOneSelect($query);
	}
}