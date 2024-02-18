<?php
/**
 * 
 */
class BaseModel
{
	private $maychu = 'localhost';
	private $tk = 'root';
	private $mk = '';
	private $csdl = 'admindb_qlbanhang';
	private $bienketnoi = null;
	function __construct()
	{
		$this->ketnoi();
	}
	// Hàm Kết Nối
	public function ketnoi()
	{
		$this->bienketnoi = new mysqli($this->maychu, $this->tk, $this->mk, $this->csdl);
		mysqli_set_charset($this->bienketnoi, 'utf8');
	}
	/// Lấy dữ liệu mặc định
	public function data($sql)
	{
		$sq = "SELECT * FROM $sql";
		$this->ketqua = $this->bienketnoi->query($sq);
		if ($this->ketqua->num_rows == 0) {
			$data = 0;
		} else {
			while ($row = $this->ketqua->fetch_assoc()) {
				$data[] = $row;
			}
		}
		return $data;
	}
	//KIỂM TRA SẢN PHẨM CÓ ID LÀ $sql
	public function checkgio($sql)
	{
		$sq = "SELECT * FROM sanpham WHERE id_sp= " . $sql . "";
		$this->ketqua = $this->bienketnoi->query($sq);
		if ($this->ketqua->num_rows == 0) {
			$data = 0;
		} else {
			while ($row = $this->ketqua->fetch_assoc()) {
				$data[] = $row;
			}
		}
		return $data;
	}
	///***Phần Login
	// Kiểm tra bản ghi
	public function dem($tk, $mk)
	{
		$sql = 'SELECT * FROM user WHERE taikhoan = "' . $tk . '" and matkhau = "' . $mk . '"';
		$this->ketqua = $this->bienketnoi->query($sql);
		if ($this->ketqua->num_rows == 0) {
			$data = 0;
		} else {
			while ($row = $this->ketqua->fetch_assoc()) {
				$data[] = $row;
			}
		}
		return $data;
	}
	// Lấy Thông tin nhân viên theo id
	public function nhanviengetid($id)
	{
		$sql = 'SELECT * FROM nhanvien WHERE id_nv = "' . $id . '"';
		$this->ketqua = $this->bienketnoi->query($sql);
		if ($this->ketqua->num_rows == 0) {
			$data = 0;
		} else {
			while ($row = $this->ketqua->fetch_assoc()) {
				$data[] = $row;
			}
		}
		return $data;
	}
	// Lấy Hóa đơn bán theo nhân viên
	public function hoadonnv($id)
	{
		$sql = 'SELECT * FROM `hoadonban` WHERE id_nv = "' . $id . '"';
		$this->ketqua = $this->bienketnoi->query($sql);
		if ($this->ketqua->num_rows == 0) {
			$data = 0;
		} else {
			while ($row = $this->ketqua->fetch_assoc()) {
				$data[] = $row;
			}
		}
		return $data;
	}
	// Lấy Hóa đơn theo khách
	public function hoadonkhach($id)
	{
		$sql = 'SELECT * FROM `hoadonban` WHERE id_k = "' . $id . '"';
		$this->ketqua = $this->bienketnoi->query($sql);
		if ($this->ketqua->num_rows == 0) {
			$data = 0;
		} else {
			while ($row = $this->ketqua->fetch_assoc()) {
				$data[] = $row;
			}
		}
		return $data;
	}
	// Lấy chi tiết hóa đơn theo id
	public function chitietbantheoid($id)
	{
		$sql = 'SELECT * FROM `cthoadonban` WHERE id_hd = "' . $id . '"';
		$this->ketqua = $this->bienketnoi->query($sql);
		if ($this->ketqua->num_rows == 0) {
			$data = 0;
		} else {
			while ($row = $this->ketqua->fetch_assoc()) {
				$data[] = $row;
			}
		}
		return $data;
	}
	// Chi tiết hóa đơn nhập theo id
	public function chitietnhaptheoid($id)
	{
		$sql = 'SELECT cthoadonnhap.*, sanpham.donvi FROM cthoadonnhap JOIN sanpham ON cthoadonnhap.id_sp = sanpham.id_sp WHERE id_hd = ?';
	
		$stmt = $this->bienketnoi->prepare($sql);
		$stmt->bind_param('s', $id);
		$stmt->execute();
		$result = $stmt->get_result();
	
		if ($result->num_rows == 0) {
			$data = 0;
		} else {
			while ($row = $result->fetch_assoc()) {
				var_dump($row);
				$data[] = $row;
			}
		}
	
		var_dump($data);
		return $data;
	}
	
