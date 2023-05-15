$(document).ready(function () {
    // Double click to open 
    $(document).on("dblclick", ".row-item", function (event) {
        event.preventDefault();
        const url = $(this).find(".btn-edit").attr("href");
        document.location.href = url;
    });
});
