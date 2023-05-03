$(function()
{
	$("#form_prod").validate(
		{

		rules: {
			nom:  {
				required: true,
				minlength: 2
			},
			prix: {
				required: true,
				number: true,
				min: 100,
				max: 10000
			},
			informations: {
				required: true,
				minlength: 3
				
			},
		},

		messages: {
			nom: {
				required: "Champ obligatoire",
				minlength: " Le nom doit contenir au moins 2 caractères",
			},
			prix: {
				required: "Champ obligatoire",
				number: "Le prix doit etre numerique",
				min: " Le prix doit etre supérieur ou egale a 100.",
				max: " Le prix doit etre inférieur ou egale a 10000.",
			},
			informations: {
				required: "Champ obligatoire",
				minlength: " L'information doit contenir au moins 3 caractères",
			},


		}
		
	});
});