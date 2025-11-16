$(".tree-checkbox-hierarchical").fancytree({
    checkbox: true,
    selectMode: 3,
    icon: false,
    clickFolderMode: 4,
});

$("#role-form").submit(function () {
    $.ui.fancytree
        .getTree(".tree-checkbox-hierarchical")
        .generateFormElements();
});

$("#role-form").validate({
    rules: {
        name: {
            required: true,
            minlength: 2,
        },
    },
    errorPlacement: function (error, element) {
        element.parent().find("span.error").remove();
        error.appendTo(element.parent());
    },
});
