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
                            <input type="date" class="form-control" readonly ng-model="model.tanggal_pesan" required disabled>
                        </div>
                        <div class="form-group">
                            <label>Barang</label>
                            <select class="form-control select-add-tags pmd-select2-tags" ng-change="addQty(barang)" ng-options="item as (item.kode+' - '+item.nama) for item in datas.barang" ng-model="barang">
                            </select>
                        </div>
                        <div class="form-group">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Barang</th>
                                        <th>Qty</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-repeat="item in model.detail">
                                        <td>{{item.nama}}</td>
                                        <td>{{item.qty}}</td>
                                    </tr>
                                </tbody>
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
                                    <th>Tanggal Pesan</th>
                                    <th>Detail</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="item in datas.pesanan">
                                    <td>{{$index+1}}</td>
                                    <td>{{item.tanggal_pesan | date: 'd MMMM y'}}</td>
                                    <td><a href="" data-toggle="modal" data-target="#detail" ng-click="setDetail(item)">Detail</a></td>
                                    <td>{{item.status}}</td>
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
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Detail Order</h4>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Barang</th>
                                <th>Qty</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="item in dataDetail">
                                <td>{{item.nama}}</td>
                                <td>{{item.qty}}</td>
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
</div>

<?= $this->endSection() ?>