$(window).load(function () {

    $(".sideBarParent .title").on({
        click: function () {
            if ($(this).hasClass("clicked"))
                return false;

            $(".ico").removeClass("down");
            $(this).children(".ico").toggleClass("down");

            $(".sideBarParent .title").removeClass("clicked");
            $(this).addClass("clicked");

            if ($(this).data("child") === "child") {
                $(".sideBarParent ul").slideUp("fast");
                $(this).next("ul").slideDown("fast");
            }
        }
    });

    $(".sideBarParent .sub").on({
        click: function () {
            $(".sideBarParent .sub").removeClass("clicked");
            $(this).addClass("clicked");
        }
    });

    $(".langButton").on({
        click: function () {
            var selector = $(this).parent().parent();
            selector.find(".langButton").removeClass("clickedLang");
            $(this).addClass("clickedLang");
            var lang = $(this).data("lang");
            selector.find(".formTable").removeClass("visible").addClass("hide");
            selector.find("." + lang + "Display").removeClass("hide").addClass("visible");
        }
    });

    $(function () {
        $('body').on('click', '.addImage .addIco', function () {
            $(this).parent().find("input:file").trigger('click');
        });

        $('body').on('click', '.addImage .removeIco', function () {
            $(this).parent().find("input:file").val("");
            $(this).parent().find("img").remove();
            $(this).removeClass("show");
        });

        $('body').on('change', '.immediatelyAttach', function () {
            var main = $(this);
            var container = $(this);
            var show = true;
            main.parent().find(".removeIco").addClass("show");

            if (container.prop('files')[0]) {
                /* RESET FOR CURRENT */
                $(this).parent().find("img").remove();
                /* /RESET FOR CURRENT */

                if (show) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        main.parent().prepend('<img src="' + e.target.result + '" height="100%" class="img_preview" />');
                    };
                    reader.readAsDataURL(container.prop('files')[0]);
                }
            }
        });

        $(".addMoreImages").on({
            click: function () {
                $('<tr> <td> <div class="thumb_wrapper"> <span class="addImage"> <span class="addIco">+</span> <span class="removeIco"></span> <input type="file" name="image_list[]" class="immediatelyAttach" /> </span> </div> </td> <td> <div class="thumb_wrapper"> <span class="addImage"> <span class="addIco">+</span> <span class="removeIco"></span> <input type="file" name="image_list[]" class="immediatelyAttach" /> </span> </div> </td> <td> <div class="thumb_wrapper"> <span class="addImage"> <span class="addIco">+</span> <span class="removeIco"></span> <input type="file" name="image_list[]" class="immediatelyAttach" /> </span> </div> </td><td><span class="remove_thumb_line">Remove</span></td> </tr>').insertBefore(".DynamicAdd");
            }
        });

        $('body').on('click', '.remove_thumb_line', function () {
            $(this).parent().parent().remove();
        });
    });




    $(window).on("resize", function () {
        $("#sideBar").css("min-height", ($(document).height() - $("#header").height()));
    }).resize();

});



