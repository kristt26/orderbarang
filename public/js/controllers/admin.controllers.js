angular.module('adminctrl', [])
    // Admin
    .controller('dashboardController', dashboardController)
    .controller('barangController', barangController)
    .controller('supplierController', supplierController)
    .controller('pegawaiController', pegawaiController)
    .controller('pembelianController', pembelianController)
    .controller('customerController', customerController)
    .controller('orderController', orderController)
    .controller('pesananController', pesananController)
    ;

function dashboardController($scope, dashboardServices) {
    $scope.$emit("SendUp", "Dashboard");
    $scope.datas = {};
    $scope.title = "Dashboard";
    // dashboardServices.get().then(res=>{
    //     $scope.datas = res;
    // })
}

function barangController($scope, barangServices, pesan, helperServices) {
    $scope.$emit("SendUp", "Pembobotan Faktor");
    $scope.datas = {};
    $scope.model = {};
    barangServices.get().then((res) => {
        $scope.datas = res;
    })
    $scope.save = () => {
        pesan.dialog('Yakin ingin?', 'Yes', 'Tidak').then(res => {
            if ($scope.model.id) {
                barangServices.put($scope.model).then(res => {
                    $scope.model = {};
                    pesan.Success("Berhasil mengubah data");
                })
            } else {
                barangServices.post($scope.model).then(res => {
                    $scope.model = {};
                    pesan.Success("Berhasil menambah data");
                })
            }
        })
    }

    $scope.edit = (item) => {
        $scope.model = angular.copy(item);
    }

    $scope.delete = (param) => {
        pesan.dialog('Yakin ingin?', 'Ya', 'Tidak').then(res => {
            klasifikasiServices.deleted(param).then(res => {
                pesan.Success("Berhasil menghapus data");
            })
        });
    }

    $scope.subKlasifikasi = (param) => {
        document.location.href = helperServices.url + "admin/sub_klasifikasi/data/" + param.id;
    }
}

function supplierController($scope, supplierServices, pesan, helperServices) {
    $scope.$emit("SendUp", "Pembobotan Faktor");
    $scope.datas = {};
    $scope.model = {};
    supplierServices.get().then((res) => {
        $scope.datas = res;
    })
    $scope.save = () => {
        pesan.dialog('Yakin ingin?', 'Yes', 'Tidak').then(res => {
            if ($scope.model.id) {
                supplierServices.put($scope.model).then(res => {
                    $scope.model = {};
                    pesan.Success("Berhasil mengubah data");
                })
            } else {
                supplierServices.post($scope.model).then(res => {
                    $scope.model = {};
                    pesan.Success("Berhasil menambah data");
                })
            }
        })
    }

    $scope.edit = (item) => {
        $scope.model = angular.copy(item);
    }

    $scope.delete = (param) => {
        pesan.dialog('Yakin ingin?', 'Ya', 'Tidak').then(res => {
            supplierServices.deleted(param).then(res => {
                pesan.Success("Berhasil menghapus data");
            })
        });
    }
}

function pegawaiController($scope, pegawaiServices, pesan, helperServices) {
    $scope.$emit("SendUp", "Pembobotan Faktor");
    $scope.datas = {};
    $scope.model = {};
    pegawaiServices.get().then((res) => {
        $scope.datas = res;
    })
    $scope.save = () => {
        pesan.dialog('Yakin ingin?', 'Yes', 'Tidak').then(res => {
            if ($scope.model.id) {
                pegawaiServices.put($scope.model).then(res => {
                    $scope.model = {};
                    pesan.Success("Berhasil mengubah data");
                })
            } else {
                pegawaiServices.post($scope.model).then(res => {
                    $scope.model = {};
                    pesan.Success("Berhasil menambah data");
                })
            }
        })
    }

    $scope.edit = (item) => {
        $scope.model = angular.copy(item);
    }

    $scope.delete = (param) => {
        pesan.dialog('Yakin ingin?', 'Ya', 'Tidak').then(res => {
            pegawaiServices.deleted(param).then(res => {
                pesan.Success("Berhasil menghapus data");
            })
        });
    }
}