	// Hóa đơn nhập theo nhân viên
	public function hoadonnhapnv($id)
	{
		$sql = 'SELECT * FROM `hoadonnhap` WHERE id_nv = "' . $id . '"';
		$this->ketqua = $this->bienketnoi->query($sql);
		if ($this->ketqua->num_rows == 0) {
			$data = 0;
		} else {
			while ($row = $this->ketqua->fetch_assoc()) {
				$data[] = $row;
			}
		}
		return $data;
	}
	//KIỂM TRA NHÂN VIÊN CHƯA CÓ USER
	public function checkadduser()
	{
		$sq = "SELECT * FROM nhanvien WHERE id_nv NOT IN (SELECT id_nv FROM user)";
		$this->ketqua = $this->bienketnoi->query($sq);
		if ($this->ketqua->num_rows == 0) {
			$data = 0;
		} else {
			while ($row = $this->ketqua->fetch_assoc()) {
				$data[] = $row;
			}
		}
		return $data;
	}
	// Hóa Đơn Theo Ngày
	public function hoadonbanday($key)
	{
		switch ($key) {
			case 'nhap': {
					$sq = "SELECT * FROM `hoadonnhap` WHERE ngaynhap = date(now())";
					break;
				}
			case 'ban': {
					$sq = "SELECT * FROM `hoadonban` WHERE ngayban = date(now())";
					break;
				}

		}
		$this->ketqua = $this->bienketnoi->query($sq);
		if ($this->ketqua->num_rows == 0) {
			$data = 0;
		} else {
			while ($row = $this->ketqua->fetch_assoc()) {
				$data[] = $row;
			}
		}
		return $data;
	}
	// Hóa đơn theo ngày và nhân viên
	public function hoadonbandaynv($key, $sql)
	{
		switch ($key) {
			case 'nhap': {
					$sq = "SELECT * FROM `hoadonnhap` WHERE ngaynhap = date(now()) and id_nv= $sql";
					break;
				}
			case 'ban': {
					$sq = "SELECT * FROM `hoadonban` WHERE ngayban = date(now()) and id_nv= $sql";
					break;
				}

		}
		$this->ketqua = $this->bienketnoi->query($sq);
		if ($this->ketqua->num_rows == 0) {
			$data = 0;
		} else {
			while ($row = $this->ketqua->fetch_assoc()) {
				$data[] = $row;
			}
		}
		return $data;
	}
	/// Hóa đơn bán theo ngày và id khách
	public function hoadonbandayidk($sql)
	{
		$sq = "SELECT * FROM `hoadonban` WHERE ngayban = date(now()) and id_k= $sql";
		$this->ketqua = $this->bienketnoi->query($sq);
		if ($this->ketqua->num_rows == 0) {
			$data = 0;
		} else {
			while ($row = $this->ketqua->fetch_assoc()) {
				$data[] = $row;
			}
		}
		return $data;
	}
	/// Hóa đơn theo tháng và id khách
	public function hoadonbanmothidk($sql)
	{
		$sq = "SELECT * FROM `hoadonban` WHERE MONTH(ngayban) = MONTH(now()) AND YEAR(ngayban) =YEAR(now()) and id_k= $sql";
		$this->ketqua = $this->bienketnoi->query($sq);
		if ($this->ketqua->num_rows == 0) {
			$data = 0;
		} else {
			while ($row = $this->ketqua->fetch_assoc()) {
				$data[] = $row;
			}
		}
		return $data;
	}
	/// Hóa đơn theo Năm và id khách
	public function hoadonbanyearidk($sql)
	{
		$sq = "SELECT * FROM `hoadonban` WHERE YEAR(ngayban) =YEAR(now()) and id_k= $sql";
		$this->ketqua = $this->bienketnoi->query($sq);
		if ($this->ketqua->num_rows == 0) {
			$data = 0;
		} else {
			while ($row = $this->ketqua->fetch_assoc()) {
				$data[] = $row;
			}
		}
		return $data;
	}
	// Hóa đơn theo tháng và theo nhân viên
	public function hoadonbanmonthidnv($key, $sql)
	{

		switch ($key) {
			case 'nhap': {
					$sq = "SELECT * FROM `hoadonnhap` WHERE MONTH(ngaynhap) = MONTH(now()) AND YEAR(ngaynhap) =YEAR(now()) and id_nv= $sql";
					break;
				}
			case 'ban': {
					$sq = "SELECT * FROM `hoadonban` WHERE MONTH(ngayban) = MONTH(now()) AND YEAR(ngayban) =YEAR(now()) and id_nv= $sql";
					break;
				}

		}
		$this->ketqua = $this->bienketnoi->query($sq);
		if ($this->ketqua->num_rows == 0) {
			$data = 0;
		} else {
			while ($row = $this->ketqua->fetch_assoc()) {
				$data[] = $row;
			}
		}
		return $data;
	}
	// Lấy hóa đơn theo tháng
	public function hoadonbanmonth($key)
	{

		switch ($key) {
			case 'nhap': {
					$sq = "SELECT * FROM `hoadonnhap` WHERE MONTH(ngaynhap) = MONTH(now()) AND YEAR(ngaynhap) =YEAR(now())";
					break;
				}
			case 'ban': {
					$sq = "SELECT * FROM `hoadonban` WHERE MONTH(ngayban) = MONTH(now()) AND YEAR(ngayban) =YEAR(now())";
					break;
				}

		}
		$this->ketqua = $this->bienketnoi->query($sq);
		if ($this->ketqua->num_rows == 0) {
			$data = 0;
		} else {
			while ($row = $this->ketqua->fetch_assoc()) {
				$data[] = $row;
			}
		}
		return $data;
	}
	// Hóa đơn theo năm và id nhân viên
	public function hoadonbanyearidnv($key, $sql)
	{
		switch ($key) {
			case 'nhap': {
					$sq = "SELECT * FROM `hoadonnhap` WHERE YEAR(ngaynhap) =YEAR(now()) and id_nv= $sql";
					break;
				}
			case 'ban': {
					$sq = "SELECT * FROM `hoadonban` WHERE YEAR(ngayban) =YEAR(now()) and id_nv= $sql";
					break;
				}

		}
		$this->ketqua = $this->bienketnoi->query($sq);
		if ($this->ketqua->num_rows == 0) {
			$data = 0;
		} else {
			while ($row = $this->ketqua->fetch_assoc()) {
				$data[] = $row;
			}
		}
		return $data;
	}
	// Hóa đơn theo năm
	public function hoadonbanyear($key)
	{
		switch ($key) {
			case 'nhap': {
					$sq = "SELECT * FROM `hoadonnhap` WHERE YEAR(ngaynhap) =YEAR(now())";
					break;
				}
			case 'ban': {
					$sq = "SELECT * FROM `hoadonban` WHERE YEAR(ngayban) =YEAR(now())";
					break;
				}

		}
		$this->ketqua = $this->bienketnoi->query($sq);
		if ($this->ketqua->num_rows == 0) {
			$data = 0;
		} else {
			while ($row = $this->ketqua->fetch_assoc()) {
				$data[] = $row;
			}
		}
		return $data;
	}

