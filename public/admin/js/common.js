$(document).ready(function () {
    $(".summernote").summernote({
        height: 150,
    });

    $(".select2").select2();

    // Double click to open 
    $(document).on("dblclick", ".row-item", function (event) {
        event.preventDefault();
        const url = $(this).find(".btn-edit").attr("href");
        document.location.href = url;
    });

    updateOrdering();
    priceVndFormat();
});
