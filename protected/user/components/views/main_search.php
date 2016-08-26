<!--<input type="text" class="textbox-default-searchbox1" placeholder="Search for Deals/Company Name/Keyword/Category/Brand" id="search_box" name="keyword" autocomplete="off">-->

<!--<input type="text" class="form-control" placeholder="Search style number or keyword" name="Keyword" id="search_box" autocomplete="off">-->

<style>
    .ul-style {
    background: rgb(244, 118, 32);
    list-style: none;
    margin: 0px;
    padding: 0px;
    z-index: 10000;
    position: absolute;
    display: none;
    top: 40px;
    width: 100%;
}
.li-style {
    background-color: rgba(255,255,255,1);
    list-style: none;
    display: block;
    font-family: Arial, Helvetica, sans-serif;
    font-size: 15px;
    border-bottom: 1px solid rgba(245, 245, 245, 0.22);
    padding: 10px 0px 10px 10px;
    cursor: pointer;
    color: #fff;
    color: #0A0909;
}
</style>
<input type="text" class="form-control input-lg" placeholder="Search" name="Keyword" id="search_box" autocomplete="off" />

<ul class="ul-style" id='result_box' style=""></ul>
<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>-->
<script>

        $(document).ready(function () {

            $(window).keydown(function (event) {
                if (event.keyCode == 13) {
                    event.preventDefault();
                    return false;
                }

            });

            $("#search_box").on('keyup', function (event) {

                var dealers_search = $('#search_box').val();

                if (event.which == 17 || event.which == 18 || event.which == 37 || event.which == 39) {

                } else if (event.which == 40) {

                    if ($(".li-style").hasClass("activee")) {
                        $(".activee + .li-style").addClass("next");
                        $(".activee").removeClass("activee");
                        $(".next").addClass("activee");
                        $(".activee").removeClass("next");

                    } else {

                        $(".ul-style .li-style").first().addClass("activee");
                    }

                } else if (event.which == 38) {

                    if ($(".li-style").hasClass("activee")) {

                        $(".activee").prev().addClass("next");
                        $(".activee").removeClass("activee");
                        $(".next").addClass("activee");
                        $(".activee").removeClass("next");

                    } else {

                        $(".ul-style .li-style").last().addClass("activee");

                    }

                }

                else if (event.which == 13) {

                    if ($(".li-style").hasClass("activee")) {
                        $('#search_box').val($('.activee').text());
                        $('#result_box').hide();
                    }

                } else if (dealers_search != "") {

                    $.ajax({
                        type: "POST",
                        url: baseurl + "Searching/Index",
                        data: "SearchValue=" + dealers_search,
                    }).done(function (result) {

                        if (result == 'invalid') {
                            $('#result_box').hide();
                        } else {
                            $('#result_box').html(result).show();
                        }

                    });
                } else {

                    $('#result_box').hide();
                }

            });

        });

</script>