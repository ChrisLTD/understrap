<?php while(the_flexible_field("page_layouts")): ?>

  <?php include(locate_template('layouts/layout-' . get_row_layout() . '.php')); ?>

<?php endwhile; // end page layout ?>

