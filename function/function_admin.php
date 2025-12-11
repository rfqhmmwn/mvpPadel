<?php
class admin
{
    function get_transaksi() {
        global $db;
        $query = $db->query("SELECT * FROM `transaksi`");
        return $query->fetch_all(MYSQLI_ASSOC);
    }


    function delete_transaksi($id) {
        global $db;
        $query = "DELETE FROM `groups` WHERE id = $id";
        $db->query($query);

        echo '<script>window.location.href = "groups.php"</script>';
    }

    function register($username, $password) {
        global $db;
        $query = "INSERT INTO `users` (id, user, password, role) VALUES (null, '$username', '$password', 'user')";
        $result = $db->query($query);

        echo '<script>window.location.href = "login.php"</script>';
    }
}
?>