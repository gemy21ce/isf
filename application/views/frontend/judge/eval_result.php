<script type="text/javascript">
    $(function() {
        $("table.intel-table").css("marginLeft", Math.max(0, (($("#contant-contaner").width() - $("table.intel-table").outerWidth()) / 2)));
        var createPrint = function() {
            var printbtn = document.createElement("button");
            printbtn.setAttribute("class", "intel-btn intel-btn-cancel");
            printbtn.setAttribute("style", "float:right");
            printbtn.innerHTML = "Print This Page";
            $("#contant-contaner").append(printbtn);
            $(printbtn).click(function() {
                $("body").children().hide();
                $("article").show();
                $(this).hide();
                var marginTop = $("article").css("margin-top");
                $("article").css("margin-top", "2em");
                window.print();
                $("body").children().show();
                $("article").css("margin-top", marginTop);
                $(this).show();
            });
        };
        createPrint();
    });
</script>
<div class="intel-tab" id="tabs" init="true">
    <ul style="margin-top: 10px;">
        <li><a href="<?= base_url(); ?>judge/home" tab="#admins">Projects</a></li>
        <li><a href="<?= base_url(); ?>judge/home/schedule" tab="#sched">Evaluation Schedule</a></li>
        <li><a href="<?= base_url(); ?>judge/home/evalresults" class="active" tab="#results">Evaluation Results</a></li>
        <!--<li><a href="javascript:void(0);" tab="#tab5">More...</a></li>-->
    </ul>
    <hr class="intel-tab-divider">
</div>
<article class="intel-tab-content">
    <section class="active" id="teams">
        <span class="Content-body">
            <h2 id="Admin">Evaluation Results</h2>
            <hr/>

            <div id="contant-contaner" class="contant-contaner">
                <div>
                    <p>
                        <span>Judge Name: </span>
                        <?= $judge->name ?>
                        <br/>
                        <span>
                            Category:
                        </span>
                        <?php
                        $judge->category->get();
                        echo "<span dir='ltr' style=''>" . $judge->category->name . "</span>";
                        ?>
                        <br/>
                        <span>
                            Sub-category:
                        </span>
                        <?php
                        $judge->subcategory->get();
                        echo "<span dir='ltr' style=''>" . $judge->subcategory->name . "</span>";
                        ?>
                    </p>
                </div>
                <?php
                if (isset($evals)) {
                    ?>
                    <table class="intel-table" style="width: 50%">
                        <thead>
                        <td>Interview #</td>
                        <td>Score</td>
                        <td>Z-Score</td>
                        <td>Project Code</td>
                        <td>Project Name</td>
                        </thead>
                        <tbody>
                            <?php
                            $scores = array();
                            foreach ($evals as $ev) {
                                array_push($scores, $ev->eval_total);
                            }
                            ?>
                            <?php
                            foreach ($evals as $ev) {
                                ?>
                                <tr>
                                    <td><?= $ev->slotnumber ?></td>
                                    <td><?= $ev->eval_total ?></td>
                                    <td><?= number_format(zscore($ev->eval_total, $scores), 2) ?></td>
                                    <td><?php
                                        $ev->project->get();
                                        $ev->project->category->get();
                                        echo $ev->project->category->code . ' - ' . $ev->project_id
                                        ?></td>
                                    <td>
                                        <?php
                                        $ev->project->get();
                                        echo $ev->project->name
                                        ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <div>
                        <p style="">
                            <span>
                                <label>Total Number of Scores:</label>
                                <?= count($scores) ?>
                            </span>
                            <br/>
                            <span>
                                <label>Mean Score:</label>
                                <?= number_format(mean($scores), 2) ?>
                            </span>
                            <br/>
                            <span>
                                <label>High Score :</label>
                                <?= max($scores) ?>
                            </span>
                            <br/>
                            <span>
                                <label>Low Score:</label>
                                <?= min($scores) ?>
                            </span>
                            <br/>
                            <span>
                                <label>Median Score :
                                </label>
                                <?= calculate_median($scores) ?>
                            </span>
                        </p>
                    </div>

                <?php } else { ?>
                    <div dir="rtl" style="text-align: center">
                        <p>
                            You did not evaluate any project yet.
                        </p>
                    </div>
                <?php } ?>

                <?php

                function calculate_median($arr) {
                    sort($arr);
                    $count = count($arr); //total numbers in array
                    $middleval = floor(($count - 1) / 2); // find the middle value, or the lowest middle value
                    if ($count % 2) { // odd number, middle is the median
                        $median = $arr[$middleval];
                    } else { // even number, calculate avg of 2 medians
                        $low = $arr[$middleval];
                        $high = $arr[$middleval + 1];
                        $median = (($low + $high) / 2);
                    }
                    return $median;
                }

                function mean($array) {
                    return $mean = array_sum($array) / count($array);
                }

                function Segma($array) {
                    $powArray = array();
                    $mean = mean($array);
                    foreach ($array as $a) {
                        array_push($powArray, pow($a - $mean, 2));
                    }
                    return sqrt(mean($powArray));
                }

                function zscore($x, $scores) {
                    return ($x - mean($scores)) / Segma($scores);
                }
                ?>
            </div>
        </span>
    </section>
</article>