function pembelianController($scope, pembelianServices, pesan, helperServices) {
    $scope.$emit("SendUp", "Pembobotan Faktor");
    $scope.datas = {};
    $scope.model = {};
    pembelianServices.get().then((res) => {
        $scope.datas = res;
        console.log(res);
    })
    $scope.save = () => {
        pesan.dialog('Yakin ingin?', 'Yes', 'Tidak').then(res => {
            var item = angular.copy($scope.model);
            item.tanggal = helperServices.dateToString($scope.model.tanggal);
            if ($scope.model.id) {
                pembelianServices.put(item).then(res => {
                    $scope.model = {};
                    pesan.Success("Berhasil mengubah data");
                })
            } else {
                pembelianServices.post(item).then(res => {
                    $scope.model = {};
                    $("#tambah").modal('hide');
                    pesan.Success("Berhasil menambah data");
                })
            }
        })
    }

    $scope.edit = (item) => {
        $scope.model = angular.copy(item);
        $scope.model.tanggal = new Date($scope.model.tanggal);
        $scope.supplier = $scope.datas.supplier.find(x=>x.id==item.supplier_id)
        $scope.barang = $scope.datas.barang.find(x=>x.id==item.barang_id)
        $("#tambah").modal('show');
    }

    $scope.delete = (param) => {
        pesan.dialog('Yakin ingin?', 'Ya', 'Tidak').then(res => {
            pembelianServices.deleted(param).then(res => {
                pesan.Success("Berhasil menghapus data");
            })
        });
    }
}

function customerController($scope, customerServices, pesan, helperServices) {
    $scope.$emit("SendUp", "Pembobotan Faktor");
    $scope.datas = {};
    $scope.model = {};
    customerServices.get().then((res) => {
        $scope.datas = res;
    })
    $scope.save = () => {
        pesan.dialog('Yakin ingin?', 'Yes', 'Tidak').then(res => {
            if ($scope.model.id) {
                customerServices.put($scope.model).then(res => {
                    $scope.model = {};
                    pesan.Success("Berhasil mengubah data");
                })
            } else {
                customerServices.post($scope.model).then(res => {
                    $scope.model = {};
                    pesan.Success("Berhasil menambah data");
                })
            }
        })
    }

    $scope.edit = (item) => {
        $scope.model = angular.copy(item);
        $("#tambah").modal('show');
    }

    $scope.delete = (param) => {
        pesan.dialog('Yakin ingin?', 'Ya', 'Tidak').then(res => {
            customerServices.deleted(param).then(res => {
                pesan.Success("Berhasil menghapus data");
            })
        });
    }
}

