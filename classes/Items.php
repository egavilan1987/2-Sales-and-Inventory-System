

<?php 
	class items{
		public function insertImage($data){
			$c=new Connect();
			$connection=$c->connection();

			$date=date('Y-m-d');

			$sql="INSERT INTO sl_images (id_category,
										name_image,
										path,
										uploaded_date)
							VALUES ('$data[0]',
									'$data[1]',
									'$data[2]',
									'$date')";


			return mysqli_query($connection,$sql);
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
		
public function getItemData(idItem){
			$c=new Connect();
			$connection=$c->connection();
			$sql="SELECT id_product, 
						id_category, 
						name_product,
						description_product,
						stock_product,
						price_product 
				FROM sl_items 
				WHERE id_product='idItem'";
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
		public function actualizaArticulo($datos){
			$c=new conectar();
			$conexion=$c->conexion();
			$sql="UPDATE articulos set id_categoria='$datos[1]', 
										nombre='$datos[2]',
										descripcion='$datos[3]',
										cantidad='$datos[4]',
										precio='$datos[5]'
						where id_producto='$datos[0]'";
			return mysqli_query($conexion,$sql);
		}
		public function eliminaArticulo($idarticulo){
			$c=new conectar();
			$conexion=$c->conexion();
			$idimagen=self::obtenIdImg($idarticulo);
			$sql="DELETE from articulos 
					where id_producto='$idarticulo'";
			$result=mysqli_query($conexion,$sql);
			if($result){
				$ruta=self::obtenRutaImagen($idimagen);
				$sql="DELETE from imagenes 
						where id_imagen='$idimagen'";
				$result=mysqli_query($conexion,$sql);
					if($result){
						if(unlink($ruta)){
							return 1;
						}
					}
			}
		}
		public function obtenIdImg($idProducto){
			$c= new conectar();
			$conexion=$c->conexion();
			$sql="SELECT id_imagen 
					from articulos 
					where id_producto='$idProducto'";
			$result=mysqli_query($conexion,$sql);
			return mysqli_fetch_row($result)[0];
		}
		public function obtenRutaImagen($idImg){
			$c= new conectar();
			$conexion=$c->conexion();
			$sql="SELECT ruta 
					from imagenes 
					where id_imagen='$idImg'";
			$result=mysqli_query($conexion,$sql);
			return mysqli_fetch_row($result)[0];
		}
	}
 ?>
