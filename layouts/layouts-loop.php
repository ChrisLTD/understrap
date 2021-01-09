<?php if (function_exists('have_rows')): ?>

	<?php while(have_rows("page_layouts")): the_row(); ?>

		<?php include(locate_template('layouts/layout-' . get_row_layout() . '.php')); ?>

	<?php endwhile; // end page layout ?>

<?php endif; ?>
