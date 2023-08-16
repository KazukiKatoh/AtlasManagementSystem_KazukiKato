$(function () {
    $(".delete-modal-open").on("click", function () {
        $(".js-modal").fadeIn();
        var reserve_date = $(this).attr("reserve_date");
        var reserve_part = $(this).attr("reserve_part");
        $(".modal-reserve-date input").val(reserve_date);
        $(".modal-reserve-part input").val(reserve_part);
        return false;
    });
    $(".js-modal-close").on("click", function () {
        $(".js-modal").fadeOut();
        return false;
    });
});
