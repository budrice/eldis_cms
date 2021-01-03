<style>

.carousel-fade .carousel-inner .item {
  opacity: 0;
  transition-property: opacity;
}

.carousel-fade .carousel-inner .active {
  opacity: 1;
}

.carousel-fade .carousel-inner .active.left,
.carousel-fade .carousel-inner .active.right {
  left: 0;
  opacity: 0;
  z-index: 1;
}

.carousel-fade .carousel-inner .next.left,
.carousel-fade .carousel-inner .prev.right {
  opacity: 1;
}

.carousel-fade .carousel-control {
  z-index: 2;
}

/*
WHAT IS NEW IN 3.3: "Added transforms to improve carousel performance in modern browsers."
now override the 3.3 new styles for modern browsers & apply opacity
*/
@media all and (transform-3d), (-webkit-transform-3d) {
   .carousel-fade .carousel-inner > .item.next,
   .carousel-fade .carousel-inner > .item.active.right {
      opacity: 0;
      -webkit-transform: translate3d(0, 0, 0);
      transform: translate3d(0, 0, 0);
   }
   .carousel-fade .carousel-inner > .item.prev,
   .carousel-fade .carousel-inner > .item.active.left {
      opacity: 0;
      -webkit-transform: translate3d(0, 0, 0);
      transform: translate3d(0, 0, 0);
   }
   .carousel-fade .carousel-inner > .item.next.left,
   .carousel-fade .carousel-inner > .item.prev.right,
   .carousel-fade .carousel-inner > .item.active {
      opacity: 1;
      -webkit-transform: translate3d(0, 0, 0);
      transform: translate3d(0, 0, 0);
   }
}

.carousel-indicators li {
    display: inline-block;
    width: 10px;
    height: 10px;
    margin: 1px;
    text-indent: -999px;
    cursor: pointer;
    background-color: #000 \9;
    background-color: rgba(0,0,0,0);
    border: 1px solid orangered;
    border-radius: 10px;
}
.carousel-indicators .active {
    width: 12px;
    height: 12px;
    margin: 0;
    background-color: orangered;
}
</style>
<div class="well black-well">
	<div id="landing_carousel" class="carousel-fade carousel slide"  data-ride="carousel" data-interval="5200" data-pause="hover">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#landing_carousel" data-slide-to="0" class="active"></li>
			<li data-target="#landing_carousel" data-slide-to="1"></li>
			<li data-target="#landing_carousel" data-slide-to="2"></li>
		</ol>
		<div class="carousel-inner">
			<div class="item active" style="max-height: 630px;">
				<div class="row" style="max-height: 420px; overflow: hidden;">
					<img src="images/<?php echo $row1_img; ?>" alt="<?php echo $row1_img; ?>" style="width: 100%; margin-top: -30px;">
				</div>
				<div class="well white-well row" style="min-height: 210px;">
					<div class="col-xs-12"><?php echo $row1_header; ?></div>
					<div class="col-xs-12"><?php echo $row1_content; ?></div>
					<div class="col-xs-12"><a href="<?php echo $row1_button_href; ?>" class="btn btn-info pull-right"><?php echo $row1_button; ?></a></div>
				</div>
			</div>
			<div class="item" style="max-height: 630px;">
				<div class="row" style="max-height: 420px; overflow: hidden;">
					<img src="images/<?php echo $row2_img; ?>" alt="<?php echo $row2_img; ?>" style="width: 100%; margin-top: -30px;">
				</div>
				<div class="well white-well row" style="min-height: 210px;">
					<div class="col-xs-12"><?php echo $row2_header; ?></div>
					<div class="col-xs-12"><?php echo $row2_content; ?></div>
					<div class="col-xs-12"><a href="<?php echo $row2_button_href; ?>" class="btn btn-info pull-right"><?php echo $row2_button; ?></a></div>
				</div>
			</div>
			<div class="item" style="max-height: 630px;">
				<div class="row" style="max-height: 420px; overflow: hidden;">
					<img src="images/<?php echo $row3_img; ?>" alt="<?php echo $row3_img; ?>" style="width: 100%; margin-top: -30px;">
				</div>
				<div class="well white-well row" style="min-height: 210px;">
					<div class="col-xs-12"><?php echo $row3_header; ?></div>
					<div class="col-xs-12"><?php echo $row3_content; ?></div>
					<div class="col-xs-12"><a href="<?php echo $row3_button_href; ?>" class="btn btn-info pull-right"><?php echo $row3_button; ?></a></div>
				</div>
			</div>
		</div>
	</div>
</div>
