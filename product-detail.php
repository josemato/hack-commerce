<?php
	// View: products list

    require_once 'core/autoload.php';
    require_once 'core/models/product_model.php';

    $productId = isset($_GET['id']) ? $_GET['id'] : 0;
    $product = null;

    if($productId) {
    	$product = ProductModel::getProductById($productId);
    }

    if(is_null($product)) {
    	Session::addFlashMessage('Product not found.');
    }
    
?>


<?php ob_start(); ?>

<?php $hasBlindSQLi = ( $product && ((int) $productId) == $product->id ); ?>

<?php //if($product && $hasBlindSQLi): ?>
<?php if($product): ?>
<article class="product product-detail">
	<h2 class="entry-title"><?php echo $product->title; ?></h2>
	<a href="product-detail.php?id=<?php echo $product->id; ?>">
		<img src="uploads/cover/<?php echo $product->image; ?>" alt="<?php echo $product->title; ?>" width="200">
	</a>
	<p class="entry-description">
		<?php echo $product->description; ?>
	</p>
	<p class="entry-actions">
		<a href="add2cart.php?id=<?php echo $product->id; ?>"><i class="fa fa-shopping-cart fa-lg"></i> Add to cart</a>
		<a href="download-cover.php?file=<?php echo $product->image; ?>"><i class="fa fa-download fa-lg"></i> Download cover</a>
	</p>
</article>
<?php endif; ?>

<?php $module = ob_get_contents(); ?>

<?php ob_end_clean(); ?>

<?php require_once 'template.php'; ?>