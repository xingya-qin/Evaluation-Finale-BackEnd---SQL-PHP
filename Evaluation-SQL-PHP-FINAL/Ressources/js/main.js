$(document).ready(function () {

    $('.deleteconducteur').on('click', function () {
        if (confirm("Êtes-vous sûr de vouloir supprimer ce conducteur ?")) {
            var bookId = $(this).attr('href');
            console.log(bookId);
            bookId = bookId.split("#delete")[1];
            $.get({
                url:"./index.php?action=delete&conducteurId="+bookId
            });
            window.location = "./index.php";
        }
    });

});