<?php
session_start();
require     '../function/function_admin.php';
$admin = new admin();

$get_method = $_SERVER['REQUEST_METHOD'];

switch ($get_method)
{
    case 'GET':

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $transaksi = $admin->getTransaksiById($id);

            if ($transaksi === null) {
                $create_response = array(
                    'status' => false,
                    'message' => 'Data transaksi tidak ditemukan',
                    'data' => null
                );
                echo $admin->set_response($create_response, 404);
                break;
            }

            $create_response = array(
                'status' => true,
                'message' => '',
                'data' => $transaksi
            );
            echo $admin->set_response($create_response, 200);
            break;

        } else {
            $create_response = array(
                'status' => true,
                'message' => '',
                'data' => $admin->get_transaksi()
            );
            echo $admin->set_response($create_response, 200);
            break;
        }

    case 'POST':

        $get_id = $_POST['id'];
        $deleteTransaksi = $admin->delete_transaksi($get_id);

        if ($deleteTransaksi == false) 
        {
            $create_response = array(
                'status'=> false,
                'message' => 'Data transaksi can not deleted'
            );
            $http_code = 400;
        }
        else
        {
            $create_response = array(
                'status'=> true,
                'message' => 'Data transaksi delete successfully'
            );
            $http_code = 200;
        }

        echo $admin->set_response($create_response, $http_code);
        break;

    default:

        $create_response = array(
            'status'=> false,
            'message'=> 'Method not allowed!',
        );

        echo $admin->set_response($create_response, 404);
        break;
}
?>