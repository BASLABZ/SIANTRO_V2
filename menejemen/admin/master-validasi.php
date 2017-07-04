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
            // validasi tambah pengguna
            $('#tambah_pengguna').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            operator_name: {
                validators: {
                    notEmpty: {
                        message: 'Nama Operator harus diisi'
                    }
                }
            },
            operator_username: {
                validators: {
                    notEmpty: {
                        message: 'Username harus diisi'
                    }
                }
            },
            operator_password: {
                validators: {
                    notEmpty: {
                        message: 'Password harus diisi'
                    }
                }
            },
             operator_placeofbirth: {
                validators: {
                    notEmpty: {
                        message: 'Tempat Lahir harus diisi'
                    }
                }
            },
             operator_dateofbirth: {
                validators: {
                    notEmpty: {
                        message: 'Tanggal Lahir harus diisi'
                    }
                }
            },
            operator_gender: {
                validators: {
                    notEmpty: {
                        message: 'Jenis Kelamin harus diisi'
                    }
                }
            },
            operator_address: {
                validators: {
                    notEmpty: {
                        message: 'Alamat harus diisi'
                    }
                }
            },
            operator_phonenumber: {
                validators: {
                    notEmpty: {
                        message: 'Nomor telepon harus diisi'
                    }
                }
            },
            operator_email: {
                validators: {
                    notEmpty: {
                        message: 'Email harus diisi'
                    }
                }
            },
            operator_religion: {
                validators: {
                    notEmpty: {
                        message: 'Agama harus diisi'
                    }
                }
            },
            operator_website: {
                validators: {
                    notEmpty: {
                        message: 'Website harus diisi'
                    }
                }
            },
            operator_position: {
                validators: {
                    notEmpty: {
                        message: 'Jabatan harus diisi'
                    }
                }
            },
            operator_image: {
                validators: {
                    notEmpty: {
                        message: 'Foto harus diisi'
                    }
                }
            },
             operator_status: {
                validators: {
                    notEmpty: {
                        message: 'Status harus diisi'
                    }
                }
            },
             operator_level: {
                validators: {
                    notEmpty: {
                        message: 'Level Operator harus diisi'
                    }
                }
            }

        }
    });
      });
</script>