<?php
include "inc/admin/header.php";

$admin = new admin;
?>

<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-flex justify-content-between align-items-center">
                        <h1 class="h3 mb-4 text-gray-800">Daftar Mutasi</h1>
                    </div>  

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>user</th>
                                            <th>lapangan</th>
                                            <th>tanggal</th>
                                            <th>jam</th>
                                            <th>status</th>
                                            <th>aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <?php foreach($admin->get_transaksi() as $row) : ?>
                                                <tr>
                                                    <td><?php echo $row['id']; ?></td>
                                                    <td><?php echo $row['user_id']; ?></td>
                                                    <td><?php echo $row['lapangan_id']; ?></td>
                                                    <td><?php echo $row['tanggal']; ?></td>
                                                    <td><?php echo $row['jam']; ?></td>
                                                    <td><?php echo $row['status']; ?></td>
                                                    <td>
                                                        <a href="index.php?action=hapus&id=<?php echo $row['id'];?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                            <?php
                                                if(isset($_GET['action']) == 'hapus' && isset($_GET['id'])) 
                                                    {   
                                                        $id = $_GET['id'];
                                                        $admin->delete_transaksi($id);                            
                                                    }
                                            ?>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

<?php
include "inc/admin/footer.php";
?>
