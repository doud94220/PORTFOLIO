$(function() //Attente du chargement de tous les elements du DOM
{
   //Gestion du click sur "VIEW ALL USERS"
   $("#viewAllUsers").on('click', function()
   {
       //Vider les zones de msgs
       $('#msgZoneDeleteUser').html('');
       $('#msgZoneDeleteTask').html('');
       $('#msgZoneAddTask').html('');
       $('#msgZoneAddUser').html('');
       
       //Appel de la bonne route en ajax
       var request = $.ajax(
        {
    	  url: "https://portfolio-ea.000webhostapp.com/realisations/05-mini-api-rest/web/index_dev.php/view_all_users_ajax",
    	  method: "GET",
    	  dataype : "json"
    	});
	 
	request.done(function(jsonData)
	{
            data = JSON.parse(jsonData);
            //console.log(typeof(jsonData));
            //console.log(Array.isArray(jsonData));
            
            contentToDisplay="";
            
            for (i = 0; i < data.length; i++)
            {
                //contentToDisplay += "<li>User n° " + data[i].id + " : " + data[i].name + " : " + data[i].email + " <span class='seeTasks'><u>See Tasks</u></span>" + " <span class='deleteUser'><u>Supprimer</u></span></li>";
                contentToDisplay += "<li>User n° " + data[i].id + " : " + data[i].name + " : " + data[i].email + " <button type='button' class='btn btn-info seeTasks'>See Tasks</button>" + " <button type='button' class='btn btn-danger deleteUser'>Delete</button></li>";
            }
 
            $("#usersZone").find('ul').html(contentToDisplay);

            for (i = 0; i < data.length; i++)
            {
                $(".deleteUser").eq(i).data('id', data[i].id);
                $(".seeTasks").eq(i).data('id', data[i].id);                
            }

            //Gestion du click sur "DELETE USER"
            $(".deleteUser").on('click', function()
            {
                //Recup id user
                var idUser = $(this).data('id');
                
                //requete ajax pour delete user
                var request = $.ajax(
                {
                   url: "https://portfolio-ea.000webhostapp.com/realisations/05-mini-api-rest/web/index_dev.php/delete_user_ajax_sans_get/"+idUser,
                   method: "DELETE",
                   dataype : "json"
                });
                
                request.done(function(jsonData2)
                {
                    data2 = JSON.parse(jsonData2);
                    data2Enrichi = data2 + " Please click on the 'View all users' link at the top to refresh the users list.";
                    $("#msgZoneDeleteUser").html(data2Enrichi).css('color','#4CAF50');
                    
                }); //Fin du done du 'delete user'

                request.fail(function(jqXHR, textStatus)
                {
                    alert( "The request on deleting a user has failed: " + textStatus );
                });
                
            });//Fin gestion du click du 'delete user'

            //Gestion du click sur "SEE CURRENT USER TASKS"
            $(".seeTasks").on('click', function()
            {
                //Vider les zones de msgs
                $('#msgZoneDeleteUser').html('');
                $('#msgZoneDeleteTask').html('');
                $('#msgZoneAddTask').html('');
                $('#msgZoneAddUser').html('');       
                
                //Recup id user
                var idUser = $(this).data('id');

                //requete ajax pour voir user tasks
                var request = $.ajax(
                {
                   url: "https://portfolio-ea.000webhostapp.com/realisations/05-mini-api-rest/web/index_dev.php/show_tasks_user_ajax/"+idUser,
                   method: "GET",
                   dataype : "json"
                });

                request.done(function(jsonData3)
                {
                    //Recup arary de tasks sans json
                    data3 = JSON.parse(jsonData3);
                    
                    //Initialiser contenu tasks à afficher
                    contentToDisplay3='<p>Tasks for user n° ' + idUser + ' : </p>';
                    
                    //Ajouter en-tête tableau
                    contentToDisplay3 += '<table><tr><th class="monTh">Id Task</th><th class="monTh">Title</th><th class="monTh">Description</th><th class="monTh">Creation Date</th><th class="monTh">Status</th><th class="monTh"></th></tr>';

                    //Mettre le corps du tableau cad les tasks
                    for (i = 0; i < data3.length; i++)
                    {
                        contentToDisplay3 += '<tr><td class="monTd">' + data3[i].id +'</td><td class="monTd">' + data3[i].title + '</td><td class="monTd">' + data3[i].description + '</td><td class="monTd">' + data3[i].creation_date + '</td><td class="monTd">' + data3[i].status + '</td><td class="monTd"><button type="button" class="btn btn-danger deleteTask">Delete</button></td></tr>';
                    }

                    //Fermer le tableau
                    contentToDisplay3 += "</table>";
                    
                    //Ajouter le lien pour add task
                    contentToDisplay3 += "<br><p><u class='addTask'>Add Task for this user</u></p>";
                            
                    $("#tasksZone").html(contentToDisplay3);

                    //Mettre les id des tasks "cachés" dans les <td> qui servent au 'delete task'
                    for (i = 0; i < data3.length; i++)
                    {
                        $(".deleteTask").eq(i).data('idTask', data3[i].id);
                    }                    
                    
                    //Gestion du click sur "ADD TASK for this user" ///CA MARCHE QU'UNE FOIS LE ADD TASK...après faut rafraichir la page
                    $(".addTask").on('click', function()
                    {
                        //Afficher le formulaire
                        $("#addTaskZone").show();
                            
                        //Injecter l'id du user dans le form dans le champs caché
                        $("#hiddenIdUSer").val(idUser);
                            
                        //Gestion de la validation du form d'ajout de task
                        $("#formAddTask").submit(function(e)
                        {
                            //Annuler le comportement par default du form
                            e.preventDefault();

                            //Appel de la bonne route en ajax
                            var request = $.ajax(
                            {
                               url: "https://portfolio-ea.000webhostapp.com/realisations/05-mini-api-rest/web/index_dev.php/validate_add_task_ajax",
                               method: "POST",
                               data: $("form").serialize() //Mettre sur une ligne les data du form comme dans le get d'une url
                            });

                            request.done(function(jsonData4)
                            {
                                data4 = JSON.parse(jsonData4);
                                data4Enrichi = data4 + " To refresh please click again on the 'See Tasks' button near the user you chose.";
                                $("#msgZoneAddTask").html(data4Enrichi).css('color','#4CAF50');
                                $("#formAddTask").hide();
                                $("#formAddTask").find('input').val('');

                            }); //Fin du done du 'add task'

                            request.fail(function(jqXHR, textStatus)
                            {
                                alert( "The request on adding a task has failed: " + textStatus );             
                            });
                        }); //Fin gestion valid form
                        
                    });//Fin gestion du click sur "Add Task for this user"

                    //Gestion du click sur "DELETE TASK"
                    $(".deleteTask").on('click', function()
                    {
                        //Recup id task
                        var idTask = $(this).data('idTask');

                        //requete ajax pour delete task
                        var request = $.ajax(
                        {
                           url: "https://portfolio-ea.000webhostapp.com/realisations/05-mini-api-rest/web/index_dev.php/delete_task_ajax/"+idTask,
                           method: "DELETE",
                           dataype : "json"
                        });

                        request.done(function(jsonData4)
                        {
                            data4 = JSON.parse(jsonData4);
                            data4Enrichi = data4 + " To refresh please click again on the 'See Tasks' button near the user you chose.";
                            $("#msgZoneDeleteTask").html(data4Enrichi).css('color','#4CAF50');
                            
                        }); //Fin du done du 'delete task'

                        request.fail(function(jqXHR, textStatus)
                        {
                            alert( "The request on deleting a task has failed: " + textStatus );
                        });

                    });//Fin gestion du click du 'delete task'

                }); //Fin du done du 'see user tasks'

                request.fail(function(jqXHR, textStatus)
                {
                    alert( "The request on seeing user tasks has failed: " + textStatus );
                });

            });//Fin gestion du click du 'see user tasks'
            
	}); //Fin du done de "view all users"

	request.fail(function(jqXHR, textStatus)
	{
            alert( "The request on viewing all the users has failed: " + textStatus );
	});

   });//Fin gestion du click sur "view all users"

    /////////////////////////////////////////////////////////////////////////////////////////////////////////////

    //Gestion du click sur "ADD A USER"
    $("#addUser").on('click', function()
    {
        //Afficher le formulaire
        $("#addUserZone").show();
        
        //Gestion de la validation du form d'ajout de user
        $("#formAddUser").submit(function(e)
        {
            //Annuler le comportement par default du form
            e.preventDefault();
            
            //Appel de la bonne route en ajax
            var request = $.ajax(
            {
               url: "https://portfolio-ea.000webhostapp.com/realisations/05-mini-api-rest/web/index_dev.php/validate_add_user_ajax",
               method: "POST",
               data: $("form").serialize() //Mettre sur une ligne les data du form comme dans le get d'une url
            });

            request.done(function(jsonData9)
            {
                data9 = JSON.parse(jsonData9);
                data9Enrichi = data9 + " Please click on the 'View all users' link at the top to refresh the users list.";
                $("#msgZoneAddUser").html(data9Enrichi).css('color','#4CAF50');
                $("#addUserZone").hide();
                $("#addUserZone").find('input').val(''); //vider les valeurs du form si l'utilisateur le re-remplit plus tard
                                
            }); //Fin du done du 'add user'

            request.fail(function(jqXHR, textStatus)
            {
                alert( "The request on creating a user has failed: " + textStatus );             
            });
        }); //Fin gestion valid form
        
    });//Fin gestion du click sur "add a user"
    

}); //Fin de la fonction "globale jQuery"
