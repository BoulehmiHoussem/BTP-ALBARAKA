var messages = {
    error: 'non definie',
    success: 'ajouté avec succes',
}
    
function searchTasks(tosearch, url, token)
{
    if(tosearch == "")
    {
        $('.searchnav').hide();
    }
    else
    {
        $.ajax({
            //L'URL de la requête 
            url: url,
    
            //La méthode d'envoi (type de requête)
            method: "POST",
    
            //data
            data: { 
                    "search" : tosearch,
                    "_token": token },
            //Le format de réponse attendu
            dataType : "HTML",
        })
        .done(function(response){

               $('#taskslist').html(response)
           
            $('.searchnav').show();
        })
        .fail(function(error){
            console.log("La requête s'est terminée en échec. Infos : " + JSON.stringify(error));
        })
        
    }
}


$('.page-item').on('click', function(event){
    var page = $(this).find('.page-link').attr('href')
    if(!page){
        page = window.location.href + "?page=1"
    }
    $('.page-item').removeClass('active')
    $(this).addClass('active')
    $('#tbody').css("opacity", "0.2")
    event.preventDefault();
    
    $.ajax({
        //L'URL de la requête 
        url: page+"&ajax=1",

        //La méthode d'envoi (type de requête)
        method: "GET",

        //Le format de réponse attendu
        dataType : "html",
    })
    .done(function(response){
        $('#tbody').html(response)
        $('#tbody').css("opacity", "1")
        
    })
    .fail(function(error){
        alert("La requête s'est terminée en échec. Infos : " + JSON.stringify(error));
    })
  })


  function getProduct(product, url, token, counter)
  {
    $.ajax({
        //L'URL de la requête 
        url: url,

        //La méthode d'envoi (type de requête)
        method: "POST",

        //data
        data: { 'counter': counter,
                "id" : product,
                "_token": token },
        //Le format de réponse attendu
        dataType : "HTML",
    })
    .done(function(response){
        if(response)
        {
            $('#tbodyproduct-'+counter).prepend(response);
            $('.toastsuceess').fadeIn()
            $('.toastsuceess').find('span').html("Produit "+messages.success)
            setTimeout(function(){
                $('.toastsuceess').fadeOut()
            },1000)
        }
        else
        {
            $('.toastalert').fadeIn()
            $('.toastalert').find('span').html("Produit "+messages.error)
            setTimeout(function(){
                $('.toastalert').fadeOut()
            },1000)
        }
        
    })
    .fail(function(error){
        console.log("La requête s'est terminée en échec. Infos : " + JSON.stringify(error));
    })
  }


  function getLocation(location, url, token, counter)
  {
    $.ajax({
        //L'URL de la requête 
        url: url,

        //La méthode d'envoi (type de requête)
        method: "POST",

        //data
        data: { 'counter': counter,
                "id" : location,
                "_token": token },
        //Le format de réponse attendu
        dataType : "HTML",
    })
    .done(function(response){
        if(response)
        {
            $('#tbodylocation-'+counter).prepend(response);
            $('.toastsuceess').fadeIn()
            $('.toastsuceess').find('span').html("Produit "+messages.success)
            setTimeout(function(){
                $('.toastsuceess').fadeOut()
            },1000)
        }
        else
        {
            $('.toastalert').fadeIn()
            $('.toastalert').find('span').html("Produit "+messages.error)
            setTimeout(function(){
                $('.toastalert').fadeOut()
            },1000)
        }
        
    })
    .fail(function(error){
        console.log("La requête s'est terminée en échec. Infos : " + JSON.stringify(error));
    })
  }


  function addTask(counter, url, token)
  {
    $.ajax({
        //L'URL de la requête 
        url: url,

        //La méthode d'envoi (type de requête)
        method: "POST",

        //data
        data: { "counter" : counter,
                "_token": token },
        //Le format de réponse attendu
        dataType : "HTML",
    })
    .done(function(response){
        var data = JSON.parse(response)
        $('#tachebody').prepend(data.row);
        $('#productsmodals').prepend(data.modal)
        $('#locationmodals').prepend(data.location)
    })
    .fail(function(error){
        console.log("La requête s'est terminée en échec. Infos : " + JSON.stringify(error));
    })
  }