/*
Template Name: Nice Admin
Author: Wrappixel
File: js
*/
$(function () {
    "use strict";

    $("#sidebarnav").metisMenu();

    $(".collapse-btn").on('click', function () {
        if ($("body").hasClass("mini-sidebar")) {
            $("body").trigger("resize");
        }
    });
});