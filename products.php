<?php
	// View: products list

    require_once 'core/autoload.php';
    require_once 'core/models/product_model.php';

    $products = ProductModel::getProducts();
?>


<?php ob_start(); ?>

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