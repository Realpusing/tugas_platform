<?php
session_start();
 
// koneksi ke database
$conn = mysqli_connect("localhost", "username", "password", "database");
 
// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];
 
// mengambil data dari database berdasarkan username
$result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
 
// memeriksa apakah username dan password sudah benar
if(mysqli_num_rows($result) === 1){
    $row = mysqli_fetch_assoc($result);
    if(password_verify($password, $row['password'])){
        // menyimpan data user ke dalam session
        $_SESSION['username'] = $row['username'];
        $_SESSION['level'] = $row['level'];
 
        // mengarahkan user ke halaman dashboard
        header("Location: dashboard.php");
        exit;
    }
}
 
// jika username atau password salah, maka kembali ke halaman login
header("Location: login.php");
exit;
?>

<?php
session_start();
 
// memeriksa apakah user sudah login
if(!isset($_SESSION['username'])){
    header("Location: login.php");
    exit;
}
 
// menampilkan halaman dashboard
echo "Selamat datang, ".$_SESSION['username']."!";
?>
