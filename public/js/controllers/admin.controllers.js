angular.module('adminctrl', [])
    // Admin
    .controller('dashboardController', dashboardController)
    .controller('barangController', barangController)
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
    $scope.model.tanggal_pesan = new Date();
    orderServices.get().then((res) => {
        $scope.datas = res;
        console.log(res);
    })

    $scope.addQty = (param)=>{
        $scope.itemBarang = {nama: param.nama, qty:param.qty, barang_id: param.id};
        $("#addQty").modal('show');
    }
    
    $scope.add = ()=>{
        if(!$scope.model.detail){
            $scope.model.detail = [];
            $scope.model.detail.push($scope.itemBarang);
            $scope.barang = {};
        }else{
            $scope.model.detail.push($scope.itemBarang);
            $scope.barang = {};
        }
        $("#addQty").modal('hide');
    }

    $scope.setDetail = (param)=>{
        $scope.dataDetail = param.detail;
    }
    
    $scope.save = () => {
        pesan.dialog('Yakin ingin?', 'Yes', 'Tidak').then(res => {
            var item = angular.copy($scope.model);
            item.tanggal_pesan = helperServices.dateToString($scope.model.tanggal_pesan);
            if ($scope.model.id) {
                orderServices.put($scope.model).then(res => {
                    $scope.model = {};
                    pesan.Success("Berhasil mengubah data");
                })
            } else {
                orderServices.post(item).then(res => {
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
}