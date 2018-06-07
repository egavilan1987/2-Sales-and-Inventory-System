<?php 

class Sales{
	public function getProductData($idProduct){
			$c=new Connect();
			$connection=$c->connection();

		$sql="SELECT itm.name_product,
		itm.description_product,
		itm.stock_product,
		img.pathStorage,
		itm.price_product
		from sl_items as itm 
		inner join sl_images as img
		on itm.id_image=img.id_image 
		and itm.id_product='$idProduct'";
		$result=mysqli_query($connection,$sql);

		$row=mysqli_fetch_row($result);

		$d=explode('/', $row[3]);

		$img=$d[1].'/'.$d[2].'/'.$d[3];

		$data=array(
			'name_product' => $row[0],
			'description_product' => $row[1],
			'stock_product' => $row[2],
			'pathStorage' => $img,
			'price_product' => $row[4]
		);		
		return $data;
		}
	
	public function crearVenta(){
		$c= new conectar();
		$conexion=$c->conexion();

		$fecha=date('Y-m-d');
		$idventa=self::creaFolio();
		$datos=$_SESSION['tablaComprasTemp'];
		$idusuario=$_SESSION['iduser'];
		$r=0;

		for ($i=0; $i < count($datos) ; $i++) { 
			$d=explode("||", $datos[$i]);

			$sql="INSERT into ventas (id_venta,
										id_cliente,
										id_producto,
										iduser,
										precio,
										fechaCompra)
							values ('$idventa',
									'$d[5]',
									'$d[0]',
									'$idusuario',
									'$d[3]',
									'$fecha')";
			$r=$r + $result=mysqli_query($conexion,$sql);
		}

		return $r;
	}

	public function creaFolio(){
		$c= new conectar();
		$conexion=$c->conexion();

		$sql="SELECT id_venta from ventas group by id_venta desc";

		$resul=mysqli_query($conexion,$sql);
		$id=mysqli_fetch_row($resul)[0];

		if($id=="" or $id==null or $id==0){
			return 1;
		}else{
			return $id + 1;
		}
	}
	public function nombreCliente($idCliente){
		$c= new conectar();
		$conexion=$c->conexion();

		 $sql="SELECT apellido,nombre 
			from clientes 
			where id_cliente='$idCliente'";
		$result=mysqli_query($conexion,$sql);

		$ver=mysqli_fetch_row($result);

		return $ver[0]." ".$ver[1];
	}

	public function obtenerTotal($idventa){
		$c= new conectar();
		$conexion=$c->conexion();

		$sql="SELECT precio 
				from ventas 
				where id_venta='$idventa'";
		$result=mysqli_query($conexion,$sql);

		$total=0;

		while($ver=mysqli_fetch_row($result)){
			$total=$total + $ver[0];
		}

		return $total;
	}
}

?>