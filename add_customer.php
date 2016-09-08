<?php
include_once("init.php");

?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>POSNIC - Tambah Pelanggan</title>

    <!-- Stylesheets -->

    <link rel="stylesheet" href="css/style.css">

    <!-- Optimize for mobile devices -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <style type="text/css">

        body {
            margin-left: 0px;
            margin-top: 0px;
            margin-right: 0px;
            margin-bottom: 0px;
            background-color: #FFFFFF;
        }

        * {
            padding: 0px;
            margin: 0px;
        }

        #vertmenu {
            font-family: Verdana, Arial, Helvetica, sans-serif;
            font-size: 100%;
            width: 160px;
            padding: 0px;
            margin: 0px;
        }

        #vertmenu h1 {
            display: block;
            background-color: #FF9900;
            font-size: 90%;
            padding: 3px 0 5px 3px;
            border: 1px solid #000000;
            color: #333333;
            margin: 0px;
            width: 159px;
        }

        #vertmenu ul {
            list-style: none;
            margin: 0px;
            padding: 0px;
            border: none;
        }

        #vertmenu ul li {
            margin: 0px;
            padding: 0px;
        }

        #vertmenu ul li a {
            font-size: 80%;
            display: block;
            border-bottom: 1px dashed #C39C4E;
            padding: 5px 0px 2px 4px;
            text-decoration: none;
            color: #666666;
            width: 160px;
        }

        #vertmenu ul li a:hover, #vertmenu ul li a:focus {
            color: #000000;
            background-color: #eeeeee;
        }

        .style1 {
            color: #000000
        }

        div.pagination {

            padding: 3px;

            margin: 3px;

        }

        div.pagination a {

            padding: 2px 5px 2px 5px;

            margin: 2px;

            border: 1px solid #AAAADD;

            text-decoration: none; /* no underline */

            color: #000099;

        }

        div.pagination a:hover, div.pagination a:active {

            border: 1px solid #000099;

            color: #000;

        }

        div.pagination span.current {

            padding: 2px 5px 2px 5px;

            margin: 2px;

            border: 1px solid #000099;

            font-weight: bold;

            background-color: #000099;

            color: #FFF;

        }

        div.pagination span.disabled {

            padding: 2px 5px 2px 5px;

            margin: 2px;

            border: 1px solid #EEE;

            color: #DDD;

        }


    </style>
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
                    },
                    contact1: {
                        minlength: 3,
                        maxlength: 20
                    },
                    contact2: {
                        minlength: 3,
                        maxlength: 20
                    }
                },
                messages: {
                    name: {
                        required: "Silahkan Masukkan nama Pelanggan",
                        minlength: "Pelanggan harus terdiri dari minimal 3 karakter"
                    },
                    address: {
                        minlength: "Alamat Pelanggan harus minimal 3 karakter",
                        maxlength: "Alamat Pelanggan harus minimal 3 karakter"
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

            <h3>Management Pelanggan</h3>
            <ul>
                <li><a href="add_customer.php">Tambah Pelanggan</a></li>
                <li><a href="view_customers.php">Tampil Pelanggan</a></li>
            </ul>

        </div>
        <!-- end side-menu -->

        <div class="side-content fr">

            <div class="content-module">

                <div class="content-module-heading cf">

                    <h3 class="fl">Tampil Pelanggan</h3>
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
                            'contact1' => 'alpha_numeric|max_len,20',
                            'contact2' => 'alpha_numeric|max_len,20'
                        ));

                        $gump->filter_rules(array(
                            'name' => 'trim|sanitize_string|mysqli_escape',
                            'address' => 'trim|sanitize_string|mysqli_escape',
                            'contact1' => 'trim|sanitize_string|mysqli_escape',
                            'contact2' => 'trim|sanitize_string|mysqli_escape'
                        ));

                        $validated_data = $gump->run($_POST);
                        $name = "";
                        $address = "";
                        $contact1 = "";
                        $contact2 = "";

                        if ($validated_data === false) {
                            echo $gump->get_readable_errors(true);
                        } else {


                            $name = mysqli_real_escape_string($db->connection, $_POST['name']);
                            $address = mysqli_real_escape_string($db->connection, $_POST['address']);
                            $contact1 = mysqli_real_escape_string($db->connection, $_POST['contact1']);
                            $contact2 = mysqli_real_escape_string($db->connection, $_POST['contact2']);

                            $count = $db->countOf("customer_details", "customer_name='$name'");
                            if ($count == 1) {
                                echo "<div class='error-box round'>Duplkat Data, Mohon verifikasi</div>";
                            } else {

                                if ($db->query("insert into customer_details values(NULL,'$name','$address','$contact1','$contact2',0)"))
                                    echo "<div class='confirmation-box round'>[ $name ] Rincian Pelanggan Ditambahkan !</div>";
                                else
                                    echo "<div class='error-box round'>Masalah Dalam Penambahan !</div>";

                            }
                        }
                    }

                    ?>

                    <form name="form1" method="post" id="form1" action="">

                        <p><strong>Tambah Rincial Pelanggan </strong> - Tambah Baru ( Control +A)</p>
                        <table class="form" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td><span class="man">*</span>Nama:</td>
                                <td><input name="name" placeholder="Masukkan Nama Lengkap" type="text" id="name"
                                           maxlength="200" class="round default-width-input"
                                           value="<?php echo isset($name) ? $name : ''; ?>"/></td>
                                <td>Contact 1</td>
                                <td><input name="contact1" placeholder="Masukkan No. Telp 2" type="text"
                                           id="buyingrate" maxlength="20" class="round default-width-input"
                                           value="<?php echo isset($contact1) ? $contact1 : ''; ?>"/></td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td><textarea name="address" placeholder="Masukkan Alamat" cols="15"
                                              class="round full-width-textarea"><?php echo isset($address) ? $address : ''; ?></textarea>
                                </td>
                                <td>Contact 2</td>
                                <td><input name="contact2" placeholder="Masukkan No. Telp 2" type="text"
                                           id="sellingrate" maxlength="20" class="round default-width-input"
                                           value="<?php echo isset($contact2) ? $contact2 : ''; ?>"/></td>

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
                                <td>
                                    &nbsp;
                                </td>
                                <td align="right"><input class="button round red text-upper" type="reset" name="Reset"
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
