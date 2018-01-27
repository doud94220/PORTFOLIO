function maitriseLangage(langage, competence, couleurDebut, couleurFin)
{
	this.langage = langage;
	this.competence = competence;
	this.couleurDebut = couleurDebut;
	this.couleurFin = couleurFin;
}

var tableauLangageMaitrise = [];

var html = new maitriseLangage ('HTML5', 0.9, '#e54f27', '#ec662b');
tableauLangageMaitrise.push(html);

var css = new maitriseLangage ('CSS3', 0.7, '#1e63ad', '#399bd6');
tableauLangageMaitrise.push(css);

var bootstrap = new maitriseLangage ('Bootstrap', 0.4, '#080036', '#5e2c50');
tableauLangageMaitrise.push(bootstrap);

var wordpress = new maitriseLangage ('WordPress', 0.4, '#464646', '#21759a');
tableauLangageMaitrise.push(wordpress);

var javascript = new maitriseLangage ('Javascript', 0.7, '#63a92f', '#8dbf27');
tableauLangageMaitrise.push(javascript);

var jquery = new maitriseLangage ('jQuery', 0.70, '#172c45', '#193556');
tableauLangageMaitrise.push(jquery);

var ajax = new maitriseLangage ('AJAX', 0.5, '#0173bc', '#6caee2');
tableauLangageMaitrise.push(ajax);

var php = new maitriseLangage ('PHP', 0.7, '#e6c900', '#f4e105');
tableauLangageMaitrise.push(php);

var sql = new maitriseLangage ('SQL', 0.7, '#9b488d', '#b676a7');
tableauLangageMaitrise.push(sql);

var silex = new maitriseLangage ('Silex', 0.5, '#78909C', '#78909C');
tableauLangageMaitrise.push(silex);

var sublime = new maitriseLangage ('Sublime', 0.7, '#CCC', '#CCC');
tableauLangageMaitrise.push(sublime);

var netbeans = new maitriseLangage ('Netbeans', 0.5, '#e6c900', '#f4e105');
tableauLangageMaitrise.push(netbeans);

var chrome = new maitriseLangage ('Chrome', 0.7, '#9b488d', '#b676a7');
tableauLangageMaitrise.push(chrome);

var firefox = new maitriseLangage ('Firefox', 0.6, '#78909C', '#78909C');
tableauLangageMaitrise.push(firefox);


function afficheCercles()
{ 
	tableauLangageMaitrise.forEach(function(attribut)
	{
		$('.circle.'+attribut.langage).circleProgress(
		{
			value: attribut.competence,
			fill: {gradient: [[attribut.couleurDebut, 1], [attribut.couleurFin, 1]], gradientAngle: -Math.PI}
		})
	});
};


afficheCercles();
