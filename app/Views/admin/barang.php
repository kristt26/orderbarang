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
                <form ng-submit = "save()">
                <div class="card-body">
                        <div class="form-group pmd-textfield pmd-textfield-floating-label">
                            <label class="control-label">Kode Barang</label>
                            <input type="text" class="form-control" ng-model="model.kode" required>
                        </div>
                        <div class="form-group pmd-textfield pmd-textfield-floating-label">
                            <label class="control-label">Nama Barang</label>
                            <input type="text" class="form-control" ng-model="model.nama" required>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary pmd-ripple-effect btn-sm">Simpan</button>
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
							<table class="table pmd-table table-sm">
								<thead>
									<tr>
										<th>No</th>
										<th>Kode Barang</th>
										<th>Nama Barang</th>
										<th><i class="fas fa-cogs"></i></th>
									</tr>
								</thead>
								<tbody>
									<tr ng-repeat="item in datas">
										<td>{{$index+1}}</td>
                                        <td>{{item.kode}}</td>
                                        <td>{{item.nama}}</td>
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
</div>
<?= $this->endSection() ?>