var cust_id = $('#cust_id');

$('#cust_src').focus();
$('#cust_src').autocomplete({
    source: url + 'cust_master/cust_suggest',
    highlightClass: "auto-matches",
    minLength: 2,
    maxShowItems: 15, // Make list height fit to 5 items when items are over 5.
    select: function(event, ui) {
        $(this).val('');
        $('#cust_id').val(ui.item.cust_id);        
        $('#cust_name').val(ui.item.cust_name);        

        get_cust_master();
        return false;
    },
    response: function(event, ui) {
        if (!ui.content.length) {
            var noResult = {
                value: '',
                label: '-- Data tidak dcustukan --'
            };
            ui.content.push(noResult);
        }
    }
});


$('#cust_init').autocomplete({
    source: url + 'cust_master/cust_init_suggest',
    highlightClass: "auto-matches",
    minLength: 2,
    maxShowItems: 15, // Make list height fit to 5 items when items are over 5.
    select: function(event, ui) {
        $(this).val('');
        $('#cust_init').val(ui.item.value);             

        return false;
    }
});

$('#add_master').click(function() {
    $('#form_master_cust').trigger('reset');
    $.post(url + 'cust_master/new_cust_id', {
        'param1': 'value1'
    }, function(result) {
        var obj = JSON.parse(result);
        $('#cust_id').val(obj.cust_id);
        $('#cust_coa_id').val(obj.cust_coa_id);
        $('#cust_init').focus();
    });
});

$('#save_master').click(function() {
    $('#form_master_cust').validate({
        ignore: ':not(:visible)',
        rules: {
            cust_id: 'required',
            cust_name: 'required',
            cust_init: 'required'
        },
        messages: {
            cust_id: 'Cust ID tidak boleh kosong',
            cust_name: 'Nama customer tidak boleh kosong',
            cust_init: 'Initial tidak boleh kosong'
        },
        errorPlacement: function(label, element) {
            label.addClass('fas fa-arrow-alt-circle-up text-danger');
            label.insertAfter(element);
        },
        wrapper: 'span'

    });

    if ($('#form_master_cust').valid()) {
        $.post(url + 'cust_master/save_cust_master', $('#form_master_cust').serialize(), function(result) {
            toastr.success('Data berhasil disimpan...!');
            get_cust_master();
        });
    } else {
        toastr.error('Data belum lengkap...!');
    }

});

function get_cust_master() {
    $.post(url + 'cust_master/get_cust_master', {
        'cust_id': cust_id.val()
    }, function(result) {
        var obj = JSON.parse(result);
        $('#cust_type').val(obj.cust_type);
        $('#cust_brand').val(obj.cust_brand);
        $('#cust_cat').val(obj.cust_cat);
        $('#cust_init').val(obj.cust_init);
        $('#cust_coa_id').val(obj.cust_coa_id);
        $('#cust_ph1').val(obj.cust_ph1);
        $('#cust_ph2').val(obj.cust_ph2);
        $('#cust_fax').val(obj.cust_fax);
        $('#cust_email').val(obj.cust_email);
        $('#prov_id').val(obj.cust_prov_id);
        get_kabupaten(obj.cust_prov_id, obj.cust_kab_id, obj.cust_kec_id, obj.cust_desa_id);
        $('#cust_pay_term').val(obj.cust_pay_term);
        // $('#kec_id').val(obj.cust_kec_id);
        $('#cust_kd_pos').val(obj.cust_kd_pos);
        $('#cust_address').val(obj.cust_address);

        $('#cust_cp').val(obj.cust_cp);
        $('#cust_cp_ph').val(obj.cust_cp_ph);
        $('#cust_cp_email').val(obj.cust_cp_email);
        $('#cust_fin').val(obj.cust_fin);
        $('#cust_fin_ph').val(obj.cust_fin_ph);
        $('#cust_fin_email').val(obj.cust_fin_email);
        $('#cust_dir').val(obj.cust_dir);
        $('#cust_dir_ph').val(obj.cust_dir_ph);
        $('#cust_dir_email').val(obj.cust_dir_email);
        $('#cust_bank').val(obj.cust_bank);
        $('#cust_bank_acc').val(obj.cust_bank_acc);
        $('#cust_npwp').val(obj.cust_npwp);
        $('#cust_note').val(obj.cust_note);
        $('#credit_limit').val(obj.credit_limit);

        if (obj.black_list == '1') {
            $('#cust_blacklist').fadeIn(250);
            $('#cust_good').fadeOut(250);
        } else {
            $('#cust_blacklist').fadeOut(250);
            $('#cust_good').fadeIn(250);
        }

        get_cust_img();
    });
}

function cust_status(status) {
    $.post(url + 'cust_master/cust_status', {
        'cust_id': $('#cust_id').val(),
        'status': status
    }, function(result) {
        toastr.success('Data berhasil disimpan...!');
    });

    if (status == '1') {
        $('#cust_blacklist').fadeIn(250);
        $('#cust_good').fadeOut(250);
    } else {
        $('#cust_blacklist').fadeOut(250);
        $('#cust_good').fadeIn(250);
    }
}

