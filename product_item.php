<?php
		
include_once "lib/php/functions.php";

$product = makeQuery(makeConn(), " SELECT * FROM `products` WHERE `id`=".$_GET['id'])[0];
//print_p($product);
$images = explode(",", $product->images);
$images_elements = array_reduce($images,function($r,$o){
	return $r."<img src='img/$o'>";
});

//print_p($_SESSION)

?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<?php include "parts/meta.php";?>


	
	<script type="js/product_thumbs.js"></script>

</head>
<body>
	
	<?php include "parts/navbar.php"; ?>

	<div class="container">
		<div class="grid gap">
			<div class="col-xs-12 col-md-7">
				<div class="card soft">
					<div class="images-main">
						<img src="/img/<?= $product->thumbnail ?>">
					</div>
					<div class="images-thumbs">
						<?= $image_elements ?>
					</div>
				</div>
			</div>
		<div class="col-xs-12 col-md-5">
			<form class="card soft flat" method="post" action="AAU/WNM608/cart_actions.php? action=add-to-cart">

				<input type="hidden" name="product-id" value="<?= $product->id ?>">

			<div class="card-section">
				<h2 class="product-name"><?= $product->name ?></h2>
				<div class="product-price">&dollar;<?=$product->price ?></div>
			</div>
			<div class="card-section">
				<label for="product-amount" class="form-label">Amount</label>
				<div class="form-select">
				<select id="product-amount" name="product-amount">
					<option>1</option>
					<option>2</option>
					<option>3</option>
					<option>4</option>
					<option>5</option>
					<option>6</option>
					<option>7</option>
					<option>8</option>
					<option>9</option>
					<option>10</option>	
				</select>
			</div>
		</div>
				<div class="card-section" >
					<input type="submit" class="button2" value="Add To Cart">
				</div>
				
			</form>
		</div>
	</div>
</div>
	<div class="card hard">
		<p><?= $product->description ?></p>
	</div>
			

		</div>
	</div>




</body>
</html>