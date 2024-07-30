<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<div ng-controller="pegawaiController">
    <h2>Data Pegawai</h2>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3>Input Data Pegawai</h3>
                </div>
                <form ng-submit="save()">
                    <div class="card-body">
                        <div class="form-group pmd-textfield pmd-textfield-floating-label">
                            <label class="control-label">Nama Pegawai</label>
                            <input type="text" class="form-control" ng-model="model.nama" required>
                        </div>
                        <div ng-if="!model.id" class="form-group pmd-textfield pmd-textfield-floating-label">
                            <label class="control-label">Username</label>
                            <input type="text" class="form-control" ng-model="model.username" required>
                        </div>
                        <div ng-if="!model.id" class="form-group pmd-textfield pmd-textfield-floating-label">
                            <label class="control-label">Password</label>
                            <input type="password" class="form-control" ng-model="model.password" required>
                        </div>
                        <div ng-if="!model.id" class="form-group pmd-textfield pmd-textfield-floating-label">
                            <label class="control-label">Akses</label>
                            <select class="form-control" ng-model="model.role" required>
                                <option value="Admin">Admin</option>
                                <option value="Gudang">Gudang</option>
                            </select>
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
                                    <th>Nama Pegawai</th>
                                    <th>Username</th>
                                    <th>Akses</th>
                                    <th><i class="fas fa-cogs"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="item in datas">
                                    <td>{{$index+1}}</td>
                                    <td>{{item.nama}}</td>
                                    <td>{{item.username}}</td>
                                    <td>{{item.role}}</td>
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