<style type = 'text/CSS'>
	.carousel-item img {
		display: block;
		margin: auto;
		height: 50vh;
	}
	.carousel {
		background-color: black;
	}
</style>
<div id = 'slide-show' class = 'carousel slide' data-ride = 'carousel'>
<ul class = 'carousel-indicators'>
<?php
	for ($i = 1; $i <= count(glob("/img/ss/" . "*.jpg")); $i++) {
		echo "<li data-target = '#slide-show' data-slide-to = '{$i}'";
		if ($i == 1) {
			echo " class = 'active'></li>";
		} else {
			echo "></li>";
		}
	}
	echo "
		</ul>
		<div class = 'carousel-inner'>
	";
	for ($i = 1; $i <= count(glob("/img/ss/" . "*.jpg")); $i++) {
		echo "<div class = 'carousel-item";
		if ($i == 1) {
			echo " active'><img src = '/img/ss/";
		} else {
			echo "'><img src = '/img/ss/";
		}
		echo "{$i}.jpg'></div>";
	}
?>
</div>
	<a class = 'carousel-control-prev' href = '#slide-show' data-slide = 'prev'>
		<span class = 'carousel-control-prev-icon'></span>
	</a>
	<a class = 'carousel-control-next' href = '#slide-show' data-slide = 'next'>
		<span class = 'carousel-control-next-icon'></span>
	</a>
</div>