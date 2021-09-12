<div class="container table-responsive pagination-cont">
    <?php if($numeropaginas>=1): ?>
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <?php 
                    for($i=1; $i <= $numeropaginas; $i++ )
                    {
                        if($pagina == $i)
                        { ?>
                            <li class="page-item">
                                <a class="page-link" href="<?php echo $link; ?>=<?php echo $i; ?>"><?php echo $i; ?></a>
                            </li>
                            <?php 
                        }else{
                            ?>
                            <li class="page-item">
                                <a class="page-link" href="<?php echo $link; ?>=<?php echo $i; ?>"><?php echo $i; ?></a>
                            </li>
                            <?php 
                        }
                    }
                ?>
            </ul>
        </nav>
    <?php endif; ?>
</div>