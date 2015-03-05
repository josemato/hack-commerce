<?php
	// View: products list

    require_once 'core/autoload.php';
    require_once 'core/models/product_model.php';

    $products = array();

    $title = isset($_GET['search']) ? $_GET['search'] : null;
    $titleFilter = '';
    $noProductsFoundMessage = null;

    if($title) {
    	$products = ProductModel::searchProductsByTitle($title);
    	$titleFilter = htmlentities($title);
        $titleFilter = $title;

    	if(!isset($products[0])) {
    		$noProductsFoundMessage = <<<MESSAGE
			No products found. Search again <a href="search-products.php?title={$titleFilter}">{$titleFilter}</a>
MESSAGE;
    	}
    } else {
    	$noProductsFoundMessage = 'No products found';
    }

    if($noProductsFoundMessage) {
    	Session::addFlashMessage($noProductsFoundMessage);
    }
?>


<?php ob_start(); ?>

<p>Results for: <strong><?php echo $titleFilter; ?></strong></p>
<div class="products">
	<?php foreach($products as $product): ?>
	<article class="product">
		<h2 class="entry-title ellipsis"><a href="product-detail.php?id=<?php echo $product->id; ?>" title="<?php echo $product->title; ?>"><?php echo $product->title; ?></a></h2>
		<a href="product-detail.php?id=<?php echo $product->id; ?>">
			<img src="uploads/cover/<?php echo $product->image; ?>" alt="<?php echo $product->title; ?>" width="200">
		</a>
		<p class="entry-actions">
			<a href="add2cart.php?id=<?php echo $product->id; ?>"><i class="fa fa-shopping-cart fa-lg"></i> Add to cart</a>
		</p>
	</article>
	<?php endforeach; ?>
</div> <!-- ./products -->

<?php $module = ob_get_contents(); ?>

<?php ob_end_clean(); ?>

<?php require_once 'template.php'; ?>