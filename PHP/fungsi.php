<?php
$conn = mysqli_connect("localhost", "root", "", "tamu");


function querytodolist() {
    global $conn;
    $query = "SELECT * FROM todolist";
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


function tambahtodolist($data) {
    global $conn, $namaTabel;
   
    $todolist = htmlspecialchars($data["todolist"]);
    $iduser=htmlentities($data["id"]);

    $query = "INSERT INTO  todolist (id, todolist,id_user) VALUES ('', '$todolist','$iduser')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
function buatTabel($tabel) {
        global $conn;
        
        $nama = strtolower($tabel["nama"]);
        $pass = mysqli_real_escape_string($conn, $tabel["pass"]);
        $query_select = "SELECT * FROM user WHERE nama = '$nama'";
        $result = mysqli_query($conn, $query_select);
        if (mysqli_num_rows($result) > 0) {
            // Username sudah ada, berikan peringatan

            echo "
            <script>
                alert('selamat datang kembali');
                document.location.href = 'MAIN.php';
            </script>";
        } else {
            // Username belum ada, lakukan penyisipan data
            $query_insert = "INSERT INTO user (id, nama, password) VALUES ('', '$nama', '$pass')";

            mysqli_query($conn, $query_insert);
            echo "
        <script>
            alert('Data telah disimpan');
            document.location.href = 'MAIN.php';
        </script>";
    }
    mysqli_query($conn, $query_insert);
    $iduser = mysqli_insert_id($conn);
    $_SESSION['id_user'] = $iduser;
}


function hapus($id){
    global $conn;
    mysqli_query($conn,"DELETE FROM todolist WHERE id = $id");
    return  mysqli_affected_rows($conn);
}
?>