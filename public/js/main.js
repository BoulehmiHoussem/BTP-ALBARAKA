var messages = {
    error: 'non definie',
    success: 'ajouté avec succes',
}
    function registerSub(id, url, token)
    {
        start = $('#start-'+id).val()
        end = $('#start-'+id).val()
        
        $.ajax({
            //L'URL de la requête 
            url: url,
    
            //La méthode d'envoi (type de requête)
            method: "POST",
    
            //data
            data: { "subtask" : id,
                    "start" : start,
                    "end" : end,
                    "_token": token },
            //Le format de réponse attendu
          
        })
        .done(function(response){
            console.log(response)
            $('#hide-'+id).show()
            $('#show-'+id).hide()
            $('#actions-'+id).show()

        })
        .fail(function(error){
            console.log("La requête s'est terminée en échec. Infos : " + JSON.stringify(error));
        })
        return false;
    }
    function removeSub(id)
    {
        $('#hide-'+id).hide()
        $('#show-'+id).show()
      
            $('#actions-'+id).hide()
            $('#start-'+id).val("")
            $('#end-'+id).val("")
    }
var currentdate = $('#current_date').val();
$('.product-quantity-add').on('click', function(){
    alert('eee')
})
function refreshTasks(date, planning, token, url)
{
    $('#current_date').val(date);
    $('#listed_li').attr("style", 'opacity:0.3')
    $.ajax({
        //L'URL de la requête 
        url: url,

        //La méthode d'envoi (type de requête)
        method: "POST",

        //data
        data: { "planning_id" : planning,
                "date" : $('#current_date').val(),
                "_token": token },
        //Le format de réponse attendu
        dataType : "HTML",
    })
    .done(function(response){
        $('#listed_li').attr("style", 'opacity:1')
        $('#listed_li').empty();
        $('#listed_li').html(response);
    })
    .fail(function(error){
        console.log("La requête s'est terminée en échec. Infos : " + JSON.stringify(error));
    })
}
function searchTasks(tosearch, url, token, planning_id)
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
            data: { "planning_id" : planning_id,
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

  function appendtask(id, token, url, id_planning)
  {
    
      var date = $('#current_date').val();
    $.ajax({
        //L'URL de la requête 
        url: url,

        //La méthode d'envoi (type de requête)
        method: "GET",

        //data
        data: { 'created_at' : date,
                'planning_id': id_planning,
                "task_id": id,
                "id" : id,
                "_token": token },
        //Le format de réponse attendu
        dataType : "HTML",
    })
    .done(function(response){
        console.log(response)
        $('#listed_li').append(response)
        $('.searchnav').hide();
        $('.nodata').hide();
    })
    .fail(function(error){
        console.log("La requête s'est terminée en échec. Infos : " + JSON.stringify(error));
    })
  }