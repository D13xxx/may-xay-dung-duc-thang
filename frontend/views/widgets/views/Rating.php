	<?php 
	$count = (int)$count[0]["COUNT(client_ip)"];
	if($count > 0 ) {
		$countTotal = $count*5;
		$starNumber = (float)$starNumber[0]["SUM(star)"];

		$realStar = ($starNumber * 5)/$countTotal;
		$realStar = number_format((float)$realStar, 1, '.', ''); ?>

		<section class='rating-widget' data-table="<?php echo $table; ?>" data-post="<?php echo $post_id; ?>">
			<!-- Rating Stars Box -->
			<div class='rating-stars clearfix' >
				<ul id='stars'>
					<li class='star <?php if($realStar > 0 || $realStar < 1){ echo 'selected'; } ?>' title='1 Sao' data-value='1'>
						<i class='fa fa-star fa-fw'></i>
					</li>
					<li class='star <?php if( 1 < $realStar){ echo 'selected'; } ?>' title='2 Sao' data-value='2'>
						<i class='fa fa-star fa-fw'></i>
					</li>
					<li class='star <?php if( 2 < $realStar){ echo 'selected'; } ?>' title='3 Sao' data-value='3'>
						<i class='fa fa-star fa-fw'></i>
					</li>
					<li class='star <?php if( 3 < $realStar ){ echo 'selected'; } ?>' title='4 Sao' data-value='4'>
						<i class='fa fa-star fa-fw'></i>
					</li>
					<li class='star <?php if( 4 < $realStar){ echo 'selected'; } ?>' title='5 Sao' data-value='5'>
						<i class='fa fa-star fa-fw'></i>
					</li>
				</ul>

			</div>

			<div class='success-box'>
				<div class="load-rating-index"><span><?php echo $realStar ?>/5 Sao</span> <span> - <?= $count ?> Lượt đánh giá</span> </div>
				
				<div class='text-message'></div>

			</div>

		</section>

	<?php } else { $realStar = 0; $count = 0; ?>
		<section class='rating-widget' data-table="<?php echo $table; ?>" data-post="<?php echo $post_id; ?>">
			<!-- Rating Stars Box -->
			<div class='rating-stars clearfix' >
				<ul id='stars'>
					<li class='star selected' title='1 Sao' data-value='1'>
						<i class='fa fa-star fa-fw'></i>
					</li>
					<li class='star selected' title='2 Sao' data-value='2'>
						<i class='fa fa-star fa-fw'></i>
					</li>
					<li class='star selected' title='3 Sao' data-value='3'>
						<i class='fa fa-star fa-fw'></i>
					</li>
					<li class='star selected' title='4 Sao' data-value='4'>
						<i class='fa fa-star fa-fw'></i>
					</li>
					<li class='star selected' title='5 Sao' data-value='5'>
						<i class='fa fa-star fa-fw'></i>
					</li>
				</ul>

			</div>

			
			<div class='success-box'>
				<div class="load-rating-index"><span><?php echo $realStar ?>/5 Sao</span> <span> - <?= $count ?> Lượt đánh giá</span> </div>
				<br> <br>
				<div class='text-message'></div>
			</div>

		</section>

		
	<?php } ?>

	
	
	<div style="position: absolute; top: 99999; z-index: -9999">
		<div itemscope itemtype="http://schema.org/Product">
			<span itemprop="name"><?php echo $name ?></span>
			<span itemprop="description"><?php echo $description ?></span>
			<img itemprop="image" src="<?php echo $images ?>" alt="<?php echo $name ?>">
			<div itemprop="aggregateRating" itemtype="http://schema.org/AggregateRating">
				<span itemprop="ratingValue"><?php echo $realStar; ?></span>/<span itemprop="bestRating">5</span>
				<span itemprop="ratingCount"><?php echo $count ?></span> bình chọn
			</div>
		</div>
	</div>






