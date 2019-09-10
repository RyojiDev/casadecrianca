<?php

 // extrai os dados do post

 extract($_POST);

 // imprime os dados do post

 echo "Nome: $nome, Mail: $mail";

?>

<button onclick="return getUser()">get</button>

<script>
function getUser()

{

 $.post('texte.php',{nome: 'Joe', mail: 'joe@foo.com'},function(data){

 //mostrando o retorno do post

 alert(data)

 })

}
</script>
