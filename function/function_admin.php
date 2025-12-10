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
}
?>