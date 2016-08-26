<div class="col-md-3 categ" >
    <form id="products_search" method="POST" action="<?= Yii::app()->request->baseUrl . "/index.php/product/products"; ?>">

        <span class="filter">Category</span>
        <div class="category-ui">

            <ul class="catmenu">
                <!--<span class="da">Category</span>-->
                <?php
                $category_name = Yii::app()->request->getParam('name');
//        $get_parant = ProductCategory::model()->
                $main_cats = ProductCategory::model()->findAllByAttributes(array(), array('condition' => 'id = parent'));
                foreach ($main_cats as $main_cat) {
                    ?>
                    <li class="<?= $main_cat->canonical_name == $category_name ? 'open catselected' : '' ?>maincat_<?= $main_cat->canonical_name; ?>">
                        <a href="#"><?= $main_cat->category_name; ?><i class="fa <?= $main_cat->canonical_name == $category_name ? 'fa-angle-down' : 'fa-angle-up idown_' . $main_cat->canonical_name; ?> pull-right" style="padding-right: 1em;"></i></a>
                        <ul class="subcat">
                            <?php
                            $subcats = ProductCategory::model()->findAllByAttributes(array('parent' => $main_cat->id), array('condition' => 'id !=' . $main_cat->id));
                            foreach ($subcats as $subcat) {

                                if ($subcat->canonical_name == $category_name) {
                                    $selected = 'catselected';
                                    $open = $main_cat->canonical_name;
                                } else {
                                    $selected = '';
                                }
                                echo "<li class ='" . $selected . "'> <a href = '" . Yii::app()->request->baseUrl . "/index.php/product/category/name/" . $subcat->canonical_name . "'>" . $subcat->category_name . "</a></li>";
                            }
                            ?>
                        </ul>
                    </li>

                <?php }
                ?>


            </ul>

            <?php
            if (isset($open)) {
                ?>
                <script>

                    $(document).ready(function () {
                        $('.maincat_<?= $open ?>').addClass('open');
                        $('.idown_<?= $open ?>').removeClass('fa-angle-up').addClass('fa-angle-down');
                    });
                </script>
            <?php } ?>
        </div>
        <br><br>
        <div class="panel-group" >
            <div class="panel panel-default">
                <a class="accordion-toggle"  aria-expanded="true">
                    <div class="panel-heading headz">

                        <span class="panel-title">
                            <!--<i class="glyphicon gly glyphicon-minus"></i>--> 
                            Brands
                            <?php
                            $brnd_sel = array();
                            if ($brandsel != '') {
                                $brnd_sel = explode(',', $brandsel);
                            }
                            ?>
                        </span>


                    </div>
                </a>
                <div id="panel1" class="panel-collapse collapse in" aria-expanded="true" style="max-height: 20em;overflow: auto">
                    <div class="panel-body">

                        <ul class="list-unstyled">
                            <?php
                            $brands = MasterBrands::model()->findAll();
                            foreach ($brands as $brand) {
                                ?>


                                <li>
                                    <input type="checkbox" class="chk brands" name="brand" onchange="searchProduct()" value="<?php echo $brand['id']; ?>" <?php if (in_array($brand['id'], $brnd_sel)) { ?> checked="checked" <?php } ?> ><?php echo $brand['brand_name']; ?>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
            <br><br>
            <div class="panel panel-default">
                <a class="accordion-toggle collapsed" aria-expanded="true"> 
                    <div class="panel-heading headz">

                        <span class="panel-title">
                            <!--<i class="glyphicon gly glyphicon-minus"></i>--> 
                            Price
                        </span>


                    </div>
                </a>
                <!--<div id="panel2" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">-->
                <div id="panel2" class="panel-collapse collapse in" aria-expanded="true">
                    <div class="panel-body">
                        <?php
                        echo CHtml::dropDownList('price', $select, Utilities::getPriceList(), array('empty' => 'Price Range', 'class' => "form-control", 'onchange' => 'searchProduct()', 'options' => array($price => array('selected' => true))));
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" id="brand_inputs" name="brand_inputs" value="<?= $brandsel ?>">
        <input type="hidden" id="priceRange" name ="priceRange" value="<?= $price ?>">
        <input type="hidden" id="categories">
    </form>
</div>



<script>
    function searchProduct()
    {
        // get value of selected barnds
        var checkedValue = null;
        var inputElements = document.getElementsByClassName('brands');
        for (var i = 0; inputElements[i]; ++i) {
            if (inputElements[i].checked) {
                if (checkedValue == null)
                {
                    checkedValue = inputElements[i].value;
                } else
                    checkedValue = checkedValue + ',' + inputElements[i].value;

            }
        }

        // set value to hidden field
        $("#brand_inputs").val(checkedValue);

        // get value of selected priceRange
        var e = document.getElementById("price");
        var priceRange = e.options[e.selectedIndex].value;

        // set value of selected price range        
        $("#priceRange").val(priceRange);

        $('#products_search').submit();
    }

    function addPriceRange(val)
    {
        $("#priceRange").val(val);
        searchProduct();
    }


    function brandcheck()
    {
        var checkedValue = null;
        var inputElements = document.getElementsByClassName('brands');
        for (var i = 0; inputElements[i]; ++i) {
            if (inputElements[i].checked) {
                if (checkedValue == null)
                {
                    checkedValue = inputElements[i].value;
                } else
                    checkedValue = checkedValue + ',' + inputElements[i].value;

            }
        }
        $("#brand_inputs").val(checkedValue);
        searchProduct();
    }


</script>