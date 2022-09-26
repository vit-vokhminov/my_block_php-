<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">

        <?php if ($page !== 1) : ?>
            <li class="page-item"><a class="page-link" href="?page=1">First</a></li>
        <?php endif; ?>
        
        <?php if ($page > 1) : ?>
            <li class="page-item">
                <a class="page-link" href="<?php echo "?page=" . ($page - 1); ?>">Prev</a>
            </li>
        <?php endif; ?>

        <?php for ($i=1; $i <= $total_pages; $i++) { ?>
            <li class="page-item <?php if ($page === $i){ echo 'active'; } ?>">
                <a class="page-link" href="<?php echo "?page=" . $i; ?>"><?php echo $i; ?></a>
            </li>
        <?php } ?>

        <?php if ($page < $total_pages) : ?>
            <li class="page-item">
                <a class="page-link" href="<?php echo "?page=" . ($page + 1); ?>">Next</a>
            </li>
        <?php endif; ?>

        <?php if ($page !== $total_pages) : ?>
            <li class="page-item"><a class="page-link" href="?page=<?php echo $total_pages; ?>">Last</a></li>
        <?php endif; ?>

    </ul>
</nav>