<?php

class Cart
{
	private $cart = array();
	//membuat construct function
    public function __construct()
    {
      $this->cart = array();
    }
	
	//menampilkan isi cart
	public function tampilkanCart() {
		if(empty($this->cart)){
			echo "Belum ada barang di cart";
		}else{
			foreach($this->cart as $ct){
				echo ucfirst($ct[0]) . " (" . $ct[1] . ") <br>" ;
			}
		}
    }
	//menambahkan isi cart
	public function tambahProduk(string $product, int $jumlah) {
		$done = false;
		foreach($this->cart as $ct){
			if(in_array($product, $ct)){
				$ct[1] += $jumlah;
				$done = true;
			}
		}
		if(!$done){
			$arr = array($product, $jumlah);
			array_push($this->cart, $arr);
			//echo '<pre>' . var_export($this->cart, true) . '</pre>';
		}
    }
	//menambahkan isi cart
	public function hapusProduk(string $product) {
		$done = false;
		foreach($this->cart as $del_key => $ct){
			if(in_array($product, $ct)){
				//echo '<pre>' . var_export($this->cart, true) . '</pre>';

				unset($this->cart[$del_key]);
				$done = true;
				//echo '<pre>' . var_export($this->cart, true) . '</pre>';
			}
		}
		if(!$done){
			echo "Item tidak ditemukan.";
		}
    }
}

echo "Selamat datang di Indoapril <br>";
echo "Selamat belanja <br>";
echo "----------------------------<br><br>";

echo "Membuat keranjang belanja baru<br>";
$keranjang = new Cart();

echo "----------------------------<br>";
echo "Menambahkan 20 apel<br>";
$keranjang->tambahProduk("apel", 20);

echo "----------------------------<br>";
echo "Menambahkan 10 apel<br>";
$keranjang->tambahProduk("apel", 10);

echo "----------------------------<br>";
echo "Menambahkan 20 pisang<br>";
$keranjang->tambahProduk("pisang", 20);

echo "----------------------------<br>";
echo "Menambahkan 20 pisang<br>";
$keranjang->tambahProduk("pisang", 20);

echo "----------------------------<br>";
echo "Menambahkan 5 pepaya<br>";
$keranjang->tambahProduk("pepaya", 5);

echo "----------------------------<br>";
echo "Menghapus pisang<br>";
$keranjang->hapusProduk("pisang");

echo "----------------------------<br>";
echo "Isi keranjang: <br>";
$keranjang->tampilkanCart();

?>