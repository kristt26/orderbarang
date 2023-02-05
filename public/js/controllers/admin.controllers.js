angular.module('adminctrl', [])
    // Admin
    .controller('dashboardController', dashboardController)
    .controller('barangController', barangController)
    .controller('customerController', customerController)
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