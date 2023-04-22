$(function()
{
	$("#form_cat").validate(
		{

		rules: {
			nom:  {
				required: true,
				minlength: 2
			},
			pointfidel: {
				required: true,
				number: true
			},
			nbproduit: {
				required: true,
				number: true
			},
		},

		messages: {
			nom: {
				required: "Champ obligatoire",
				minlength: " Le nom d'utilisatuer doit contenir au moins 2 caractères",
			},
			pointfidel: {
				required: "Champ obligatoire",
			},
			nbproduit: {
				required: "Champ obligatoire",
			},
		}
	});
});