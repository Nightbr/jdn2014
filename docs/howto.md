# How-To

## Authentification pour accèder à l'API

Voici un exemple de code JavaScript pour s'Authentifier à l'API :

    var api_url = "http://localhost/jdn2014/app/api/laravel/public/v1/";
    var username = "apiuser1";
    var password = "gogogo";
    var api_key = btoa(username + ":" + password);


    //login api
    $.ajax({
        url: api_url+"categorie/1",
        type: 'get',
        //username: username,
        //password: password,
        headers: {
           "Authorization": "Basic " + api_key
        },
        success: function()
        {
          //code de l'application
        }
    });

Voir la partie [Sécurité](security.md) pour plus d'information.

## Récupération et affichage des catégories en Ajax avec jQuery

Au préalable avoir jQuery et Mustache dans son projet.

index.html

    <script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="js/mustache.js"></script>

Nous allons récupérer les catégories puis les afficher à l'aide du système de microtemplating **Mustache** :

app.js

    // on est authentifié
    // affichage liste des promos
    $.getJSON(api_url+"categorie", function(data) {
       var result = data;
       if(!result.error){ 
            // on va chercher le template
            $.get("tpl/lapinou.tpl", function(data){
                var tpl = data;

                $.each(result.categories, function(key, categorie) {
                    //console.log(key, categorie);
                    var dataRender = {'id':categorie.id,'title':categorie.title} // on organise les données à afficher
                    $("#promoList").append(Mustache.render(tpl, dataRender)); // on ajoute le contenu 
                    // construction de la liste du form d'inscription
                    $("#categorie").append('<option value="'+categorie.id+'">'+categorie.title+'</option>'); 
                });
            });
        }
    });


tpl/lapinou.tpl

    <!-- div "lapinou" à copier sans modération !!! -->
    <div class="lapinou col-md-3" >                  
        <h4>{{title}}</h4>      
            <!--<span>Diplomés</span> -->
               <!--LAPINOU MODAL: afficher la liste dans un modal + voir avec l'API si possible, 
               envoyer la liste ajax en fonction du bouton cliqué (#data-target "#MyModal?listepromo200X"?? ou dans le js (en bas)
               Ceci est un test, copier les lapinous si fonctionnel... ;) 
               Le modal se trouve en dessous des lapinous pour modifs-->
           <br/> <br/>
         <button class="btn btn-danger btn-lg button-modal"  data-target="#myModal" data-id="{{id}}" data-title="{{title}}">
            Voir la liste
        </button>   
    </div>     
    <!-- fin div "lapinou" --> 

## Inscription d'un Guest en Ajax avec jQuery

Créer un formulaire en html :

index.html 

    <form method="post" name="inscriptionform" id="inscrform" class="validate item_left" role="form">                                                      
       <div class="form-group">                                     
          <div class="col-md-6">                                        
             <label for="firstname">Prénom</label>                                      
             <input type="text" name="firstname" id="firstname" class="form-control input-lg required" placeholder="Votre prénom">                                      
          </div>        
           <div class="col-md-6">                                       
             <label for="lastname">Nom</label>                                      
             <input type="text" name="lastname" id="lastname" class="form-control input-lg required" placeholder="Votre nom">                                       
          </div>                    
          <div class="col-md-6">                                            
             <label for="email">Email</label>                                       
             <input type="email" name="email" id="email" class="form-control input-lg required email" placeholder="Votre email">                                        
          </div>
          <div class="col-md-6">                                
             <label for="categorie">Categorie/Promotion</label>
             <select id="categorie" name="categorie_id" class="form-control input-lg required" placeholder="Votre Categorie/Promotion">
             </select>
          </div>
          <div class="col-md-6">                                
             <label for="table">Table</label>
             <select id="table" name="table_id" class="form-control input-lg required" placeholder="Votre Table">
             </select>
          </div>
       </div>
      <div class="form-group">                                      
        <div class="col-md-12 text-right">                              
          <input type="submit" id="inscrform_submit" class="btn btn-dark" value="S'inscrire">                                       
        </div>                                  
      </div>                  
      <input type="hidden" name="subject" value="Contact from your site">                               
    </form> 


note : Il faut au préalable avoir été authentifié à l'api.

app.js

       // Inscription Form Request
       var inscrform = $('#inscrform');
       var submit = $('#inscrform_submit');
       var infoDiv = $('#infoDiv');

       inscrform.validate();  

       // form submit event
        $(document).on('submit', '#inscrform', function(e) {
          e.preventDefault(); // prevent default form submit
          // sending ajax request through jQuery
          //console.log(inscrform);
          $.ajax({
             url: api_url+'guest', 
             type: 'POST', 
             data: inscrform.serialize()+"&isPaid=0",
             success: function(data) {
                inscrform.fadeOut(300);
                if(!data.error){
                   
                   infoDiv.html("Vous avez bien été inscrit, merci de régler les frais d'inscription le plus vite possible."); // fade in response data     
                   infoDiv.fadeIn(100);
                   setTimeout(function() {
                      infoDiv.fadeOut(300);
                      inscFormInit(api_url);
                      $('#firstname, #email, #lastname, #table, #categorie').val('');
                      inscrform.fadeIn(1800);
                   }, 4000 );  
                }
                else
                {
                   infoDiv.html("Erreur lors de l'inscription !!"); // fade in response data     
                   infoDiv.fadeIn(100);
                   setTimeout(function() {
                      infoDiv.fadeOut(300);
                      inscrform.fadeIn(1800);
                   }, 4000 );
                }

             },
             error: function(e) {
                console.log(e)
             }
          });
       });