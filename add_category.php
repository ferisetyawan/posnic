<?php
include_once("init.php");

?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>POSNIC - Tambah Kategori Stok</title>

    <!-- Stylesheets -->

    <link rel="stylesheet" href="css/style.css">

    <!-- Optimize for mobile devices -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <!-- jQuery & JS files -->
    <?php include_once("tpl/common_js.php"); ?>
    <script src="js/script.js"></script>
    <script>
        /*$.validator.setDefaults({
         submitHandler: function() { alert("submitted!"); }
         });*/
        $(document).ready(function () {

            // validate signup form on keyup and submit
            $("#form1").validate({
                rules: {
                    name: {
                        required: true,
                        minlength: 3,
                        maxlength: 200
                    },
                    address: {
                        minlength: 3,
                        maxlength: 500
                    }
                },
                messages: {
                    name: {
                        required: "Silahkan Masukkan Nama Kategori",
                        minlength: "Kategori Nama harus terdiri dari minimal 3 karakter"
                    },
                    address: {
                        minlength: "Deskripsi Kategori harus minimal 3 karakter",
                        maxlength: "Deskripsi Kategori harus minimal 3 karakter"
                    }
                }
            });

        });

    </script>

</head>
<body>

<!-- TOP BAR -->
<?php include_once("tpl/top_bar.php"); ?>
<!-- end top-bar -->


<!-- HEADER -->
<?php include "menu-tab.php"; ?>

<!-- MAIN CONTENT -->
<div id="content">

    <div class="page-full-width cf">

        <div class="side-menu fl">

            <h3>Supplier Management</h3>
            <ul>
                <li><a href="add_stock.php">Tambah Stok/Produk</a></li>
                <li><a href="view_product.php">Tampil Stok/Produk</a></li>
                <li><a href="add_category.php">Tambah Kategori Stok</a></li>
                <li><a href="view_category.php">Tampil Kategori Stok</a></li>
            </ul>

        </div>
        <!-- end side-menu -->

        <div class="side-content fr">

            <div class="content-module">

                <div class="content-module-heading cf">

                    <h3 class="fl">Tambah Kategori Stok</h3>
                    <span class="fr expand-collapse-text">Klik untuk menutup</span>
                    <span class="fr expand-collapse-text initial-expand">Klik untuk membuka</span>

                </div>
                <!-- end content-module-heading -->

                <div class="content-module-main cf">


                    <?php
                    //Gump is libarary for Validatoin

                    if (isset($_POST['name'])) {
                        $_POST = $gump->sanitize($_POST);
                        $gump->validation_rules(array(
                            'name' => 'required|max_len,100|min_len,3',
                            'address' => 'max_len,200',

                        ));

                        $gump->filter_rules(array(
                            'name' => 'trim|sanitize_string|mysqli_escape',
                            'address' => 'trim|sanitize_string|mysqli_escape',

                        ));

                        $validated_data = $gump->run($_POST);
                        $name = "";
                        $address = "";


                        if ($validated_data === false) {
                            echo $gump->get_readable_errors(true);
                        } else {


                            $name = mysqli_real_escape_string($db->connection, $_POST['name']);
                            $address = mysqli_real_escape_string($db->connection, $_POST['address']);


                            $count = $db->countOf("category_details", "category_name='$name'");
                            if ($count == 1) {
                                echo "<font color=red>Data duplikat. Silahkan Verifikasi</font>";
                            } else {

                                if ($db->query("insert into category_details values(NULL,'$name','$address')"))
                                    echo "<br><font color=green size=+1 > [ $name ] Rincian Kategori Ditambahkan !</font>";
                                else
                                    echo "<br><font color=red size=+1 >Masalah dalam Penambahan !</font>";

                            }


                        }

                    }


                    ?>

                    <form name="form1" method="post" id="form1" action="">

                        <p><strong>Tambah Kategori Baru </strong> - Tambah Baru ( Control +A)</p>
                        <table class="form" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td><span class="man">*</span>Nama:</td>
                                <td><input name="name" placeholder="Masukkan Nama Kategori" type="text" id="name"
                                           maxlength="200" class="round default-width-input"
                                           value="<?php echo isset($name) ? $name : ''; ?>"/></td>

                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td><textarea name="address" placeholder="Masukkan Deskripsi" cols="8"
                                              class="round full-width-textarea"><?php echo isset($address) ? $address : ''; ?></textarea>
                                </td>

                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>


                            <tr>
                                <td>
                                    &nbsp;
                                </td>
                                <td>
                                    <input class="button round blue image-right ic-add text-upper" type="submit"
                                           name="Submit" value="Tambah">
                                    (Control + S)

                                <td align="right"><input class="button round red   text-upper" type="reset" name="Reset"
                                                         value="Reset"></td>
                            </tr>
                        </table>
                    </form>


                </div>
                <!-- end content-module-main -->


            </div>
            <!-- end content-module -->


        </div>
        <!-- end full-width -->

    </div>
    <!-- end content -->


    <!-- FOOTER -->
    <?php include "footer.php"; ?>
    <!-- end footer -->

</body>
</html>
