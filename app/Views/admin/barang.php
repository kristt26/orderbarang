<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<div ng-controller="barangController">
    <h2>Data Barang</h2>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3>Input Data Barang</h3>
                </div>
                <form ng-submit="save()">
                    <div class="card-body">
                        <div class="form-group pmd-textfield pmd-textfield-floating-label">
                            <label class="control-label">Kode Barang</label>
                            <input type="text" class="form-control" ng-model="model.kode" required>
                        </div>
                        <div class="form-group pmd-textfield pmd-textfield-floating-label">
                            <label class="control-label">Nama Barang</label>
                            <input type="text" class="form-control" ng-model="model.nama" required>
                        </div>
                        <div class="form-group pmd-textfield pmd-textfield-floating-label">
                            <label class="control-label">Volume</label>
                            <input type="text" class="form-control" ng-model="model.volume" required>
                        </div>
                        <div class="form-group pmd-textfield pmd-textfield-floating-label">
                            <label class="control-label">Harga</label>
                            <input type="text" class="form-control" ng-model="model.harga" required>
                        </div>
                        <div class="form-group pmd-textfield pmd-textfield-floating-label">
                            <label class="control-label">Stok</label>
                            <input type="text" class="form-control" ng-model="model.stok" required>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        <button type="submit" class="btn btn-{{model.id ? 'warning' : 'primary'}} pmd-ripple-effect btn-sm">{{model.id ? 'Ubah' : 'Tambah'}}</button>
                    </div>
                </form>

            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>Daftar Barang</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table datatable = "ng" class="table pmd-table table-sm table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode</th>
                                    <th>Barang</th>
                                    <th>KMS</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th><i class="fas fa-cogs"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="item in datas">
                                    <td>{{$index+1}}</td>
                                    <td>{{item.kode}}</td>
                                    <td>{{item.nama}}</td>
                                    <td>{{item.volume}}</td>
                                    <td>{{item.harga|currency: "Rp. "}}</td>
                                    <td>{{item.stok}}</td>
                                    <td>
                                        <a href="javascript:void()" ng-click="edit(item)"><i class="fas fa-edit fa-sm fa-fw"></i></a>
                                        <a href="javascript:void()"><i class="fas fa-trash-alt fa-sm fa-fw"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>