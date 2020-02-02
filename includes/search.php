<?php
if ($result) {
    foreach ($result as $res):
        $title = "";
        $terms = explode(" ", $res['title']);
        if (count($terms) > 20) {
            $i = 0;
            foreach ($terms as $term):
                if ($i > 20)
                    break;
                $title .= $term . " ";
                $i++;
            endforeach;
            $title .= "....";
        } else
            $title = $res['title'];
        ?>
        <li>
            <h6><a class="cd-nowrap"
                   href="views/<?php echo $res['type'] ?>.php?id=<?php echo $res['id'] ?>&txt=<?php echo $title ?>"><span
                        style="color: orangered;"><?php echo $modules[$res['type']] ?>-</span>&nbsp;<?php echo $title; ?>
                </a></h6>
        </li>
    <?php endforeach;
}
