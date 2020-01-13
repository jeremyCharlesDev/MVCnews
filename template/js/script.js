document.addEventListener("DOMContentLoaded",function() {
    
    $("nav-link").click(function(){
        console.log("coucou");
        $(".nav-link.active").removeClass('active');
        $(this).addClass('active');
     });

     /**
      * Suppression d'une consultation
      */
     function alerteSuppConsult() {
         var conf = confirm("Êtes vous sur de vouloir supprimer cette consultation?");
         if (conf == false){
             event.preventDefault();
         }
     }

     $(".btn-danger").click(function(){
        alerteSuppConsult();
     });




});