<!-- MAIN CONTENT -->
<div id="content">

    <div class="page-full-width cf">

        <div class="side-menu fl">

            <h3>Link Pintas</h3>
            <ul>
                <li><a href="add_sales.php">Tambah Penjualan</a></li>
                <li><a href="add_purchase.php">Tambah Pembayaran</a></li>
                <li><a href="add_supplier.php">Tambah Supplier</a></li>
                <li><a href="add_customer.php">Tambah Pelanggan</a></li>
                <li><a href="view_report.php">Laporan</a></li>
            </ul>

        </div>
        <!-- end side-menu -->

        <div class="side-content fr">

            <div class="content-module">

                <div class="content-module-heading cf">

                    <h3 class="fl">Statistik</h3>
                    <span class="fr expand-collapse-text">Klik untuk menutup</span>
                    <span class="fr expand-collapse-text initial-expand">Klik untuk membuka</span>

                </div>
                <!-- end content-module-heading -->

                <div class="content-module-main cf">


                    <table style="width:450px; float:left;" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td width="250" align="left">&nbsp;</td>
                            <td width="150" align="left">&nbsp;</td>
                        </tr>
                        <tr>
                            <td align="left">Total Produk</td>
                            <td align="left"><?php echo $count = $db->countOfAll("stock_avail"); ?>&nbsp;</td>
                        </tr>
                        <tr>
                            <td align="left">&nbsp;</td>
                            <td align="left">&nbsp;</td>
                        </tr>
                        <tr>
                            <td align="left">Total Transaksi Penjualan</td>
                            <td align="left"><?php echo $count = $db->countOfAll("stock_sales"); ?></td>
                        </tr>
                        <tr>
                            <td align="left">&nbsp;</td>
                            <td align="left">&nbsp;</td>
                        </tr>
                        <tr>
                            <td align="left">Total Supplier</td>
                            <td align="left"><?php echo $count = $db->countOfAll("supplier_details"); ?></td>
                        </tr>
                        <tr>
                            <td align="left">&nbsp;</td>
                            <td align="left">&nbsp;</td>
                        </tr>
                        <tr>
                            <td align="left">Total Pelanggan</td>
                            <td align="left"><?php echo $count = $db->countOfAll("customer_details"); ?></td>
                        </tr>
                        <tr>
                            <td align="left">&nbsp;</td>
                            <td align="left">&nbsp;</td>
                        </tr>
                        <tr>
                            <td align="left">&nbsp;</td>
                            <td align="left">&nbsp;</td>
                        </tr>
                    </table>

                    <table style="width:600px;  margin-left:50px; float:left;" border="0" cellspacing="0"
                           cellpadding="0">
                        <tr>
                            <td>&nbsp;</td>
                            <td width="250" align="left">Home (Ctrl+0)</td>
                            <td width="600" align="left">Tambah Pembayaran(Ctrl+1)</td>


                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td width="250" align="left">Tambah Stok(Ctrl+2)</td>
                            <td align="left">Tambah Penjualan(Ctrl+3)</td>

                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td align="left">Tambah Kategori (Ctrl+4 )</td>
                            <td align="left">Tambah Supplier (Ctrl+5 )</td>

                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td align="left">Tambah Pelanggan (Ctrl+6)</td>
                            <td align="left">Tampil Stok (Ctrl+7)</td>

                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td align="left">Tampil Penjualan(Ctrl+8)</td>
                            <td width="600" align="left">Tampil Pembayaran (Ctrl+9)</td>

                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td align="left">Tambah Baru (Ctrl+a)</td>
                            <td align="left">Simpan( Ctrl+s )</td>

                        </tr>

                    </table>
                    <!--<ul class="temporary-button-showcase">
                        <li><a href="#" class="button round blue image-right ic-add text-upper">Add</a></li>
                        <li><a href="#" class="button round blue image-right ic-edit text-upper">Edit</a></li>
                        <li><a href="#" class="button round blue image-right ic-delete text-upper">Delete</a></li>
                        <li><a href="#" class="button round blue image-right ic-download text-upper">Download</a></li>
                        <li><a href="#" class="button round blue image-right ic-upload text-upper">Upload</a></li>
                        <li><a href="#" class="button round blue image-right ic-favorite text-upper">Favorite</a></li>
                        <li><a href="#" class="button round blue image-right ic-print text-upper">Print</a></li>
                        <li><a href="#" class="button round blue image-right ic-refresh text-upper">Refresh</a></li>
                        <li><a href="#" class="button round blue image-right ic-search text-upper">Search</a></li>
                    </ul>-->

                </div>
                <!-- end content-module-main -->


            </div>
            <!-- end content-module -->


        </div>
        <!-- end full-width -->

    </div>
</div>

