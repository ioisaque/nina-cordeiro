?>
<div class="col-md-6">
	<div class="gridblog-item">
	    <a href="<?php the_permalink(); ?>">
	        <article class="row">

	            <!-- gridblog Date -->
	            <div class="col-sm-3">
	                <div class="gridblog-date">
	                    <time><?php the_date('M d'); ?></time>
	                </div>
	            </div>
	            <!-- gridblog Date -->

	            <!-- gridblog Content -->
	            <div class="col-sm-9">
	                <h3 class="gridblog-title"><?php the_title(); ?></h3>
	               
	                <p class="gridblog-text"> <?php if(function_exists('excerpt')){
					    echo excerpt(15);
					} ?></p>
	                <p class="gridblog-read-more">READ MORE &gt;&gt;</p>
	            </div>
	            <!-- gridblog Content -->

	        </article>
	    </a>
	</div>
</div>
<?php