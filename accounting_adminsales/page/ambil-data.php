<?php
include "koneksi.php";
if (isset($_POST['customer'])) {
    $customer = $_POST["customer"];

    $sql = "select * from h_fg where id_cust=$customer";

    $hasil = mysqli_query($kon, $sql);
    $no = 0;
    while ($data = mysqli_fetch_array($hasil)) {
        ?>
        <option value="<?php echo  $data['id_prod']; ?>"><?php echo $data['nm_fg']; ?></option>
        <?php
    }
}
if (isset($_POST['h_fg'])) {
    $h_fg = $_POST["h_fg"];

    $sql = "select * from h_price where id_prod=$h_fg";

    $hasil = mysqli_query($kon, $sql);
    $no = 0;
    while ($data = mysqli_fetch_array($hasil)) {
        ?>
        <option><?php echo $data['price']; ?></option>
        <?php
    }
}

?>