	//Phần Sửa
	// Sửa Thông Tin Nhân Viên
	public function editnhanvien($b1, $b2, $b3, $b4, $b5, $b6, $b7, $b8)
	{
		$sql = "update nhanvien set tennv='" . $b2 . "',gioitinh='" . $b3 . "',ngaysinh='" . $b4 . "',diachi='" . $b5 . "',sdt='" . $b6 . "',hinhanh='" . $b7 . "',ngaygianhap='" . $b8 . "' where id_nv =$b1";
		$this->bienketnoi->query($sql);
	}
	/// Sửa thông tin khách
	public function editkhach($b1, $b2, $b3, $b4, $b5)
	{
		$sql = "update khachhang set tenk='" . $b2 . "',gioitinh='" . $b3 . "',sdt='" . $b4 . "',ngaythem='" . $b5 . "' where id_k = $b1";
		$this->bienketnoi->query($sql);
	}
	// Sửa Thông tin sản phẩm
	public function editsanpham($b1, $b2, $b3, $b4, $b5, $b6, $b7, $b8)
	{
		$sql = "update sanpham set tensp='" . $b2 . "',id_loaisp='" . $b3 . "',giaban='" . $b4 . "',gianhap='" . $b5 . "',soluong='" . $b6 . "',hinhanh='" . $b7 . "',mota='" . $b8 . "' WHERE id_sp = $b1";
		$this->bienketnoi->query($sql);
	}
	// Sửa Thông tin USER
	public function edituser($b1, $b2, $b3, $b4, $b5)
	{
		$sql = "update user set taikhoan='" . $b2 . "',matkhau='" . $b3 . "',id_nv='" . $b4 . "',level='" . $b5 . "' where id_user = $b1";
		$this->bienketnoi->query($sql);
	}
	// Sửa Loại sản phẩm
	public function editloai($b1, $b2)
	{
		$sql = "update loaisanpham set tenloaisp='" . $b2 . "' where id_loaisp = $b1";
		$this->bienketnoi->query($sql);
	}
	//Hết Sửa
	// *********** Phần Thêm ***************//
	// Thêm Loại sản phẩm
	public function addloai($b1)
	{
		$sql = "insert into loaisanpham (tenloaisp) values ('" . $b1 . "')";
		$this->bienketnoi->query($sql);
	}
	// Thêm User
	public function adduser($b1, $b2, $b3, $b4)
	{
		$sql = "insert into user(taikhoan,matkhau,id_nv,level) VALUES ('" . $b1 . "','" . $b2 . "','" . $b3 . "','" . $b4 . "')";
		$this->bienketnoi->query($sql);
	}
	// Thêm Khách Hàng
	public function addkhach($b1, $b2, $b3, $b4)
	{
		$sql = "insert into khachhang(tenk,gioitinh,sdt,ngaythem) VALUES ('" . $b1 . "','" . $b2 . "','" . $b3 . "','" . $b4 . "')";
		$this->bienketnoi->query($sql);
	}
	/// Thêm Nhân Viên
	public function addnhanvien($b1, $b2, $b3, $b4, $b5, $b6)
	{
		$sql = "insert into nhanvien(tennv,gioitinh,ngaysinh,diachi,sdt,hinhanh,ngaygianhap) VALUES ('" . $b1 . "','" . $b2 . "','" . $b3 . "','" . $b4 . "','" . $b5 . "','" . $b6 . "',DATE(NOW()))";
		$this->bienketnoi->query($sql);
	}
	/// Thêm Sản Phẩm
	public function addsanpham($b1, $b2, $b3, $b4, $b5, $b6, $b7,$b8)
	{
		$sql = "insert into sanpham (tensp,id_loaisp,giaban,gianhap,soluong,hinhanh,mota,donvi) VALUES ('" . $b1 . "','" . $b2 . "','" . $b3 . "','" . $b4 . "','" . $b5 . "','" . $b6 . "','" . $b7 . "','" . $b8 . "')";
		$this->bienketnoi->query($sql);
	}
	// up date số lượng
	public function updatesl($key, $sl, $id)
	{
		switch ($key) {
			case '1': {

					$sql = "UPDATE sanpham SET soluong = soluong - '" . $sl . "'  WHERE id_sp = $id";
					$this->bienketnoi->query($sql);
					break;
				}
			case '2': {

					$sql = "UPDATE sanpham SET soluong = soluong + '" . $sl . "'  WHERE id_sp = $id";
					$this->bienketnoi->query($sql);
					break;
				}
		}
	}
	/// Hóa đơn Bán Hàng
	public function addban($b1, $b2, $b4)
	{
		$sql = "insert into hoadonban(id_nv,id_k,ngayban,tongtien) VALUES ('" . $b1 . "','" . $b2 . "',DATE(NOW()),'" . $b4 . "')";
		$this->bienketnoi->query($sql);
	}
	// Lấy Số Hóa đơn để add vào chi tiết hóa đơn
	public function laysohoadon()
	{
		$sq = "SELECT * FROM `hoadonban` GROUP BY id_hd DESC LIMIT 1 ";
		$this->ketqua = $this->bienketnoi->query($sq);
		if ($this->ketqua->num_rows == 0) {
			$data = 0;
		} else {
			while ($row = $this->ketqua->fetch_assoc()) {
				$data[] = $row;
			}
		}
		return $data;
	}

