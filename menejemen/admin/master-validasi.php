<script type="text/javascript">
$(document).ready(function() {
    // validasi tambah data kursus
    $('#defaultForm').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            coursename_title: {
                validators: {
                    notEmpty: {
                        message: 'Judul Kursus harus diisi'
                    }
                }
            },
             coursename_date: {
                validators: {
                    notEmpty: {
                        message: 'Tanggal Periode Kursus harus diisi'
                    }
                }
            },
             coursename_info: {
                validators: {
                    notEmpty: {
                        message: 'Deskripsi Kursus harus diisi'
                    }
                }
            },
             coursename_price: {
                validators: {
                    notEmpty: {
                        message: 'Biaya harus diisi'
                    }
                }
            },
            coursename_quota: {
                validators: {
                    notEmpty: {
                        message: 'Kuota Kursus harus diisi'
                    }
                }
            },
            coursename_status: {
                validators: {
                    notEmpty: {
                        message: 'Status Kursus harus diisi'
                    }
                }
            },

        }
    });
});
</script>