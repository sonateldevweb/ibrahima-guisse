$(document).ready(function(){
   
   
    $("#adresse").hide();
    $("#typeBourse").hide();
    $(".loger").hide();
    $("#loger").hide();
    $("#chambre").hide();
    
    $("#non").click(function(){
        $("#adresse").show();
        $("#typeBourse").hide();
         $(".loger").hide();
         $("#loger").hide();
         $("#chambre").hide();
         $("#typeBourse").next(".erreure-msg").fadeOut();
         $("#chambre").next(".erreure-msg").fadeOut();

        
         $("#ajouter").click(function(){
             valider=true;
            if($("#adresse").val()=="")
            {
                valider=false;
               $("#adresse").next(".erreure-msg").fadeIn().text("veuillez saisir l'adresse");
            }
            else
            {
                $("#adresse").next(".erreure-msg").fadeOut();
            }
            return valider;
         });
    });
    
    $("#oui").click(function(){
        $("#adresse").hide();
        $("#typeBourse").show();
         $(".loger").show();
         $("#loger").show();
         $("#chambre").hide();            
         $("#adresse").next(".erreure-msg").fadeOut();

         $("#ajouter").click(function(){
             valider=true;
             if($("#typeBourse").val()=="")
        {
            valider=false;
           $("#typeBourse").next(".erreure-msg").fadeIn().text("veuillez selectionner le type de bourse");
        }
        else
        {
            $("#typeBourse").next(".erreure-msg").fadeOut();

        }
             return valider;

         });

         
        
    });

    $("#loger").click(function(){
        $("#adresse").hide();
        $("#typeBourse").show();
         $(".loger").show();
         $("#chambre").toggle();
         $("#adresse").next(".erreure-msg").fadeOut();

         $("#ajouter").click(function(){
            valider=true;
           
        if($("#chambre").val()=="")
        {
            valider=false;
           $("#chambre").next(".erreure-msg").fadeIn().text("veuillez selectionner la chambre");
        }
        else
        {
            $("#chambre").next(".erreure-msg").fadeOut();
        }
            return valider;

        });

        
    });
   
    $("#ajouter").click(function(){
        valider=true;
        if($("#matricule").val()=="")
        {
            valider=false;
           $("#matricule").next(".erreure-msg").fadeIn().text("veuillez saisir le matricule");
        }
        else{
            $("#matricule").next(".erreure-msg").fadeOut();
        }

        if($("#nom").val()=="")
        {
            valider=false;
           $("#nom").next(".erreure-msg").fadeIn().text("veuillez saisir le nom");
        }else
        {
            $("#nom").next(".erreure-msg").fadeOut();
        }

        if($("#prenom").val()=="")
        {
            valider=false;
           $("#prenom").next(".erreure-msg").fadeIn().text("veuillez saisir le prenom");
        }
        else
        {
            $("#prenom").next(".erreure-msg").fadeOut();
        }

        if($("#email").val()=="")
        {
            valider=false;
           $("#email").next(".erreure-msg").fadeIn().text("veuillez saisir l'email");
        }
        else
        {
            $("#email").next(".erreure-msg").fadeIn();
        }

        if($("#phone").val()=="")
        {
            valider=false;
           $("#phone").next(".erreure-msg").fadeIn().text("veuillez saisir le telephone");
        }
        else
        {
            $("#phone").next(".erreure-msg").fadeOut();
        }
        if($("#datenais").val()=="")
        {
            valider=false;
           $("#datenais").next(".erreure-msg").fadeIn().text("veuillez saisir la date");
        }
        else
        {
            $("#datenais").next(".erreure-msg").fadeOut();
        }
       
       
        return valider;
    });

});