<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<div ng-controller="pesananController">
    <!-- <h2>Data Pesanan</h2> -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Daftar Pesanan</h2>
                </div>
                <div class="card-body">
                    <div class="custom-tab">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a ng-click="setData('Order')" class="nav-item nav-link active" id="custom-nav-order-tab" data-toggle="tab" href="#custom-nav-order" role="tab" aria-controls="custom-nav-order" aria-selected="true">Order Baru</a>
                                <a ng-click="setData('Packing')" class="nav-item nav-link" id="custom-nav-packing-tab" data-toggle="tab" href="#custom-nav-packing" role="tab" aria-controls="custom-nav-packing" aria-selected="false">Packing</a>
                                <a ng-click="setData('Pengiriman')" class="nav-item nav-link" id="custom-nav-pengiriman-tab" data-toggle="tab" href="#custom-nav-pengiriman" role="tab" aria-controls="custom-nav-pengiriman" aria-selected="false">Pengiriman</a>
                                <a ng-click="setData('Selesai')" class="nav-item nav-link" id="custom-nav-selesai-tab" data-toggle="tab" href="#custom-nav-selesai" role="tab" aria-controls="custom-nav-selesai" aria-selected="false">Selesai</a>
                            </div>
                        </nav>
                        <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="custom-nav-order" role="tabpanel" aria-labelledby="custom-nav-order-tab">
                                <div class="table-responsive">
                                    <table class="table pmd-table table-sm">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Pesanan</th>
                                                <th>Tanggal Pesan</th>
                                                <th>Customer</th>
                                                <th>Detail</th>
                                                <th>Status</th>
                                                <th><i class="fas fa-cogs" aria-hidden="true"></i></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr ng-repeat="item in dataStatus">
                                                <td>{{$index+1}}</td>
                                                <td>{{item.kode_pesan}}</td>
                                                <td>{{item.tanggal_pesan | date: 'd MMMM y'}}</td>
                                                <td>{{item.nama_toko}}</td>
                                                <td><a href="" data-toggle="modal" data-target="#detail" ng-click="setDetail(item)">Detail</a></td>
                                                <td>{{item.status}}</td>
                                                <td>
                                                    <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#setStatus" ng-click="setStatus(item)"><i class="fa fa-edit" aria-hidden="true"></i></button>
                                                    <!-- <button class="btn btn-sm btn-primary"><i class="far fa-copy"></i></button> -->
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="custom-nav-packing" role="tabpanel" aria-labelledby="custom-nav-packing-tab">
                                <div class="table-responsive">
                                    <table class="table pmd-table table-sm">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Pesanan</th>
                                                <th>Tanggal Pesan</th>
                                                <th>Customer</th>
                                                <th>Detail</th>
                                                <th>Status</th>
                                                <th><i class="fas fa-cogs" aria-hidden="true"></i></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr ng-repeat="item in dataStatus">
                                                <td>{{$index+1}}</td>
                                                <td>{{item.kode_pesan}}</td>
                                                <td>{{item.tanggal_pesan | date: 'd MMMM y'}}</td>
                                                <td>{{item.nama_toko}}</td>
                                                <td><a href="" data-toggle="modal" data-target="#detail" ng-click="setDetail(item)">Detail</a></td>
                                                <td>{{item.status}}</td>
                                                <td>
                                                    <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#setStatus" ng-click="setStatus(item)"><i class="fa fa-edit" aria-hidden="true"></i></button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="custom-nav-pengiriman" role="tabpanel" aria-labelledby="custom-nav-pengiriman-tab">
                                <div class="table-responsive">
                                    <table class="table pmd-table table-sm">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Pesanan</th>
                                                <th>Tanggal Pesan</th>
                                                <th>Customer</th>
                                                <th>Detail</th>
                                                <th>Status</th>
                                                <th><i class="fas fa-cogs" aria-hidden="true"></i></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr ng-repeat="item in dataStatus">
                                                <td>{{$index+1}}</td>
                                                <td>{{item.kode_pesan}}</td>
                                                <td>{{item.tanggal_pesan | date: 'd MMMM y'}}</td>
                                                <td>{{item.nama_toko}}</td>
                                                <td><a href="" data-toggle="modal" data-target="#detail" ng-click="setDetail(item)">Detail</a></td>
                                                <td>{{item.status}}</td>
                                                <td>
                                                    <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#pengirim" ng-click="setStatus(item)"><i class="fas fa-edit" aria-hidden="true"></i></button>
                                                    <button class="btn btn-sm btn-primary" ng-click="cetak_manifest(item)"><i class="fas fa-print"></i></button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="custom-nav-selesai" role="tabpanel" aria-labelledby="custom-nav-selesai-tab">
                                <div class="table-responsive">
                                    <table class="table pmd-table table-sm">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Pesanan</th>
                                                <th>Tanggal Pesan</th>
                                                <th>Customer</th>
                                                <th>Detail</th>
                                                <th>Status</th>
                                                <!-- <th><i class="fas fa-cogs" aria-hidden="true"></i></th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr ng-repeat="item in dataStatus">
                                                <td>{{$index+1}}</td>
                                                <td>{{item.kode_pesan}}</td>
                                                <td>{{item.tanggal_pesan | date: 'd MMMM y'}}</td>
                                                <td>{{item.nama_toko}}</td>
                                                <td><a href="" data-toggle="modal" data-target="#detail" ng-click="setDetail(item)">Detail</a></td>
                                                <td>{{item.status}}</td>
                                                <!-- <td>
                                                    <button class="btn btn-sm btn-info"><i class="fa fa-edit" aria-hidden="true"></i></button>
                                                    <button class="btn btn-sm btn-primary"><i class="far fa-copy"></i></button>
                                                </td> -->
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="setStatus" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form ng-submit="save('Status')">
                    <div class="modal-header">
                        <h4>Set Status Pesanan</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group pmd-textfield">
                                    <label class="control-label">Set Status</label>
                                    <select class="form-control select-add-tags pmd-select2-tags" id="control-label" ng-model="model.status">
                                        <option ng-if="model.status == 'Order'" value="Order">Order</option>
                                        <option ng-if="model.status == 'Packing' || model.status == 'Order'" value="Packing">Packing</option>
                                        <option ng-if="model.status == 'Pengiriman' || model.status == 'Packing' || model.status == 'Order'" value="Pengiriman">Pengiriman</option>
                                        <option value="Selesai">Selesai</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary pmd-ripple-effect btn-sm">Update Status</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="pengirim" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form ng-submit="save('Pengiriman')">
                    <div class="modal-header">
                        <h3>Data Pengiriman</h3>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                    <label class="control-label">Penerima</label>
                                    <input type="text" class="form-control" ng-model="model.pengiriman.penerima" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                    <label class="control-label">Tanggal Terima</label>
                                    <input type="date" class="form-control" ng-model="model.pengiriman.tanggal_terima" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group pmd-textfield">
                                    <label class="control-label">Set Status</label>
                                    <select class="form-control select-add-tags pmd-select2-tags" id="control-label" ng-model="model.status">
                                        <option ng-if="model.status == 'Order'" value="Order">Order</option>
                                        <option ng-if="model.status == 'Packing' || model.status == 'Order'" value="Packing">Packing</option>
                                        <option ng-if="model.status == 'Pengiriman' || model.status == 'Packing' || model.status == 'Order'" value="Pengiriman">Pengiriman</option>
                                        <option value="Selesai">Selesai</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary pmd-ripple-effect btn-sm">Update Status</button>
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