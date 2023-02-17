<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://printjs-4de6.kxcdn.com/print.min.css" rel="stylesheet" />
    <link href="<?= base_url() ?>/assets/css/style.css" rel="stylesheet" />
    <link href="<?= base_url() ?>/assets/css/report.css" rel="stylesheet" />
</head>

<body>
    <div class="container" ng-controller="detailKeluargaController" id="cetak">
        <div class="col-12" style="margin-bottom: 20px;">
            <table>
                <tr>
                    <td class="text-center" style="font-size:16px"><strong>M A N I F E S T <br> PENGIRIMAN BARANG
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-12 mb-3">
            <div class="row">
                <div class="col-5">
                    <table width="99%">
                        <tr style="height:10px">
                            <td width="30%" style="padding:0px !important">No. Order</td>
                            <td width="1%" style="padding:0px !important">:</td>
                            <td style="padding:0px !important">&nbsp;<strong><?= $kode_pesan ?></strong></td>
                        </tr>
                        <tr style="height:10px">
                            <td width="30%" style="padding:0px !important">Tanggal Pesan</td>
                            <td width="1%" style="padding:0px !important">:</td>
                            <td style="padding:0px !important">&nbsp;<strong><?= $tanggal_pesan ?></strong></td>
                        </tr>
                        <tr style="height:10px">
                            <td width="30%" style="padding:0px !important">Tujuan</td>
                            <td width="1%" style="padding:0px !important">:</td>
                            <td style="padding:0px !important">&nbsp;<strong><?= $nama_toko ?></strong></td>
                        </tr>

                    </table>
                </div>
                <div class="col-3">

                </div>
                <div class="col-4">
                    <table width="99%">
                        <tr style="height:10px">
                            <td width="30%">Pemilik</td>
                            <td width="1%">:</td>
                            <td>&nbsp<?= $pemilik ?></td>
                        </tr>
                        <tr style="height:10px">
                            <td width="30%">Hp</td>
                            <td width="1%">:</td>
                            <td>&nbsp<?= $telp ?></td>
                        </tr>
                        <tr style="height:10px">
                            <td width="30%">Alamat</td>
                            <td width="1%">:</td>
                            <td>&nbsp<?= $alamat ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-12 mb-5">
            <table class="border thick" width="99%">
                <thead>
                    <tr class="border thick">
                        <th class="text-center">No</th>
                        <th class="text-center">Barang</th>
                        <th class="text-center">Qty</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($detail as $key => $value) : ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $value['nama'] ?></td>
                            <td><?= $value['qty'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="col-12 mb-3">
            <div class="row">
                <div class="col-5">
                    <table width="99%">
                        <tr style="height:10px">
                            <td width="30%" style="padding:0px !important" class="text-center">Pengirim</td>
                        </tr>
        
                    </table>
                </div>
                <div class="col-3">
        
                </div>
                <div class="col-4">
                    <table width="99%">
                        <tr style="height:10px">
                            <td width="30%" class="text-center">Penerima</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>
    <script>
        printJS({
            printable: 'cetak',
            type: 'html',
            css: ["<?= base_url() ?>/assets/css/style.css",
                "<?= base_url() ?>/assets/css/report.css"
            ]
        })
        if (navigator.userAgent.toLowerCase().indexOf(fnBrowserDetect()) > -1) { // Chrome Browser Detected?
            window.PPClose = true; // Clear Close Flag
            window.onbeforeunload = function() { // Before Window Close Event
                if (window.PPClose === false) { // Close not OK?
                    console.log(window.PPClose);
                }
            }
            window.PPClose = true; // Set Close Flag to OK.
        }
        window.onfocus = function() {
            window.close();
        }
        window.onfocusin = function() {
            window.close();
        }
        window.onfocusout = function() {
            window.close();
        }
        window.onblur = function() {
            window.close();
        }

        function fnBrowserDetect() {

            let userAgent = navigator.userAgent;
            let browserName;

            if (userAgent.match(/chrome|chromium|crios/i)) {
                browserName = "chrome";
            } else if (userAgent.match(/firefox|fxios/i)) {
                browserName = "firefox";
            } else if (userAgent.match(/safari/i)) {
                browserName = "safari";
            } else if (userAgent.match(/opr\//i)) {
                browserName = "opera";
            } else if (userAgent.match(/edg/i)) {
                browserName = "edge";
            } else {
                browserName = "No browser detection";
            }

            return browserName;
        }
    </script>
</body>

</html>