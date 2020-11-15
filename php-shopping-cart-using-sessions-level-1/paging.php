<?php
echo "<div class='col-md-12'>";
    echo "<ul class='pagination m-b-20px m-t-0px'>";

    if($page > 1) {
        echo "<li><a href='{$page_url}' title='Ensimmäiselle sivulle.'>";
            echo "Ensimmäinen sivu";
        echo "</a></li>";
    }

    $total_pages = ceil($total_rows / $records_per_page);

    $range = 2;

    $initial_num = $page - $range;
    $conditional_limit_num = ($page + $range) + 1;

    for ($i = $initial_num; $i < $conditional_limit_num; $i++) {
        if(($i > 0) && ($i <= $total_pages)) {
            if($i == $page) {
                echo "<li class='active'><a href=\"#\">$i <span class=\"sr-only\">(current)</span></a></li>";
            }
            else {
                echo "<li><a href='{$page_url}page=$i'>$i</a></li>";
            }
        }
    }

    if($page < $total_pages) {
        echo "<li>";
            echo "<a href='" . $page_url . "page={$total_pages}' title='Viimeinen sivu on {$total_pages}.'";
                echo "Viimeinen sivu";
            echo "</a>";
        echo "</li>";
    }
    echo "</ul>";
echo "</div>";
?>