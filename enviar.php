<?php
$errors = '';
$myemail = 'hnsdream@gmail.com';//<-----Put Your email address here.
if(empty($_POST['nombre'])  ||
   empty($_POST['email']) ||
   empty($_POST['mesaje']))
{
    $errors .= "\n Error: all fields are required";
}
$name = $_POST['nombre'];
$email_address = $_POST['email'];
$message = $_POST['mensaje'];
if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i",
$email_address))
{
    $errors .= "\n El e-mail que ingresaste es inválido";
}

if( empty($errors))
{
$to = $myemail;
$email_subject = "Nevo registro de: $name";
$email_body = "Buenas tardes amor (excepto Rodrigo). ".
" Aquí los detalles del nuevo registro en el Hackatón:\n Nombre de representante: $name \n ".
"Email: $email_address\n Integrante 1 \n $message";
$headers = "From: $myemail\n";
$headers .= "Reply-To: $email_address";
mail($to,$email_subject,$email_body,$headers);
//redirect to the 'thank you' page
header('Location: index.html');
}
?>