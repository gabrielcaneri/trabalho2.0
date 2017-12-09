function validaCampo()
{
if(document.cadastro.nome.value=="")
	{
	alert("O Campo nome é obrigatório!");
	return false;
	}
else
	if(document.cadastro.email.value==""  || document.cadastro.email.value.indexOf('@')==-1 || document.cadastro.email.value.indexOf('.')==-1 )
	{
	alert("O Campo email é obrigatório!");
	return false;
	}
else
	if(document.cadastro.site.value=="" || (document.cadastro.site.value.indexOf('http://') ==-1 && document.cadastro.site.value.indexOf('https://') ==-1) || document.cadastro.site.value.indexOf('.') ==-1 )
	{
	alert("O Campo web-site é obrigatório!  Exemplo: http://www.google.com");
	return false;
	}
else
return true;
}