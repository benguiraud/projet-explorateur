
<form action="table.php" method="post">
    Crée un Dossier : <br>
<input type="text" name="dossier">
<input type="submit" value="Crée">
</form>



<?php

$dossier = $_POST['dossier'];

mkdir($dossier,0777);

?>






































/* on commencer par le php
//on déclare nos variables le nom d'utilisateur et le mot de passe 

$user = "adm";
$mdp = "windows";


//on vérifie si les champs input qu'on mettra plus tard son vide si il sont vide on charge la page si on on vérifie les logins 
//si les id sont correctes ou interdit l'accées si login incorrecte

if (empty($_POST['user']) && empty($_POST['mdp'])){
	
	//le formulaire si les champs sont vides compris n'est ce pas

?>

<html>
<form method="post" action="#">
	<input type="submit" value="connexion.." name="">
	<input type="text" name="user">
	<input type="password" name="mdp">
</form>
</input>

<?php


}
//si il ya quelque chose onvérifie les login si il sont correctes ou pas
else{
	if($_POST['user'] == $user && $_POST['mdp'] == $mdp){
	echo"good password : vous pouvez affichez les donnée de votre bdd ou autres ...";
	}
	else{
	echo"identifiants inincorrectes";
	}
}
*/

?>
