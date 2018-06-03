<?php 
	class Clients{
		public function insertClient($data){
			
			$c=new Connect();
			$connection=$c->connection();
			
			$id_user=$_SESSION['iduser'];
			$sql="INSERT INTO sl_clients (id_user,
										name_client,
										last_client,
										address_client,
										email_client,
										telephone_client,
										rfc)
							VALUES ('$id_user',
									'$data[0]',
									'$data[1]',
									'$data[2]',
									'$data[3]',
									'$data[4]',
									'$data[5]')";
			return mysqli_query($connection,$sql);	
		}
		public function updateClient($data){
			
			$c=new Connect();
			$connection=$c->connection();
			
			$sql="UPDATE sl_clients SET name_client='$data[1]',
							last_client='$data[2]',
							address_client='$data[3]',
							email_client='$data[4]',
							telephone_client='$data[5]',
							rfc='$data[6]'
						WHERE id_client='$data[0]'";

			return mysqli_query($connection,$sql);	
		}
    
 		public function deleteClient($idClient){

			$c=new Connect();
			$connection=$c->connection();

			$sql="DELETE FROM sl_clients WHERE id_client='$idClient'";

			return mysqli_query($connection,$sql);
		}

		public function getClientData($idClient){

			$c=new Connect();
			$connection=$c->connection();

			$sql="SELECT id_client,
							name_client,
							last_client,
							address_client,
							email_client,
							telephone_client,
							rfc
					FROM sl_clients 
					WHERE id_client='$idClient'";
					
			$result=mysqli_query($connection,$sql);
			
			$row=mysqli_fetch_row($result);
			
			$clientArray=array(
						'id_client' => $row[0],
						'name_client' => $row[1],
						'last_client' => $row[2],
						'address_client' => $row[3],
						'email_client' => $row[4],
						'telephone_client' => $row[5],
						'rfc' => $row[6]
						);
			return $clientArray;
		}
    
	}
 ?>
