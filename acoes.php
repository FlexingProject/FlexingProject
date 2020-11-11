	<?php

	include('db/connect.php');
	echo "Carregando...";
	session_start();

		if(isset($_SESSION["LOG"])){

    $mail = $_SESSION["LOG"]["Login"];
	$meta = $_POST["campo1"];
	    } else {
        header('Location: login.php');
    }

    include_once("base.php");
    include('db/connect.php')
?>

<?php


		$query = "INSERT INTO follows (follow_send, follow_recept) VALUES ('".$_POST["follow_send"]."', '".$_SESSION["id"]."')";

		$statement = $connect->prepare($query);
		if($statement->execute())
		{
			$sub_query = "
			UPDATE usuarios SET num_follows = num_follows + 1 WHERE id = '".$_POST["follow_recept"]."'
			";
			$statement = $connect->prepare($sub_query);
			$statement->execute();

			$notification_text = '<b>' . Get_user_name($connect, $_SESSION["id"]) . '</b> começou a seguir você.';

			$insert_query = "
			INSERT INTO notificacoes 
			(noti_recept, noti_text, noti_lida) 
			VALUES ('".$_POST["follow_send"]."', '".$notification_text."', 'no')
			";

			$statement = $connect->prepare($insert_query);
			$statement->execute();
		}

	

	if($_POST['action'] == 'unfollow')
	{
		$query = "
		DELETE FROM follows 
		WHERE follow_send = '".$_POST["follow_send"]."' 
		AND follow_recept = '".$_SESSION["id"]."'
		";
		$statement = $connect->prepare($query);
		if($statement->execute())
		{
			$sub_query = "
			UPDATE usuarios 
			SET num_follows = num_follows - 1 
			WHERE id = '".$_POST["follow_send"]."'
			";
			$statement = $connect->prepare($sub_query);
			$statement->execute();

			$notification_text = '<b>' . Get_user_name($connect, $_SESSION["user_id"]) . '</b> deixou de seguir você.';

			$insert_query = "
			INSERT INTO notificacoes
			(noti_recept, noti_text, noti_lida) 
			VALUES ('".$_POST["sender_id"]."', '".$notification_text."', 'no')
			";
			$statement = $connect->prepare($insert_query);

			$statement->execute();
		}
	}

	?>