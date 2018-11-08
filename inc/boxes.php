<?php 
$box1title = get_field('box_1_title', 'option');
$box2title = get_field('box_2_title', 'option');
$box3title = get_field('box_3_title', 'option');

$box1desc = get_field('box_1_description', 'option');
$box1link = get_field('box_1_link', 'option');

$box2desc = get_field('box_2_description', 'option');
$box2link = get_field('box_2_link', 'option');

$box3desc = get_field('box_3_description', 'option');
$box3link = get_field('box_3_link', 'option');
// $box1desc = '#';
// $box1link = '#';

// $box2desc = '#';
// $box2link = '#';

// $box3desc = '#';
// $box3link = '#';

// echo '<pre>';
// print_r($box1link);
// echo '</pre>';

 ?>
<section class="bott-page">
	

	<section class="boxes">
		<div class="box box1">
			<h2><?php echo $box1title; ?></h2>
			<div class="desc"><?php echo $box1desc; ?></div>
			<div class="learnmore swipe">
				<div class='insider'></div>
				<a href="<?php echo $box1link['url']; ?>">Learn More</a>
			</div>
		</div>
		<div class="box box2">
			<h2><?php echo $box2title; ?></h2>
			<div class="desc"><?php echo $box2desc; ?></div>
			<div class="learnmore swipe">
				<div class='insider'></div>
				<a href="<?php echo $box2link['url']; ?>">Learn More</a>
			</div>
		</div>
		<div class="box box3">
			<h2><?php echo $box3title; ?></h2>
			<div class="desc"><?php echo $box3desc; ?></div>
			<div class="learnmore swipe">
				<div class='insider'></div>
				<a href="<?php echo $box3link['url']; ?>">Learn More</a>
			</div>
		</div>
	</section>
</section>