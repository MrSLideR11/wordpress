import $ from "jQuery";

import Inputmask from "inputmask";

$(function(){
    new Inputmask("+7 (999) 999-99-99").mask($("[type=tel]"));

    $(".btn_modal").on("click", function(e){
        e.preventDefault();
        $(".modal").addClass("active");
        $(".modal").find(".form_title").text($(this).text());
    });

    $(".form_close").on("click", function(){
        $(".modal").removeClass("active");
    });
});