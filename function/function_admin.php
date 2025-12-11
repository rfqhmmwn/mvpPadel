<?php
include("../inc/config.php");
class admin
{
    function get_transaksi() {
        global $db;
        $query = $db->query("SELECT * FROM `transaksi`");
        $transaksi = [];
        while ($row = $query->fetch_object()) {
            $transaksi[] = $row;
        }
        return $transaksi;
    }

    function getTransaksiById($id) {
        global $db;
        $query = $db->query("SELECT * FROM `transaksi` WHERE id='$id'");
        return $query->fetch_object();
    }

    function delete_transaksi($id) {
        global $db;
        $check_exist_transaksi = $this->getTransaksiById($id);
        if ($check_exist_transaksi === null) {
            return false;
        } else {
            $query = "DELETE FROM `transaksi` WHERE id='$id'";
            return $db->query($query);
        }
    }

    function processDeleteTransaksi() {
        if (isset($_GET['action']) && $_GET['action'] == 'hapus' && isset($_GET['id'])) {
            $id = $_GET['id'];
            if ($this->delete_transaksi($id)) {
                $_SESSION['message'] = "Data berhasil dihapus!";
                echo '<script>window.location.href = "transaksi.php"</script>';
                exit; 
            }
        }
    }

    function register($username, $password) {
        global $db;
        $query = "INSERT INTO `users` (id, user, password, role) VALUES (null, '$username', '$password', 'user')";
        return $db->query($query);
    }

    function processRegister() {
        if (isset($_POST['submit'])) {
            $get_username = $_POST['username'];
            $get_password = $_POST['password'];

            if($this->register($get_username, $get_password)) {
                $_SESSION['message'] = "Registrasi berhasil!";
                echo '<script>window.location.href = "login.php"</script>';
                exit;
            }
        }
    }

    function set_response($data, $code = 200)
    {
        http_response_code($code);
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json; charset=utf-8');
        return json_encode($data);
    }
}
?>
