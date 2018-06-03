
<?php
	session_start();
	$idUser=$_SESSION['iduser'];
	require_once "../../classes/connection.php";
	require_once "../../classes/Items.php";

	$obj = new Items();

	$data=array();

    $imageName=$_FILES['image']['name'];
    $storagePath=$_FILES['image']['tmp_name'];
    $folder='../../files/';
    $finalPath=$folder.$imageName;

    $dataImg=array(
		$_POST['selectCategory'],
		$imageName,
		$finalPath
			);

    if(move_uploaded_file($storagePath, $finalPath)){
    		$idImage=$obj->insertImage($dataImg);

    		if($idImage > 0){

					$data[0]=$_POST['selectCategory'];
					$data[1]=$idImage;
					$data[2]=$idUser;
					$data[3]=$_POST['name'];
					$data[4]=$_POST['description'];
					$data[5]=$_POST['quantity'];
					$data[6]=$_POST['price'];
					echo $obj->insertItem($data);
				}else{
					echo 0;
				}	

			}

?>


