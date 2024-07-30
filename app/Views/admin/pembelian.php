<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<div ng-controller="pembelianController">
    <h2>Data Pembelian</h2>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3>Daftar Pembelian Barang</h3>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-secondary mb-1 btn-sm" data-toggle="modal" data-target="#tambah">
                        <i class="fas fa-plus"></i>Tambah
                    </button>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table pmd-table table-sm">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal Pembelian</th>
                                    <th>Nama Barang</th>
                                    <th>Qty</th>
                                    <th>Harga Beli/Satuan</th>
                                    <th>Supplier</th>
                                    <th><i class="fas fa-cogs"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="item in datas.pembelian">
                                    <td>{{$index+1}}</td>
                                    <td>{{item.tanggal}}</td>
                                    <td>{{item.nama}}</td>
                                    <td>{{item.jumlah}}</td>
                                    <td>{{item.harga_beli}}</td>
                                    <td>{{item.nama_supplier}}</td>
                                    <td>
                                        <button type="submit" class="btn btn-warning pmd-ripple-effect btn-sm" ng-click="edit(item)"><i class="fas fa-edit fa-sm fa-fw"></i></button>
                                        <button type="submit" class="btn btn-danger pmd-ripple-effect btn-sm"><i class="fas fa-trash-alt fa-sm fa-fw"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="smallmodalLabel">Tambah Pembelian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form ng-submit="save()">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group pmd-textfield">
                                    <label>Tanggal Pembelian</label>
                                    <input type="date" class="form-control" ng-model="model.tanggal" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                    <label class="control-label">Supplier</label>
                                    <select class="form-control" ng-options="item as item.nama_supplier for item in datas.supplier" ng-model="supplier" ng-change="model.supplier_id=supplier.id; model.nama_supplier=supplier.nama_supplier"></select>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                    <label class="control-label">Barang</label>
                                    <select class="form-control" ng-options="item as item.nama for item in datas.barang" ng-model="barang" ng-change="model.barang_id=barang.id; model.nama=barang.nama"></select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                    <label class="control-label">Harga Beli</label>
                                    <input type="text" class="form-control" ng-model="model.harga_beli" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                    <label class="control-label">Jumlah</label>
                                    <input type="text" class="form-control" ng-model="model.jumlah" required>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary pmd-ripple-effect btn-sm">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

<?= $this->endSection() ?>