$(document).ready(function () {
    var map = initMap();
    var offset = 76;
    $('.x-jump').click(function (event) {
        event.preventDefault();
        $($(this).attr('href'))[0].scrollIntoView();
        scrollBy(0, -offset);
    });
    $(".x-selectClassJs").click(function () {
        $("#courseId").val($(this).data("select"));
    });
    $(".js-modal-click").click(function () {
        $("#inputEmail").val("");
        $("#nameInput").val("");
        $("#phoneInput").val("");
        $("#commentTextarea").val("");
    });
    $(".jq-submit").click(function () {
        $(".js-inputs").each(function (index) {
            if ($(this).data("check") === "email") {
                (!isEmail($(this).val())) ? $(this).addClass("error") : $(this).removeClass("error");
            } else {
                ($(this).val() === "") ? $(this).addClass("error") : $(this).removeClass("error");
            }

        });
        if ($(".error").length === 0) {
            $.ajax({
                type: "POST",
                dataType: "json",
                url: 'core/register.php',
                data: {
                    email: $("#inputEmail").val(),
                    name: $("#nameInput").val(),
                    phone: $("#phoneInput").val(),
                    course: $("#courseId").val(),
                    comment: $("#commentTextarea").val()
                },
                success: function (data) {
                    if(data.status === "success"){
                        $('#successModal').modal('toggle');
                    }else{
                        $('#fullModal').modal('toggle');
                    }
                },
                error: function (x, t, m) {
                    alert("Global error: " + x.statusText);
                }
            });
        }
    });
    function isEmail(email) {
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test(email);
    }

});
