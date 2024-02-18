<?php
session_start();
require_once 'Model/BaseModel.php';
/**
 * 
 */
class HomeControl
{
	public $Base;
	function __construct()
	{
		$this->Base = new BaseModel();
	}
	public function Dieuhuong()
	{
		$loaisanpham = $this->Base->data('loaisanpham');
		$nhanvien = $this->Base->data('nhanvien');
		$sanpham = $this->Base->data('sanpham');
		$khachhang = $this->Base->data('khachhang');
		$hoadonban = $this->Base->data('hoadonban');
		$chitietban = $this->Base->data('cthoadonban');
		$hoadonnhap = $this->Base->data('hoadonnhap');
		$chitietnhap = $this->Base->data('cthoadonnhap');
		$user = $this->Base->data('user');
		if (isset($_GET['muc'])) {

			switch ($_GET['muc']) {
					//****QL BÁN HÀNG
				case 'banhang': {
						//TK HÓA ĐƠN BÁN THEO NGÀY - THÁNG - NĂM
						if (isset($_POST['ngay'])) {
							$hoadonban = $this->Base->hoadonbanday('ban');
						}
						if (isset($_POST['thang'])) {
							$hoadonban = $this->Base->hoadonbanmonth('ban');
						}
						if (isset($_POST['nam'])) {
							$hoadonban = $this->Base->hoadonbanyear('ban');
						}
						if (isset($_GET['them'])) {
							$sanpham = $this->Base->sanphamcon();
						}
						//THÊM SP TRONG HÓA ĐƠN BÁN
						if (isset($_POST['them'])) {
							$id = $_POST['id_sp'];
							$tensp = $_POST['tensp'];
							$donvi = $_POST['donvi'];
							$check = $this->Base->checkgio($id);
							if (isset($_SESSION['cart'])) {
								if (isset($_SESSION['cart'][$id]) && isset($_SESSION['cartnhap'][$donvi])) {
									if ($_SESSION['cart'][$id]['sl'] >= $check[0]['soluong']) {
?>
										<script>
											alert("Kho Chỉ Còn <?php echo $check[0]['soluong']; ?> Sản Phẩm ");
										</script>
								<?php
									} else {
										$_SESSION['cart'][$id]['sl'] += 1;
									}
								} else {
									$_SESSION['cart'][$id]['sl'] = 1;
									$_SESSION['cart'][$id]['tensp'] = $tensp;
									$_SESSION['cart'][$id]['donvi'] = $donvi;
									$_SESSION['cart'][$id]['gia'] = $check[0]['giaban'];
								}
							} else {
								$_SESSION['cart'][$id]['sl'] = 1;
								$_SESSION['cart'][$id]['tensp'] = $tensp;
								$_SESSION['cart'][$id]['donvi'] = $donvi;
								$_SESSION['cart'][$id]['gia'] = $check[0]['giaban'];
							}
						}
						//XÓA SP TRONG HÓA ĐƠN
						if (isset($_POST['xoa'])) {
							$id = $_POST['id'];
							unset($_SESSION['cart'][$id]);
						}
						//SỬA SP TRONG HÓA ĐƠN
						if (isset($_POST['sua'])) {
							$id = $_POST['id'];
							$sl = $_POST['sl'];
							$check = $this->Base->checkgio($id);
							$_SESSION['cart'][$id]['sl'] = $sl;
							if ($_SESSION['cart'][$id]['sl'] > $check[0]['soluong']) {
								$_SESSION['cart'][$id]['sl'] = $check[0]['soluong'];
								?>
								<script>
									alert("Kho Chỉ Còn <?php echo $check[0]['soluong']; ?> Sản Phẩm ");
								</script>
								<?php
							}
						}
						//THÊM HÓA ĐƠN BÁN
						if (isset($_POST['adhang'])) {
							//kiểm tra đã có giỏ hàng chưa
							if (isset($_SESSION['cart'])) {
								$id_nv = $_SESSION['nhanvien'][0]['id_nv'];
								$tien = $_POST['tien'];
								$id_k = $_POST['id_k'];
								$dem = 0;
								foreach ($_SESSION['cart'] as $key) {
									$dem++;
								}
								if ($dem != 0) {
									$this->Base->addban($id_nv, $id_k, $tien);
									$shd = $this->Base->laysohoadon();
									foreach ($_SESSION['cart'] as $key => $va) {
										$this->Base->adchitietban($shd[0]['id_hd'], $key, $va['sl'], $va['gia']);
										$this->Base->updatesl(1, $va['sl'], $key);
									}
									unset($_SESSION['cart']);
									header('location: index.php?muc=banhang');
								} else {
								?>
									<script type="text/javascript">
										alert('Vui Lòng Chọn Sản Phẩm');
									</script>
								<?php
								}
							} else {
								?>
								<script type="text/javascript">
									alert('Vui Lòng Chọn Sản Phẩm');
								</script>
								<?php
							}
						}
						if (isset($_POST['back'])) {
							header('location:?muc=banhang');
						}
						break;
					}
				case 'nhaphang': {
						//TK HÓA ĐƠN NHẬP THEO NGÀY - THÁNG - NĂM
						if (isset($_POST['ngay'])) {
							$hoadonnhap = $this->Base->hoadonbanday('nhap');
						}
						if (isset($_POST['thang'])) {
							$hoadonnhap = $this->Base->hoadonbanmonth('nhap');
						}
						if (isset($_POST['nam'])) {
							$hoadonnhap = $this->Base->hoadonbanyear('nhap');
						}
						//THÊM SP TRONG HÓA ĐƠN NHẬP
						if (isset($_POST['them'])) {
							$id = $_POST['id_sp'];
							$tensp = $_POST['tensp'];
							$donvi = $_POST['donvi'];
							$check = $this->Base->checkgio($id);
						
							// Kiểm tra xem giỏ hàng có tồn tại không
							if (isset($_SESSION['cartnhap'])) {
								// Kiểm tra xem sản phẩm với ID tương ứng đã tồn tại trong giỏ hàng hay chưa
								if (isset($_SESSION['cartnhap'][$id])) {
									// Kiểm tra nếu cùng loại đơn vị, thì tăng số lượng lên 1
									if ($_SESSION['cartnhap'][$id]['donvi'] == $donvi) {
										$_SESSION['cartnhap'][$id]['sl'] += 1;
									} else {
										echo("vao day r");
										// Nếu không cùng loại đơn vị, thêm mới vào giỏ hàng
										$_SESSION['cartnhap'][$id+1]['sl'] = 1;
										$_SESSION['cartnhap'][$id+1]['tensp'] = $tensp;
										$_SESSION['cartnhap'][$id+1]['donvi'] = $donvi;
										$_SESSION['cartnhap'][$id+1]['gia'] = $check[0]['gianhap'];
									}
								} else {
									// Nếu sản phẩm không tồn tại trong giỏ hàng, thêm mới vào giỏ hàng
									$_SESSION['cartnhap'][$id]['sl'] = 1;
									$_SESSION['cartnhap'][$id]['tensp'] = $tensp;
									$_SESSION['cartnhap'][$id]['donvi'] = $donvi;
									$_SESSION['cartnhap'][$id]['gia'] = $check[0]['gianhap'];
								}
							} else {
								// Nếu giỏ hàng không tồn tại, thêm mới vào giỏ hàng
								$_SESSION['cartnhap'][$id]['sl'] = 1;
								$_SESSION['cartnhap'][$id]['tensp'] = $tensp;
								$_SESSION['cartnhap'][$id]['donvi'] = $donvi;
								$_SESSION['cartnhap'][$id]['gia'] = $check[0]['gianhap'];
							}
						}
						//XÓA SP TRONG HÓA ĐƠN NHẬP
						if (isset($_POST['xoa'])) {
							$id = $_POST['id'];
							unset($_SESSION['cartnhap'][$id]);
						}
						//SỬA SP TRONG HÓA ĐƠN NHẬP
						if (isset($_POST['sua'])) {
							$id = $_POST['id'];
							$sl = $_POST['sl'];
							$_SESSION['cartnhap'][$id]['sl'] = $sl;

						}
						//THÊM HÓA ĐƠN NHẬP
						if (isset($_POST['adhang'])) {
							if (isset($_SESSION['cartnhap'])) {
								$id_nv = $_SESSION['nhanvien'][0]['id_nv'];
								$tien = $_POST['tien'];
								$dem = 0;
								foreach ($_SESSION['cartnhap'] as $key) {
									$dem++;
								}
								if ($dem != 0) {
									$this->Base->addnhap($id_nv, $tien);
									$shd = $this->Base->laysohoadonnhap();
									foreach ($_SESSION['cartnhap'] as $key => $va) {
										$this->Base->adchitietnhap($shd[0]['id_hd'], $key, $va['sl'], $va['gia']);
										$this->Base->updatesl(2, $va['sl'], $key);
									}
									unset($_SESSION['cartnhap']);
									header('location: index.php?muc=nhaphang');
								} else {
								?>
									<script type="text/javascript">
										alert("Vui lòng chọn sản phẩm!");
									</script>
								<?php
								}
							} else {
								?>
								<script type="text/javascript">
									alert("Vui lòng chọn sản phẩm!");
								</script>
<?php
							}
						}
						if (isset($_POST['back'])) {
							header('location:?muc=nhaphang');
						}
						break;
					}
					//**QL SẢN PHẨM
				case 'sanpham': {
						//XÓA SP
						if (isset($_GET['idxoa'])) {
							$this->Base->Delete('sanpham', $_GET['idxoa']);
							header('location:?muc=sanpham');
						}
						//SỬA SP (YC GIÁ BÁN > GIÁ NHẬP)
						if (isset($_POST['sua'])) {
							$id = $_POST['id_sp'];
							$ten = $_POST['tensp'];
							$loai = $_POST['id_loaisp'];
							$gia = $_POST['giaban'];
							$gia1 = $_POST['gianhap'];
							$sl = $_POST['soluong'];
							$ha = $_POST['hinhanh'];
							$mt = $_POST['mota'];
							if ($ha == '') {
								$ha = $_POST['ha'];
							}
							if ($gia > $gia1) {
								$this->Base->editsanpham($id, $ten, $loai, $gia, $gia1, $sl, $ha, $mt);
							}
							header('location:?muc=sanpham');
						}
						//THÊM SP (YC GIÁ BÁN > GIÁ NHẬP (JS TRONG sanpham.php))
						if (isset($_POST['login'])) {
							$ten = $_POST['tensp'];
							$loai = $_POST['id_loaisp'];
							$gia = $_POST['giaban'];
							$gia1 = $_POST['gianhap'];
							$sl = 0;
							$ha = $_POST['hinhanh'];
							$mt = $_POST['mota'];
							$donvi = $_POST['donvi'];
							$this->Base->addsanpham($ten, $loai, $gia, $gia1, $sl, $ha, $mt, $donvi);
							header('location:?muc=sanpham');
						}
						break;
					}
					//***QL NHÂN VIÊN
				case 'nhanvien': {
						//XÓA NV
						if (isset($_GET['idxoa'])) {
							$this->Base->Delete('nhanvien', $_GET['idxoa']);
							header('location:?muc=nhanvien');
						}
						//SỬA NV
						if (isset($_POST['sua'])) {
							$id = $_POST['id_nv'];
							$ten = $_POST['tennv'];
							$gt = $_POST['gioitinh'];
							$ns = $_POST['ngaysinh'];
							$dc = $_POST['diachi'];
							$sdt = $_POST['sdt'];
							$ha = $_POST['hinhanh'];
							$ngay = $_POST['ngaygianhap'];
							if ($ha == '') {
								$ha = $_POST['ha'];
							}
							$this->Base->editnhanvien($id, $ten, $gt, $ns, $dc, $sdt, $ha, $ngay);
							header('location:?muc=nhanvien');
						}
						//THÊM NV
						if (isset($_POST['login'])) {
							$ten = $_POST['tennv'];
							$gt = $_POST['gioitinh'];
							$ns = $_POST['ngaysinh'];
							$dc = $_POST['diachi'];
							$sdt = $_POST['sdt'];
							$ha = $_POST['hinhanh'];
							if ($ten != '') {
								$this->Base->addnhanvien($ten, $gt, $ns, $dc, $sdt, $ha, $ngay);
								header('location:?muc=nhanvien');
							}
						}
						break;
					}
					//***QL LOẠI SẢN PHẨM
				case 'loaisanpham': {
						//XÓA LSP
						if (isset($_GET['idxoa'])) {
							$this->Base->Delete('loaisanpham', $_GET['idxoa']);
							header('location:?muc=loaisanpham');
						}
						//SỬA LSP
						if (isset($_POST['sua'])) {
							$id = $_POST['id_loaisp'];
							$ten = $_POST['tenloaisp'];
							$this->Base->editloai($id, $ten);
							header('location:?muc=loaisanpham');
						}
						//THÊM LSP
						if (isset($_POST['login'])) {
							$ten = $_POST['tenloaisp'];
							$this->Base->addloai($ten);
							header('location:?muc=loaisanpham');
						}
						break;
					}
					//***QL KHÁCH HÀNG
				case 'khachhang': {
						//XÓA KH
						if (isset($_GET['idxoa'])) {
							$this->Base->Delete('khachhang', $_GET['idxoa']);
							header('location:?muc=khachhang');
						}
						//SỬA KH
						if (isset($_POST['sua'])) {
							$id = $_POST['id_k'];
							$ten = $_POST['tenk'];
							$gt = $_POST['gioitinh'];
							$sdt = $_POST['sdt'];
							$ngay = $_POST['ngaythem'];
							$this->Base->editkhach($id, $ten, $gt, $sdt, $ngay);
							header('location:?muc=khachhang');
						}
						//THÊM KH
						if (isset($_POST['login'])) {
							$ten = $_POST['tenk'];
							$gt = $_POST['gioitinh'];
							$sdt = $_POST['sdt'];
							$ngay = $_POST['ngaythem'];
							if ($ten != '') {
								$this->Base->addkhach($ten, $gt, $sdt, $ngay);
								header('location:?muc=khachhang');
							}
						}
						break;
					}
					//***QL USER
				case 'user': {

						$kt = $this->Base->checkadduser();
						//XÓA USER
						if (isset($_GET['idxoa'])) {
							$this->Base->Delete('user', $_GET['idxoa']);
							header('location:?muc=user');
						}
						//SỬA USER
						if (isset($_POST['sua'])) {
							$id = $_POST['id'];
							$tk = $_POST['taikhoan'];
							$mk = $_POST['matkhau'];
							$idnv = $_POST['id_nv'];
							$lv = $_POST['level'];
							$this->Base->edituser($id, $tk, $mk, $idnv, $lv);
							header('location:?muc=user');
						}
						//THÊM USER
						if (isset($_POST['login'])) {
							$tk = $_POST['taikhoan'];
							$mk = md5($_POST['matkhau']);
							$idnv = $_POST['id_nv'];
							$lv = $_POST['level'];
							if ($tk != '' && $mk != '') {
								$this->Base->adduser($tk, $mk, $idnv, $lv);
								header('location:?muc=user');
							}
						}
						break;
					}
					//***QL TÀI KHOẢN VÀ CÁ NHÂN
				case 'taikhoan': {
						//SỬA TT CÁ NHÂN
						if (isset($_SESSION['nhanvien'])) {
							if (isset($_POST['sua'])) {
								$id = $_SESSION['nhanvien'][0]['id_nv'];
								$ten = $_POST['tennv'];
								$gt = $_POST['gioitinh'];
								$ns = $_POST['ngaysinh'];
								$dc = $_POST['diachi'];
								$sdt = $_POST['sdt'];
								$ha = $_POST['hinhanh'];
								$ngay = $_POST['ngaygianhap'];
								if ($ha == '') {
									$ha = $_POST['ha'];
								}
								$this->Base->editnhanvien($id, $ten, $gt, $ns, $dc, $sdt, $ha, $ngay);
								unset($_SESSION['nhanvien']);
								$_SESSION['nhanvien'] = $this->Base->nhanviengetid($id);
							}
							//SỬA TÀI KHOẢN CÁ NHÂN
							if (isset($_POST['login'])) {
								$id = $_SESSION['id'];
								$tk = $_POST['taikhoan'];
								$mk = $_POST['matkhau'];
								$idnv = $_SESSION['nhanvien'][0]['id_nv'];
								$lv = $_SESSION['level'];
								$this->Base->edituser($id, $tk, $mk, $idnv, $lv);
								$_SESSION['tk'] = $tk;
								$_SESSION['mk'] = $mk;
								session_unset();
								header('location: index.php');
							}
						}

						break;
					}
					//***TK DOANH THU
				case 'doanhthu': {
						switch ($_GET['loai']) {
							case 'chung': {
									if (isset($_POST['lockho'])) {
										$ky = $_POST['id_k'];
										$hoadonban = $this->Base->hoadonnv($ky);
									}
									if (isset($_POST['ngay'])) {
										$hoadonban = $this->Base->hoadonbanday('ban');
									}
									if (isset($_POST['thang'])) {
										$hoadonban = $this->Base->hoadonbanmonth('ban');
									}
									if (isset($_POST['nam'])) {
										$hoadonban = $this->Base->hoadonbanyear('ban');
									}
									break;
								}
							case 'nhap': {
									if (isset($_POST['lockho'])) {
										$ky = $_POST['id_k'];
										$hoadonnhap = $this->Base->hoadonnhapnv($ky);
									}
									if (isset($_POST['ngay'])) {
										$hoadonnhap = $this->Base->hoadonbanday('nhap');
									}
									if (isset($_POST['thang'])) {
										$hoadonnhap = $this->Base->hoadonbanmonth('nhap');
									}
									if (isset($_POST['nam'])) {
										$hoadonnhap = $this->Base->hoadonbanyear('nhap');
									}
									break;
								}
							case 'kho': {
									if (isset($_POST['lockho'])) {
										$ky = $_POST['id_loaisp'];
										$sanpham = $this->Base->sanphamloai($ky);
									}
									break;
								}
						}
						require_once 'View/index.php';
						break;
					}
			}
		}
		if (isset($_POST['ok'])) {
			$tk = $_POST['tk'];
			$mk = $_POST['mk'];
			$dem = $this->Base->dem($tk, $mk);
			if ($dem != 0) {
				$nhanvienid = $this->Base->nhanviengetid($dem[0]['id_nv']);
				$_SESSION['nhanvien'] = $nhanvienid;
				$_SESSION['tk'] = $tk;
				$_SESSION['id'] = $dem[0]['id_user'];
				$_SESSION['mk'] = $mk;
				$_SESSION['level'] = $dem[0]['level'];
				require_once 'View/index.php';
			} else {
				echo "Sai user hoặc password. Vui lòng nhập lại";
			}
		}
		if (isset($_POST['dangxuat'])) {
			session_unset();
			header('location: index.php');
		}
		require_once 'View/index.php';
	}
}
?>