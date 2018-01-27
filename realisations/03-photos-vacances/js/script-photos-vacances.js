$(function() //Attente du chargement de tous les elements du DOM
{
	//Initialisations avant les clicks de l'utilisateur
	$("h2").hide();
	var cptrImageGalerie = 0;
	var galerieEnCoursDeVisionnage = '';
	$(".new-york").data('voyage','new-york');
	$(".japon").data('voyage','japon');
	$(".australie").data('voyage','australie');
	$(".islande").data('voyage','islande');
	$(".chili").data('voyage','chili');

	//Gestion du click sur une carte postale quelle qu'elle soit
	$(".box").on('click', function()
	{
		//Récupérer la ville de la carte postale choisie
		var voyageCartePostale = $(this).data('voyage');

		//Mettre le bord de la carte postale cliquée en bleu ocean
		$(".box").css("border-color", "white"); //Remettre toutes les cartes postales en border blanc
		$("."+voyageCartePostale).css("border-color", "rgb(137,169,228)");

		//Alimenter la zone gallerie
		$('#galerie-selectionnee').html("<img src='image/"+voyageCartePostale+"-01.jpg'><img src='image/"+voyageCartePostale+"-02.jpg'><img src='image/"+voyageCartePostale+"-03.jpg'>");
		$("h2").show();
		cptrImageGalerie = 3;
		galerieEnCoursDeVisionnage = voyageCartePostale;
	});

	//Gestion du click sur voir plus de photos de la galerie en cours de visionnage
	$("h2").on('click', function()
	{
			var request = $.ajax(
			{
				url: "json/photos-vacances-"+galerieEnCoursDeVisionnage+".json", //Note : Si fichier json n'a pas l'extension .json ca met une erreur de parsing
				method: "GET",
				dataype : "json"
			});

			request.done(function(jsonData)
			{
				//pas besoin de parser le jsonData pour info
				var imageSuivante1 = jsonData[cptrImageGalerie].image;
				var imageSuivante2 = jsonData[cptrImageGalerie+1].image;
				var imageSuivante3 = jsonData[cptrImageGalerie+2].image;
				$('#galerie-selectionnee').append("<img src='image/"+imageSuivante1+"'><img src='image/"+imageSuivante2+"'><img src='image/"+imageSuivante3+"'>");
				cptrImageGalerie += 3;
				if (cptrImageGalerie == 15)
				{
					$("h2").hide();
				}	
			});

			request.fail(function(jqXHR, textStatus)
			{
		  		alert("La requête ajax a échouée: " + textStatus );
			});

	}); //Fin gestion clic sur "voir-plus"

}); //Fin de la fonction "globale jQuery"