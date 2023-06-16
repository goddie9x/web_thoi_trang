<?php
$sql_lietke_lienhe = "SELECT * FROM tbl_lienhe ORDER BY thutu ASC"; 
$query_lietke_lienhe = mysqli_query($mysqli, $sql_lietke_lienhe);  

?>
<style>
table {

    border-collapse: collapse;

}

td,
th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
<div class="quanlymenu">
    <h3>Liệt kê liên hệ </h3>

    <table class='lietke_menu' style="    margin-left: 30%;">
        <tr class="header_lietke">
            <td>ID</td>
            <td class="them_menu2" style="width: 300px;">Liên hệ</td>
            <td class="them_menu4">Quản lý</td>
        </tr>
        <?php
        $i = 0;
        while ($row = mysqli_fetch_array($query_lietke_lienhe)) {
            $i++;
            //gán tất cả dữ liệu vào $row và i tăng dần
        ?>
        <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $row['lienhe'] ?></td>
            <td>

                <a href="./modules/quanlylienhe/xuly.php?idlienhe=<?php echo $row['id_lienhe'] ?>"><button
                        class="btn1 ">Xóa</button> </a>
                <a href="index.php?action=quanlylienhe&query=sua&idlienhe=<?php echo $row['id_lienhe'] ?>"><button
                        class="btn1 ">Sửa</button> </a>

            </td>
        </tr>
        <?php
        }
        ?>
        </form>
    </table>
</div>