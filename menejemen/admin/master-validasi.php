 <script type="text/javascript">

      $(document).ready(function() {
            // validasi ruangan / rooms
          $('#tambah_ruangan').bootstrapValidator({
              message: 'This value is not valid',
              feedbackIcons: {
                  valid: 'glyphicon glyphicon-ok',
                  invalid: 'glyphicon glyphicon-remove',
                  validating: 'glyphicon glyphicon-refresh'
              },
              fields: {
                  rooms_name: {
                      //message: 'The username is not valid',
                      validators: {
                          notEmpty: {
                              message: 'Nama Ruangan harus diisi'
                          }
                      }
                  },
                  rooms_note: {
                      //message: 'The username is not valid',
                      validators: {
                          notEmpty: {
                              message: 'Keterangan harus diisi'
                          }
                      }
                  }
              }
          });

          // validator silabus
            $('#defaultFormSilabus').bootstrapValidator({
                    message: 'This value is not valid',
                    feedbackIcons: {
                        valid: 'glyphicon glyphicon-ok',
                        invalid: 'glyphicon glyphicon-remove',
                        validating: 'glyphicon glyphicon-refresh'
                    },
                    fields: {   
                      coursename_id_fk: {
                            validators: {
                                notEmpty: {
                                    message: 'Nama Kursus harus diisi'
                                }
                            }
                        },
                        silabus_purpose: {
                            validators: {
                                notEmpty: {
                                    message: 'Judul Sulabus harus diisi'
                                }
                            }
                        },
                         silabus_topic: {
                            validators: {
                                notEmpty: {
                                    message: 'Topik Silabus harus diisi'
                                }
                            }
                        },
                         silabus_file: {
                            validators: {
                                notEmpty: {
                                    message: 'File harus diisi'
                                }
                            }
                        }
                    }
                });
      });
</script>