function orderController($scope, orderServices, pesan, helperServices) {
    $scope.$emit("SendUp", "Pembobotan Faktor");
    $scope.datas = {};
    $scope.model = {};
    $scope.barang = {};
    $scope.tanggal_pesan = new Date();
    orderServices.get().then((res) => {
        $scope.datas = res;
        console.log(res);
    })

    $scope.addQty = (param)=>{
        $scope.itemBarang = {nama: param.nama, qty:param.qty, barang_id: param.id, harga:parseFloat(param.harga)};
        $("#addQty").modal('show');
    }
    $scope.total = 0;
    
    $scope.add = ()=>{
        if(!$scope.model.detail){
            $scope.model.detail = [];
            $scope.model.detail.push($scope.itemBarang);
            $scope.barang = {};
        }else{
            $scope.model.detail.push($scope.itemBarang);
            $scope.barang = {};
        }
        $scope.total+= ($scope.itemBarang.qty * $scope.itemBarang.harga);
        $("#addQty").modal('hide');
    }

    $scope.setDetail = (param)=>{
        $scope.dataDetail = param.detail;
        console.log($scope.dataDetail);
    }

    $scope.pay = (param)=>{
        $scope.itemPay = param;
        $scope.itemPay.tanggal_pesan = new Date($scope.itemPay.tanggal_pesan);
        console.log($scope.dataDetail);
        $("#pay").modal('show');
    }

    $scope.show = (param)=>{
        console.log(param);
    }
    
    $scope.save = () => {
        pesan.dialog('Yakin ingin?', 'Yes', 'Tidak').then(res => {
            $scope.model.tanggal_pesan = helperServices.dateToString($scope.tanggal_pesan);
            $scope.model.tagihan = $scope.total;
            if ($scope.model.id) {
                orderServices.put($scope.model).then(res => {
                    $scope.model = {};
                    $scope.total = 0;
                    pesan.Success("Berhasil mengubah data");
                })
            } else {
                orderServices.post($scope.model).then(res => {
                    $scope.model.detail.forEach(element => {
                        var barang = $scope.datas.barang.find(x=>x.id==element.barang_id)
                        if(barang) barang.stok = barang.stok-element.qty;
                    });
                    $scope.model = {};
                    $scope.tanggal_pesan = new Date();
                    $scope.total = 0;
                    pesan.Success("Berhasil menambah data");
                })
            }
        })
    }

    $scope.bayar = ()=>{
        $scope.model.pesanan_id = $scope.itemPay.id;
        $scope.model.tanggal = helperServices.dateToString(new Date());
        orderServices.bayar($scope.model).then(res=>{

        })
    }

    $scope.edit = (item) => {
        $scope.model = angular.copy(item);
        $("#tambah").modal('show');
    }

    $scope.delete = (param) => {
        pesan.dialog('Yakin ingin?', 'Ya', 'Tidak').then(res => {
            orderServices.deleted(param).then(res => {
                pesan.Success("Berhasil menghapus data");
            })
        });
    }
}

function pesananController($scope, pesananServices, pesan, helperServices) {
    $scope.$emit("SendUp", "Pembobotan Faktor");
    $scope.datas = {};
    $scope.model = {};
    $scope.barang = {};
    $scope.model.tanggal_pesan = new Date();
    pesananServices.get().then((res) => {
        $scope.datas = res;
        $scope.dataStatus = $scope.datas.filter(x=>x.status == "Order")
        console.log(res);
    })

    $scope.setData = (param)=>{
        $scope.dataStatus = $scope.datas.filter(x=>x.status == param);
    }


    $scope.setDetail = (param)=>{
        $scope.dataDetail = param.detail;
    }

    $scope.setStatus = (param)=>{
        $scope.model = angular.copy(param);
        $scope.model.pengiriman = {};
        console.log($scope.model);
    }

    
    $scope.save = (param) => {
        pesan.dialog('Yakin ingin?', 'Yes', 'Tidak').then(res => {
            if (param=="Status") {
                pesananServices.put($scope.model).then(res => {
                    var index = $scope.dataStatus.indexOf($scope.model);
                    $scope.dataStatus.splice(index, 1);
                    $scope.model = {};
                    $("#setStatus").modal('hide');
                    pesan.Success("Berhasil mengubah data");
                })
            } else {
                pesananServices.post($scope.model).then(res => {
                    var index = $scope.dataStatus.indexOf($scope.model);
                    $scope.dataStatus.splice(index, 1);
                    $scope.model = {};
                    $("#pengirim").modal('hide');
                    pesan.Success("Berhasil mengubah data");
                })
            }
        })
    }

    $scope.cetak_manifest = (item)=>{
        window.open(helperServices.url + "pesanan/cetak_manifest/" + item.id, '_blank');
    }

    $scope.edit = (item) => {
        $scope.model = angular.copy(item);
        $("#tambah").modal('show');
    }
    

    $scope.delete = (param) => {
        pesan.dialog('Yakin ingin?', 'Ya', 'Tidak').then(res => {
            orderServices.deleted(param).then(res => {
                pesan.Success("Berhasil menghapus data");
            })
        });
    }

    $scope.validasi = ()=>{
        pesananServices.validasi($scope.model).then(res=>{
            var index = $scope.dataStatus.indexOf($scope.model);
            $scope.dataStatus.splice(index, 1);
            $scope.model = {};
            $("#pembayaran").modal('hide');
            pesan.Success("Berhasil mengubah data");
        })
    }
}