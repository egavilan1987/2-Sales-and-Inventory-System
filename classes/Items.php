

<?php 
	class Items{
		public function insertImage($data){
			$c=new Connect();
			$connection=$c->connection();

			$date=date('Y-m-d');

			$sql="INSERT INTO sl_images (id_category,
										name_image,
										pathStorage,
										uploaded_date
										)
							VALUES ('$data[0]',
									'$data[1]',
									'$data[2]',
									'$date')";


			$result=mysqli_query($connection,$sql);

			return mysqli_insert_id($connection);
		}
			public function insertItem($data){
			$c=new Connect();
			$connection=$c->connection();

			$date=date('Y-m-d');

			$sql="INSERT INTO sl_items (id_category,
										id_image,
										id_user,
										name_product,
										description_product,
										stock_product,
										price_product,
										date_capture) 
							VALUES ('$data[0]',
									'$data[1]',
									'$data[2]',
									'$data[3]',
									'$data[4]',
									'$data[5]',
									'$data[6]',
									'$date')";
			return mysqli_query($connection,$sql);
		}
		
public function getItemData($idItem){
			$c=new Connect();
			$connection=$c->connection();

			$sql="SELECT id_product, 
						id_category, 
						name_product,
						description_product,
						stock_product,
						price_product 
				FROM sl_items 
				WHERE id_product='$idItem'";
			$result=mysqli_query($connection,$sql);

			$row=mysqli_fetch_row($result);

			$itemArray=array(
					"id_product" => $row[0],
					"id_category" => $row[1],
					"name_product" => $row[2],
					"description_product" => $row[3],
					"stock_product" => $row[4],
					"price_product" => $row[5]
						);
			return $itemArray;
		}
		public function updateItem($data){
			$c=new Connect();
			$connection=$c->connection();

			$sql="UPDATE sl_items SET id_category='$data[1]', 
										name_product='$data[2]',
										description_product='$data[3]',
										stock_product='$data[4]',
										price_product='$data[5]'
						WHERE id_product='$data[0]'";
			return mysqli_query($connection,$sql);
		}
		public function deleteItem($idItem){

			$c=new Connect();
			$connection=$c->connection();

			$idimage=self::getIdImg($idItem);
			$sql="DELETE FROM sl_items  
					WHERE id_product='$idItem'";
			$result=mysqli_query($connection,$sql);

			if($result){
				$pathStorage=self::getImatePath($idimage);
				$sql="DELETE FROM sl_images 
						WHERE id_image='$idimage'";
				$result=mysqli_query($connection,$sql);
					if($result){
						if(unlink($pathStorage)){
							return 1;
						}
					}
			}
		}
		public function getIdImg($idItem){

			$c=new Connect();
			$connection=$c->connection();

			$sql="SELECT id_image 
					FROM sl_items 
					WHERE id_product='$idItem'";
			$result=mysqli_query($connection,$sql);
			return mysqli_fetch_row($result)[0];
		}
		public function getImatePath($idimage){
			$c=new Connect();
			$connection=$c->connection();

			$sql="SELECT pathStorage 
					FROM sl_images 
					WHERE id_image='$idimage'";

			$result=mysqli_query($connection,$sql);
			return mysqli_fetch_row($result)[0];
		}
	}
 ?>
