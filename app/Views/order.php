<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<div ng-controller="orderController">
    <h2>Data Order</h2>
    <div class="row">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    <h3>Tambah Orderan</h3>
                </div>
                <form ng-submit="save()">
                    <div class="card-body">
                        <div class="form-group pmd-textfield">
                            <label>Tanggal Order</label>
                            <input type="date" class="form-control" readonly ng-model="tanggal_pesan" required disabled>
                        </div>
                        <div class="form-group">
                            <label>Barang</label>
                            <select class="form-control select-add-tags pmd-select2-tags" ng-change="addQty(barang)" ng-options="item as (item.kode+' - '+item.nama+' | Stok: '+item.stok) for item in datas.barang" ng-model="barang">
                            </select>
                        </div>
                        <div class="form-group">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Barang</th>
                                        <th>Harga</th>
                                        <th>Qty</th>
                                        <th>Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-repeat="item in model.detail">
                                        <td>{{item.nama}}</td>
                                        <td>{{item.harga}}</td>
                                        <td>{{item.qty}}</td>
                                        <td>{{item.qty * item.harga | currency:'Rp. '}}</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3">Total</td>
                                        <td>{{total | currency:'Rp. '}}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary pmd-ripple-effect btn-sm">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    <h3>Daftar Orderan</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table pmd-table table-sm">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nomor</th>
                                    <th>Tanggal Pesan</th>
                                    <th>Detail</th>
                                    <th>Tagihan</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="item in datas.pesanan">
                                    <td>{{$index+1}}</td>
                                    <td>{{item.kode_pesan}}</td>
                                    <td>{{item.tanggal_pesan | date: 'd MMMM y'}}</td>
                                    <td><a href="" data-toggle="modal" data-target="#detail" ng-click="setDetail(item)">Detail</a></td>
                                    <td>{{item.tagihan | currency:'Rp. '}}</td>
                                    <td>{{item.status}}</td>
                                    <td>
                                        <a ng-if="!item.pembayaran" href="javascript:void()" ng-click="pay(item)"><i class="fas fa-cart-arrow-down"></i></a>
                                        <span ng-if="item.pembayaran" class="{{item.pembayaran.status=='0' ? 'text-warning':'text-success'}}">{{item.pembayaran.status=='0' ? 'Belum Diverifikasi':'Valid'}}</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade" id="addQty" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form ng-submit="add()">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group pmd-textfield">
                                    <label class="control-label">Barang</label>
                                    <input type="text" class="form-control" readonly ng-model="itemBarang.nama" required>
                                </div>
                                <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                    <label class="control-label">Qty</label>
                                    <input type="text" class="form-control" ng-model="itemBarang.qty" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary pmd-ripple-effect btn-sm">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Detail Order</h4>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Barang</th>
                                <th>Harga</th>
                                <th>Qty</th>
                                <th>Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="item in dataDetail">
                                <td>{{item.nama}}</td>
                                <td>{{item.harga | currency: 'Rp. '}}</td>
                                <td>{{item.qty}}</td>
                                <td>{{item.qty*item.harga | currency: 'Rp. '}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="buton" class="btn btn-secondary pmd-ripple-effect btn-sm" data-dismiss="modal">Tutup</button>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="pay" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3><i class="fas fa-cart-arrow-down"></i> Pembayaran</h3>
                </div>
                <form name="form" ng-submit="bayar()">
                    <div class="modal-body">
                        <div class="form-group pmd-textfield">
                            <label>Nomor Pesanan</label>
                            <input type="text" class="form-control" readonly disabled ng-model="itemPay.kode_pesan" required disabled>
                        </div>
                        <div class="form-group pmd-textfield">
                            <label>Tanggal Order</label>
                            <input type="date" class="form-control" readonly disabled ng-model="itemPay.tanggal_pesan" required disabled>
                        </div>
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>Barang</th>
                                    <th>Harga</th>
                                    <th>Qty</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="item in itemPay.detail">
                                    <td>{{item.nama}}</td>
                                    <td>{{item.harga | currency: 'Rp. '}}</td>
                                    <td>{{item.qty}}</td>
                                    <td>{{item.qty*item.harga | currency: 'Rp. '}}</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3">Total</td>
                                    <td>{{itemPay.tagihan | currency:'Rp. '}}</td>
                                </tr>
                            </tfoot>
                        </table>
                        <div class="form-group pmd-textfield mt-4">
                            <label>Nominal Bayar</label>
                            <input type="text" class="form-control" ng-model="model.nominal" required>
                        </div>
                        <div class="form-group pmd-textfield">
                            <label>Bukti Bayar</label>
                            <input type="file" class="form-control form-control-sm" ng-change="show(model.berkas)" name="berkas" id="berkas" accept="image/*, application/pdf" base-sixty-four-input ng-model="model.berkas" maxsize="500">
                            <img ng-if="model.berkas" ng-src="data:{{model.berkas.filetype}};base64,{{model.berkas.base64}}" width="50%" alt="Base64 Image"/>
                            <span ng-show="form.berkas.$error.maxsize" style="color: red;">Maximum file 300 KB</span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary pmd-ripple-effect btn-sm"><i class="fas fa-dollar-sign"></i> Bayar</button>
                        <button type="buton" class="btn btn-secondary pmd-ripple-effect btn-sm" data-dismiss="modal">Tutup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>