	// Chi Tiết hóa đơn bán
	public function adchitietban($b1, $b2, $b3, $b4)
	{
		$sql = "insert into cthoadonban (id_hd,id_sp,soluong,giatien) VALUES ('" . $b1 . "','" . $b2 . "','" . $b3 . "','" . $b4 . "')";
		$this->bienketnoi->query($sql);
	}
	// Hóa đơn nhập hàng
	public function addnhap($b1, $b2)
	{
		$sql = "insert into hoadonnhap(id_nv,ngaynhap,tongtien) VALUES ('" . $b1 . "',DATE(NOW()),'" . $b2 . "')";
		$this->bienketnoi->query($sql);
	}
	public function laysohoadonnhap()
	{
		$sq = "SELECT * FROM hoadonnhap GROUP BY id_hd DESC LIMIT 1 ";
		$this->ketqua = $this->bienketnoi->query($sq);
		if ($this->ketqua->num_rows == 0) {
			$data = 0;
		} else {
			while ($row = $this->ketqua->fetch_assoc()) {
				$data[] = $row;
			}
		}
		return $data;
	}
	public function adchitietnhap($b1, $b2, $b3, $b4)
	{
		$sql = "insert into cthoadonnhap(id_hd,id_sp,soluong,giatien) VALUES ('" . $b1 . "','" . $b2 . "','" . $b3 . "','" . $b4 . "')";
		$this->bienketnoi->query($sql);
	}

