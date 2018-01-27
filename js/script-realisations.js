// alert('coucou');

$(function() //Attente de chargements de tous les elements du DOM
{
	$('#vers-licornes').on('click', function() //Gestion du click sur image licornes
	{
		//Ouverture d'un nouvel onglet vers la realisation 'licornes'
		window.open("realisations/01-licornes/eval-avril.html");
	});

	$('#vers-ecommerce').on('click', function() //Gestion du click sur image e-commerce
	{
		//Ouverture d'un nouvel onglet vers la realisation 'boutique e-commerce'
		window.open("realisations/02-site-e-commerce/connexion.php");
	});

	$('#vers-photos-vacances').on('click', function() //Gestion du click sur image photos-vacances
	{
		//Ouverture d'un nouvel onglet vers la realisation 'photos de vacances'
		window.open("realisations/03-photos-vacances/photos-vacances.html");
	});

	$('#vers-custom-shirt').on('click', function() //Gestion du click sur image custom-shirt
	{
		//Ouverture d'un nouvel onglet vers la realisation 'custom-shirt'
		window.open("realisations/04-custom-shirt/web/index_dev.php");
	});

	$('#vers-mini-api-rest').on('click', function() //Gestion du click sur image api-rest
	{
		//Ouverture d'un nouvel onglet vers la realisation 'api-rest'
		window.open("realisations/05-mini-api-rest/web/index_dev.php");
	});
});
