<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php
            $rows = array("A", "B", " ", "C", "D");
            for ($i = 1; $i <= 9; $i++) {
                ?>
                <div class="row">
                    <?php
                    for ($j = 0; $j < 5; $j++) {
                        if ($j != 2) {
                            ?>
                            <div class="col-md-2">
                                <input
                                    <?php if (disablSeat($rows[$j] . " " . $i, "Business") == true) { ?>disabled<?php } ?>
                                    type="button"
                                    class="btn <?php if (disablSeat($rows[$j] . " " . $i, "Business") == true) { ?>btn-secondary<?php } else { ?> btn-primary <?php } ?>"
                                    id="Business-<?php echo $rows[$j] . " " . $i; ?>"
                                    title="Business"
                                    onclick="chooseSeat(this,<?php echo $row['businessclass']; ?>)"
                                    value="<?php echo $rows[$j] . " " . $i; ?>">
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
                <?php
            }
            ?>
            <div class="row">
                <div class="col-md-12">Economy Class</div>
            </div>
            <?php
            $rows = array("A", "B", "C", " ", "D", "E", "F");
            for ($i = 1; $i <= 9; $i++) {
                ?>
                <div class="row">
                    <?php
                    for ($j = 0; $j < 7; $j++) {
                        if ($j != 3) {
                            ?>
                            <div class="col-md-1"><input
                                    <?php if (disablSeat($rows[$j] . " " . $i, "Economy") == true) { ?>disabled<?php } ?>
                                    type="button"
                                    class="btn <?php if (disablSeat($rows[$j] . " " . $i, "Economy") == true) { ?>btn-secondary<?php } else { ?> btn-danger<?php } ?>
                                "
                                    id="Economy-<?php echo $rows[$j] . " " . $i; ?>"
                                    title="Economy"
                                    onclick="chooseSeat(this,<?php echo $row['economyclass']; ?>)"
                                    value="<?php echo $rows[$j] . " " . $i; ?>">
                            </div>
                            <?php
                        } else {
                            ?>
                            <div class="col-md-1"></div>
                            <?php

                        }
                    }
                    ?>
                </div>
                <?php
            }
            ?>

        </div>
    </div>
</div>
