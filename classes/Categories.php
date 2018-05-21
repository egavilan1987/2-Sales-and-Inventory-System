<?php 

	class categories{

		public function addCategory($data){
			$c=new Connect();
			$connection=$c->connection();

			$sql="INSERT INTO sl_categories(id_user,
										name_category,
										date_capture)
						VALUES ('$data[0]',
								'$data[1]',
								'$data[2]')";

			return mysqli_query($connection,$sql);
		}

		public function updateCategory($data){
			$c=new Connect();
			$connection=$c->connection();

			$sql="UPDATE sl_categories SET name_category='$data[1]'
								WHERE id_category='$data[0]'";
			return mysqli_query($connection,$sql);
		}

		public function deleteCategory($idcategory){
			$c=new Connect();
			$connection=$c->connection();
			$sql="DELETE FROM sl_categories WHERE id_category='$idcategory'";
			return mysqli_query($connection,$sql);
		}
	}

 ?>