	// Lấy Sản Phẩm Theo Loại

	public function sanphamloai($key)
	{
		$sq = "SELECT * FROM sanpham WHERE id_loaisp = $key";
		$this->ketqua = $this->bienketnoi->query($sq);
		if ($this->ketqua->num_rows == 0) {
			$data = 0;
		} else {
			while ($row = $this->ketqua->fetch_assoc()) {
				$data[] = $row;
			}
		}
		return $data;
	}
	// Lấy Sản Phẩm còn hàng
	public function sanphamcon()
	{
		$sq = "SELECT * FROM sanpham WHERE soluong > 0";
		$this->ketqua = $this->bienketnoi->query($sq);
		if ($this->ketqua->num_rows == 0) {
			$data = 0;
		} else {
			while ($row = $this->ketqua->fetch_assoc()) {
				$data[] = $row;
			}
		}
		return $data;
	}
	//Phần Xóa
	public function Delete($sql, $key)
	{
		switch ($sql) {
			case 'khachhang': {
					$this->ketqua = $this->bienketnoi->query('DELETE FROM khachhang WHERE id_k = ' . $key . '');
					break;
				}
			case 'user': {
					$this->ketqua = $this->bienketnoi->query('DELETE FROM user WHERE id_user = ' . $key . '');
					break;
				}
			case 'nhanvien': {
					$this->ketqua = $this->bienketnoi->query('DELETE FROM nhanvien WHERE id_nv = ' . $key . '');
					$this->ketqua = $this->bienketnoi->query('DELETE FROM user WHERE id_nv = ' . $key . '');
					break;
				}
			case 'sanpham': {
					$this->ketqua = $this->bienketnoi->query('DELETE FROM sanpham WHERE id_sp = ' . $key . '');
					break;
				}
			case 'loaisanpham': {
					$this->ketqua = $this->bienketnoi->query('DELETE FROM loaisanpham WHERE id_loaisp = ' . $key . '');
					$this->ketqua = $this->bienketnoi->query('DELETE FROM sanpham WHERE id_loaisp = ' . $key . '');
					break;
				}
		}
	}
}
?>