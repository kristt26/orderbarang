<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<div ng-controller="supplierController">
    <h2>Data Supplier</h2>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3>Input Data Supplier</h3>
                </div>
                <form ng-submit="save()">
                    <div class="card-body">
                        <div class="form-group pmd-textfield pmd-textfield-floating-label">
                            <label class="control-label">Nama Supplier</label>
                            <input type="text" class="form-control" ng-model="model.nama_supplier" required>
                        </div>
                        <div class="form-group pmd-textfield pmd-textfield-floating-label">
                            <label class="control-label">Telepon</label>
                            <input type="text" class="form-control" ng-model="model.kontak" required>
                        </div>
                        <div class="form-group pmd-textfield pmd-textfield-floating-label">
                            <label class="control-label">Alamat</label>
                            <textarea class="form-control" ng-model="model.alamat" required></textarea>
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
                        <table class="table pmd-table table-sm table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Supplier</th>
                                    <th>Telepon</th>
                                    <th>Alamat</th>
                                    <th><i class="fas fa-cogs"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="item in datas">
                                    <td>{{$index+1}}</td>
                                    <td>{{item.nama_supplier}}</td>
                                    <td>{{item.kontak}}</td>
                                    <td>{{item.alamat}}</td>
                                    <td>
                                        <a href="javascript:void()" ng-click="edit(item)"><i class="fas fa-edit fa-sm fa-fw"></i></a>
                                        <a href="javascript:void()" ng-click="delete(item)"><i class="fas fa-trash-alt fa-sm fa-fw"></i></a>
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