<script type="text/javascript">
    $(function() {
        $("#projectEvaluation").css("marginLeft", $("#projectEvaluation").outerWidth() / 2);
        $(".scoreDiv input").change(function(){
            adjustTotal();
        }).keyup(function(){
            adjustTotal();
        });
        var adjustTotal = function(){
            var eval_q_1 = isNaN( parseInt($("input[name='eval_q_1']").val()))?0: parseInt($("input[name='eval_q_1']").val());
            var eval_q_2 = isNaN( parseInt($("input[name='eval_q_2']").val()))?0: parseInt($("input[name='eval_q_2']").val());
            var eval_q_3 = isNaN( parseInt($("input[name='eval_q_3']").val()))?0: parseInt($("input[name='eval_q_3']").val());
            var eval_q_4 = isNaN( parseInt($("input[name='eval_q_4']").val()))?0: parseInt($("input[name='eval_q_4']").val());
            var eval_q_5 = isNaN( parseInt($("input[name='eval_q_5']").val()))?0: parseInt($("input[name='eval_q_5']").val());
            var eval_q_6 = isNaN( parseInt($("input[name='eval_q_6']").val()))?0: parseInt($("input[name='eval_q_6']").val());
            $("input[name='eval_total']").val(eval_q_1+eval_q_2+eval_q_3+eval_q_4+eval_q_5+eval_q_6);
        }
    });
</script>
<style>
    .disspan{
        font-weight: normal;
        float: left;
        margin-left: 15px;
        margin-top: -10px;
        width: 20em;
    }
    .scoreDiv{
        margin-right: 5em;
        margin-bottom: 1em;
        min-height: 5em;
    }
</style>
<div class="intel-tab" id="tabs" init="true">
    <ul style="margin-top: 10px;">
        <li><a href="<?= base_url(); ?>judge/home" tab="#admins" class="active">المشاريع</a></li>
        <li><a href="<?= base_url(); ?>judge/sched" tab="#sched">جدول التحكيم</a></li>
        <!--<li><a href="javascript:void(0);" tab="#tab4">Tasks</a></li>-->
        <!--<li><a href="javascript:void(0);" tab="#tab5">More...</a></li>-->
    </ul>
    <hr class="intel-tab-divider">
</div>
<article class="intel-tab-content">
    <section class="active" id="teams">
        <span class="Content-body">
            <h2 id="Admin"><?= $project->name ?></h2>
            <hr/>
            <div class="contant-contaner">
                <div>project data goes here</div>
                <hr class="intel-tab-divider">
                <div id="projectEvaluation" style="direction: rtl;width: 48em;">
                    <fieldset>
                        <form method="post" action="<?= base_url()."judge/home/evaluation" ?>" class="intel-form pure-form-aligned" >
                            <input type="hidden" name="projectId" value="<?= $project->id ?>"/>
                            <legend style="margin-bottom: 15px;">تقييم المشروع</legend>
                            <div class="pure-control-group scoreDiv">
                                <label>سؤال البحث (المشكلة)
                                </label>
                                <input type="number" max="10.000" min="0" placeholder="0 - 10" step="1" name="eval_q_1" />
                                <span class="disspan">
                                    - وصف لاحتياج عملي او مشكلة يجب حلها <br/>
                                    - تحديد معايير للحل المقترح وكذلك محدداته وقيوده
                                </span>
                            </div>
                            <div class="scoreDiv pure-control-group">
                                <label>التصميم و المنهجية</label>
                                <input type="number" max="15.000" min="0" placeholder="0 - 15" step="1" name="eval_q_2" />
                                <span class="disspan">
                                    - استكشاف بدائل لحل الصعوبات التي واجهت الباحث<br/>
                                    - تحديد الحل بشكل متكامل و واضح<br/>
                                    - تطوير نموذج اولي
                                </span>
                            </div>
                            <div class="pure-control-group scoreDiv">
                                <label>التنفيذ / البناء و الاختبار</label>
                                <input type="number" max="20.000" min="0" placeholder="0 - 20" step="1" name="eval_q_3" />
                                <span class="disspan">
                                    - النموذج الاولي يتسق مع التصميم المستهدف<br/>
                                    - تم اختبار النموذج الاولي في ظروف مختلفة ولعدة مرات<br/>
                                    - يظهر النموذج الاولي مهارة هندسية و اكتمال العمل
                                </span>
                            </div>
                            <div class="pure-control-group scoreDiv">
                                <label>الابداع</label>
                                <input type="number" max="20.000" min="0" placeholder="0 - 20" step="1" name="eval_q_4" />
                                <span class="disspan">
                                    المشروع يوضح ابداع متميز في واحد او اكثر من المعايير المذكورة أعلاه
                                </span>
                            </div>
                            <div class="pure-control-group scoreDiv">
                                <label>لوحة العرض</label>
                                <input type="number" max="10.000" min="0" placeholder="0 - 10" step="1" name="eval_q_5" />
                                <span class="disspan">
                                    - ترتيب منطقي و متسلسل للمادة  <br/>
                                    - وضوح الرسومات و الاشكال البيانية<br/>
                                    - عرض الوثائق الداعمة للبحث (مرجع)
                                </span>
                            </div>
                            <div class="pure-control-group scoreDiv" style="min-height: 15em;">
                                <label> المقابلة</label>
                                <input type="number" max="25.000" min="0" placeholder="0 - 25" step="1" name="eval_q_6" />
                                <span class="disspan" style="min-height: 0em;">
                                    - ردود واضحة , موجزة و مدروسة على الأسئلة <br/>
                                    - فهم "العلوم الأساسية" ذات الصلة بالمشروع<br/>
                                    - فهم جيد للنتائج وما تم استخلاصه منها حسب القيود المفروضة على البحث والتصميم<br/>
                                    - درجة الاستقلالية في تنفيذ المشروع<br/>
                                    - تقدير الأثر العلمي و الاجتماعي و الاقتصادي المحتمل<br/>
                                    - جودة الأفكار المقترحة للاستمرار في البحث مستقبلا<br/>
                                    - لمشاريع الفريق , المساهمات و تفهم المشروع من قبل جميع أعضاء الفريق
                                </span>
                            </div>
                            <hr/>
                            <div style="margin-right: 5em;margin-bottom: 1em;" class="pure-control-group">
                                <label>اجمالي التقييم</label>
                                <input type="number" max="100.00" min="0" placeholder="0 - 100" step="1" name="eval_total" />
                            </div>
                            <button type="submit" class="intel-btn intel-btn-action">
									احفظ التقييم
								</button>
                        </form>
                    </fieldset>
                </div>
            </div>
        </span>
    </section>
</article>