<?php 
Class Model extends CI_Model {

	public function get_produk_all() {
		$sql = "SELECT aa.id_barang, aa.kode_barang, aa.nama_barang, aa.harga_barang,aa.gambar FROM data_barang aa order by id_barang desc limit 4";
		// var_dump($sql);
		// exit();
		$output = $this->db->query($sql);
		
		return $output->result();
	}

	public function get_produk_by_kode($data){
		$sql = "select * from data_barang aa where aa.id_barang = ?";
		$param = array(
			$data['id_barang']
		);
		
		$output = $this->db->query($sql,$data['id_barang']);
		// echo"<pre/>";
		// var_dump($output->result());
		// exit();
		return $output->result();
	}

	public function insert_produk($data){
		
		$sql = "insert into data_barang(kode_barang, nama_barang, harga_barang, gambar, keterangan) values(?,?,?,?,?)";
		$param = array(
			$data['kode_barang'],
			$data['nama_barang'],
			$data['harga_barang'],
			$data['gambar_barang'],
			$data['keterangan']
		);
		// var_dump($param);
		// exit();
		$output = $this->db->query($sql,$param);

		return $output;
	}

	public function get_kode_barang() {
		$sql = "select max(kode_barang) as max_kode from data_barang";
		$output = $this->db->query($sql);
		foreach ($output->result() as $row) {
			$result = array(
				'kode_barang' => $row->max_kode,
			);
		}
		// var_dump($result);
		// exit();
		return $result;
	}

	public function login_admin($data) {
		$param =array (
			$data['username'],
			$data['password']
		);

		$sql = "select  aa.id_admin, aa.nama_lengkap from admin aa where username = ? and password = ?";
		$output = $this->db->query($sql, $param);

		foreach ($output->result() as $key) {
			$this->session->set_userdata('login', $key->nama_lengkap);
			if($this->session->userdata('login')){
				$data = array(
					'logged_in' => $this->session->userdata('login'),
					'status' => true
				);
			}else{
				$data = array(
					'logged in' => 'user tidak ada!',
					'status' => false
				);
			}
		}
		return $data;
	}

	public function search($data){

		$param = '%'.$data['value'].'%';
		
		$sql = "select * from data_barang where nama_barang like ?";
		$output = $this->db->query($sql, $param);
		$this->session->set_userdata('data', $output->result());
		
		if($this->session->userdata('data')){
			$data = array(
				'data' => $this->session->userdata('data'),
				'status' => true
			);
		}else{
			$data = array(
				'data in' => 'data tidak ada!',
				'status' => false
			);
		}	
		// echo"<pre/>";
		// var_dump($data);
		// exit();
		return $data;
	}

	public function delete_barang($data){
		$param = $data['id'];
		$sql = "delete from data_barang where id_barang = ?";
		$output = $this->db->query($sql, $param);
		return $output;
	}

	public function update($data){
		$sql = "update data_barang set nama_barang = ?, harga_barang = ?, keterangan = ? where id_barang = ?";
		$param = array(
			$data['nama_barang'],
			$data['harga_barang'],
			$data['keterangan'],
			$data['id']
		);
		// echo"<pre/>";
		// var_dump($param);
		// exit();
		$output = $this->db->query($sql, $param);
		
		return $output;
	}

	public function get_slide(){
		$sql = "select * from slide order by id_slide";
		$output = $this->db->query($sql);
		// echo"<pre/>";
		// var_dump(count($output->result()));
		// exit();
		return $output->result();
	}

	public function insert_slide($data){
		$today = date('Y-m-d');
		$param = array(
			$data['slide1'],
			$data['slide2'],
			$data['slide3'],
			$today
		);
		$sql = "insert into slide (slide1,slide2,slide3,create_date) values (?,?,?,?)";
		$output = $this->db->query($sql, $param);
		return $output;
	}

	public function update_slide($data){
		$today = date('Y-m-d');
		$param = array(
			$data['slide1'],
			$data['slide2'],
			$data['slide3'],
			$today,
			$data['id_slide']
		);
		$sql = "update slide set slide1 = ? ,slide2 = ?, slide3 = ? , update_date = ? where id_slide = ?";
		$output = $this->db->query($sql, $param);
		return $output;
	}
}
?>