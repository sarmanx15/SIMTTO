// pilih code pelayanan
$(document).on('click', '#btn-pilih-code', function() {
    let id_pelayanan = $(this).data('id_pelayanan');
    let name = $(this).data('name');
    let type = $(this).data('type');
    let keluhan = $(this).data('keluhan');
    
    $('#id_pelayanan').val(id_pelayanan);
    $('#name').val(name);
    $('#type').val(type);
    $('#keluhan').val(keluhan);
});
// Pilih barang penjualan
$(document).on('click', '#btn-pilih-barang', function() {
    let code=$(this).data('id_barang');
    let id_barang = $(this).data('code');
    let name = $(this).data('name');
    let merk = $(this).data('merk');
    let harga_jual = $(this).data('harga_jual');
    let harga_beli = $(this).data('harga_beli');
    let stock = $(this).data('stock');

    $('#code').val(code);
    $('#id_barang').val(id_barang);
    $('#name').val(name);
    $('#merk').val(merk);
    $('#harga').val(harga_jual);
    $('#hb').val(harga_beli);
    $('#stock').val(stock);
});
// Mengambil data byCode penjualan
var value_kode = document.getElementById('id_barang').value;
$("#id_barang").keyup(function() {
    console.log("code = " + $('#id_barang').val())
    $.ajax({
        url: '/api/barang/' + $('#id_barang').val(),
        success: function(data) {
            $('#code').val(data['id_barang']);
            $('#name').val(data['name']);
            $('#merk').val(data['merk']);
            $('#harga').val(data['harga_jual']);
            $('#hb').val(data['harga_beli']);
            $('#status').val(data['status']);
            console.log(data['name']);
        }
    });
})

// Mengambil data byCode penjualan

// bayar