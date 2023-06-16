<div>
    <?php
    if (isset($_GET['trang'])) { //khi inset trang
        $page = $_GET['trang']; //đặt $page = $ i ở số trang
    } else {
        $page = 1;
    }
    if ($page == '' || $page == 1) {     // khi trang 1 hoặc ko có số trang thì begin = 0
        $begin = 0;
    } else {
        $begin = ($page * 4) - 4;
    }
    $price_condtion = '1=1';
    if (isset($_GET['giamin'])) {
        $price_condtion = 'giasp > ' . $_GET['giamin'] ;
    }
    if(isset($_GET['giamax'])){
        $price_condtion .= ' and giasp < ' . $_GET['giamax'];
    }
    $sql_pro = "SELECT * FROM tbl_sanpham WHERE tbl_sanpham.id_danhmuc = '$_GET[id]' AND tinhtrang=1 AND $price_condtion ORDER BY id_sanpham DESC LIMIT $begin,4"; //lấy tất cả sản phẩm dựa vào id 
    $query_pro = mysqli_query($mysqli, $sql_pro);
    //get ten danh muc
    $sql_cate = "SELECT * FROM tbl_danhmuc WHERE tbl_danhmuc.id_danhmuc = '$_GET[id]' LIMIT 1";
    $query_cate = mysqli_query($mysqli, $sql_cate);
    $row_title = mysqli_fetch_array($query_cate);
    function getSortPath($price_min,$price_max){
        $path = "index.php?quanly=danhmuc";
        if(isset($_GET['id'])){
            $path .= "&id=".$_GET['id'];
        }
        if(isset($_GET['trang'])){
            $path .= "&trang=".$_GET['trang'];
        }
        if($price_min>-1){
            $path .='&giamin='.$price_min;
        }
        if($price_max>-1){
            $path .='&giamax='.$price_max;
        }
        echo $path;
    }
    ?>
    <div class="headline">
        <h3><?php echo $row_title['tendanhmuc'] ?></h3>
    </div>
    <div class="home-sort">
        <span class="filter-sort">Trang: <?php echo $page ?></span>
    </div>
    <div class="home-sort">
        <ul>
            <li>
                <a href="<?php getSortPath(0,1000000)?>" class="price-sort">Giá < 1000000</a>
            </li>
            <li>
                <a href="<?php getSortPath(1000000,5000000)?>" class="price-sort">Giá > 1000000 và < 5000000</a>
            </li>
            <li>
                <a href="<?php getSortPath(5000000,10000000)?>" class="price-sort">Giá > 5000000 và < 10000000</a>
            </li>
            <li>
                <a href="<?php getSortPath(10000000,-1)?>" class="price-sort"> Giá > 10.000.000</a>
            </li>
        </ul>
    </div>
</div>
<div class="maincontent">

    <?php
    $giaspkm = 0;
    while ($query_pro&&$row_pro = mysqli_fetch_array($query_pro)) {
        if ($row_pro['km'] > 0) {
            $giaspkm = $row_pro['giasp'] - ($row_pro['giasp'] * ($row_pro['km'] / 100));
        };
    ?>
        <ul>
            <div class="maincontent-item">
                <div class="maincontent-top">
                    <?php
                    if ($row_pro['km'] == 0) {
                    } else {
                    ?>
                        <div class="khuyenmai"><?php echo number_format($row_pro['km']) . '%' ?></div>
                    <?php
                    }
                    ?>
                    <div class="maiconten-top1">

                        <a href="index.php?quanly=chitiet&idsanpham=<?php echo $row_pro['id_sanpham'] ?>" class="maincontent-img">
                            <img src="./admin/modules/quanlysp/uploads/<?php echo $row_pro['hinhanh'] ?>">
                        </a>
                        <button type="submit" title='chi tiet' class="muangay" name="chitiet"><a href="index.php?quanly=chitiet&idsanpham=<?php echo $row_pro['id_sanpham'] ?>">Chi tiết</a></button>
                        <form method="POST" action="./pages/main/themgiohang.php?idsanpham=<?php echo $row_pro['id_sanpham'] ?>">
                            <button type="submit" title='thêm vào giỏ' name="themgiohang" class="giohang"><a>thêm vào giỏ</a></button>
                        </form>
                    </div>
                </div>
                <div class="maincontent-info">
                    <a href="index.php?quanly=sanpham&id=<?php echo $row_pro['id_sanpham'] ?>" class="maincontent-name"><?php echo $row_pro['tensanpham'] ?></a>
                    <a href="index.php?quanly=sanpham&id=<?php echo $row_pro['id_sanpham'] ?>" class="maincontent-gia"><?php if ($row_pro['km'] > 0) {
                                                                                                                            echo number_format($giaspkm) . 'vnd';
                                                                                                                        } else {
                                                                                                                            echo number_format($row_pro['giasp']) . 'vnd';
                                                                                                                        } ?>
                        <span><?php if ($row_pro['km'] > 0) {
                                    echo number_format($row_pro['giasp']) . 'vnd';
                                } else {
                                }
                                ?>
                        </span></a>
                </div>
            </div>

        </ul>
    <?php
    }
    ?>

</div>
<div class="content-paging">
    <?php
    $sql_trang = mysqli_query($mysqli, "SELECT * FROM tbl_sanpham WHERE tbl_sanpham.id_danhmuc = '$_GET[id]'");
    $row_count = mysqli_num_rows($sql_trang);
    $trang = ceil($row_count / 4);
    ?>
    <div class="filter-page">
        <?php
        for ($i = 1; $i <= $trang; $i++) {
        ?>
            <a <?php if ($i == $page) {
                    echo 'style="color: red;background-color: #ccc;"';
                } else {
                    '';
                } ?> href="index.php?quanly=danhmuc&id=<?php echo $_GET['id'] ?>&trang=<?php echo $i ?>
                <?php if(isset($_GET['giamin']))echo '&giamin='.$_GET['giamin'].(isset($_GET['giamax']))?'&giamax='.$_GET['giamax']:'';?>" 
                class="filter-page-number"><?php echo $i ?></a>
        <?php
        }
        ?>
    </div>
</div>