function upload_emp_img() {
    if (cust_id.val() !== '') {
        $('#scroll_modal').modal();
        $('#scroll_modal').ready(function() {
            $('#scroll_modal_save').attr('onclick', ''); /* Change value attribute */
            $('#modal_title').html('Upload cust Image');

            let isi = '<form id="form_tambah_data" class="col-md-9">' +
                '<div id="dropzone" class="dropzone">'
            '<div class="dz-message text-info blink_me" data-dz-message>' +
            '<span>Letakkan file di sini untuk mengunggah</span>' +
            '</div>' +
            '<div class="fallback">' +
            '<input name="file" type="file" multiple>' +
            '</div>' +
            '</div>' +
            '<hr>' +
            '<div class="form-group">' +
            '<label for="keterangan">Keterangan</label>' +
            '<textarea class="form-control" id="keterangan" name="keterangan" rows="3" ></textarea>' +
            '</div>' +
            '<button class="btn btn-primary btn-sm mt-3" id="btn_save">Simpan</button>' +
            '</form>';

            $('#modal_body').html(isi);
            $('#modal_body').ready(function() {
                Dropzone.autoDiscover = false;
                var foto_upload = new Dropzone(".dropzone", {
                    url: url + "cust_master/upload_cust_image",
                    parallelUploads: 99,
                    method: "post",
                    // uploadMultiple: true,
                    // acceptedFiles: "image/*,video/*",
                    acceptedFiles: "image/*",
                    paramName: "up_file",
                    dictInvalidFileType: "Type file ini tidak dizinkan",
                    addRemoveLinks: true,
                    autoProcessQueue: false,
                    timeout: 0,
                });

                foto_upload.on("sending", function(file, b, dom) {
                    dom.append('nama_file', file['name']);
                    dom.append('cust_id', cust_id.val());
                });

                foto_upload.on("complete", function(a, b, c) {
                    toastr.success('Data berhasil disimpan');
                    $('#scroll_modal').modal('hide');
                    get_cust_img();
                    foto_upload.removeFile(a);
                });

                foto_upload.on("queuecomplete", function() {
                    // get_kegiatan();
                    // $.ajax({
                    //     url: url + 'admin/kegiatan_bersama/send_notif',
                    //     global: false
                    // });
                    // db.ref('action/kegiatan_bersama/timestamp').set(new Date().getTime());
                });

                $(document).on("click", "#scroll_modal_save", function(e) {
                    e.preventDefault();
                    foto_upload.processQueue();
                });
            })



        });
    } else {
        toastr.error('Belum ada cust yg dipilih...!');
    }
}

function get_cust_img() {
    var link = '';
    $.post(url + 'cust_master/get_cust_img', {
        'cust_id': cust_id.val()
    }, function(result) {
        if (result !== '') {
            link = url + 'assets/images/cust_images/' + result;
        } else {
            link = url + 'assets/images/cust_images/no_image.jpg';
        }

        $("#cust_image").attr("src", link);
    });
}

function customer(n) {
    if (cust_id.val() !== '') {
        $.post(url + 'cust_master/cust_customer', {
            'cust_id': cust_id.val()
        }, function(result) {
            $('#cust_sub_form').html(result);
        });
    } else {
        toastr.error('Belum ada cust yg dipilih...!');
    }
}

function bill_of_material(n) {
    if (cust_id.val() !== '') {
        $('#cust_sub_form').html('bill_of_material');
    } else {
        toastr.error('Belum ada cust yg dipilih...!');
    }
}

function cicle_time(n) {
    if (cust_id.val() !== '') {
        $('#cust_sub_form').html('cicle_time');
    } else {
        toastr.error('Belum ada cust yg dipilih...!');
    }
}


function get_kabupaten(prov_id, kab_id, kec_id, desa_id) {
    $.post(url + 'cust_master/get_kabupaten', {
        'prov_id': prov_id,
        'kab_id': kab_id
    }, function(result) {
        $('#kab_id').html(result);
        $('#kab_id').ready(function() {
            get_kecamatan(kab_id, kec_id, desa_id);
        });
    });
}

function get_kecamatan(kab_id, kec_id, desa_id) {
    $.post(url + 'cust_master/get_kecamatan', {
        'kab_id': kab_id,
        'kec_id': kec_id
    }, function(result) {
        $('#kec_id').html(result);
        $('#kec_id').ready(function() {
            get_desa(kec_id, desa_id);
        });
    });
}

function get_desa(kec_id, desa_id) {
    $.post(url + 'cust_master/get_desa', {
        'kec_id': kec_id,
        'desa_id': desa_id
    }, function(result) {
        $('#desa_id').html(result);
        $('#desa_id').ready(function() {
            // get_desa(kab_id, kec_id);
        });
    });
}