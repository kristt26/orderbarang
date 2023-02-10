<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<div ng-controller="customerController">
    <h2>Data Customer</h2>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3>Daftar Barang</h3>
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
                                    <th>Nama Toko</th>
                                    <th>Pemilik</th>
                                    <th>Telepon</th>
                                    <th>Email</th>
                                    <th style="width: 25%;">Alamat</th>
                                    <th>Username</th>
                                    <th><i class="fas fa-cogs"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="item in datas">
                                    <td>{{$index+1}}</td>
                                    <td>{{item.nama_toko}}</td>
                                    <td>{{item.pemilik}}</td>
                                    <td>{{item.telp}}</td>
                                    <td>{{item.email}}</td>
                                    <td>{{item.alamat}}</td>
                                    <td>{{item.username}}</td>
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
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="smallmodalLabel">Tambah Customer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form ng-submit="save()">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                    <label class="control-label">Nama Toko</label>
                                    <input type="text" class="form-control" ng-model="model.nama_toko" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                    <label class="control-label">Pemilik</label>
                                    <input type="text" class="form-control" ng-model="model.pemilik" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                    <label class="control-label">Telepon</label>
                                    <input type="text" class="form-control" ng-model="model.telp" required>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                    <label class="control-label">Email</label>
                                    <input type="email" class="form-control" ng-model="model.email" required>
                                </div>
                            </div>
                            <div class="col-md-12   ">
                                <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                    <label class="control-label">Alamat</label>
                                    <textarea required class="form-control" ng-model="model.alamat"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6" ng-if="!model.id">
                                <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                    <label class="control-label">Username</label>
                                    <input type="text" class="form-control" ng-model="model.username" required>
                                </div>

                            </div>
                            <div class="col-md-6" ng-if="!model.id">
                                <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                    <label class="control-label">Password</label>
                                    <input type="text" class="form-control" ng-model="model.password" required>
                                </div>

                            </div>
                            <div class="col-md-6" ng-if="!model.id">
                                <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                    <label class="control-label">Akses</label>
                                    <select class="form-control" ng-model="model.role" required>
                                        <option value="Admin">Admin</option>
                                        <option value="Customer">Customer</option>
                                    </select>
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