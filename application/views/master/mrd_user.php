<?php

$path = base_url('template1/');

?>



<style type="text/css">
  #profile-container {

    overflow: hidden;

  }

  #profile-container img {

    width: 150px;

    height: 140px;

  }

  #imageUpload {

    display: none;

  }
</style>

<div class="content-body" style="margin-top: -1%;">

  <!-- Justified With Top Border start -->

  <section id="basic-tabs-components">

    <div class="row match-height">

      <div class="col-xl-12 col-lg-12">

        <div class="card">

          <div class="card-header">

            <h4 class="card-title">MRD Attachment</h4>

          </div>


          <div class="col-xl-12 col-lg-12">


            <input type="hidden" name="csrf_test_name" id="csrf_test_name"
              value="<?php echo $this->security->get_csrf_hash(); ?>">

            <div class="row">
            <div class="col-sm-2 col-md-3">
                                                            <div class="form-group">
                                                                <label for="lastname">Select Search: <span class="text-danger">*</span></label>
                                                                    <select class="form-control" name="search" id="search" onchange="getselectedval(this.value);">
                                                                        <option value="1">MRD Number</option>
                                                                        <option value="2">Phone number</option>
                                                                        <option value="3">Address Search</option>
                                                                        <option value="4">Barcode</option>
                                                                    </select>
                                                            </div>
                                                         </div>
                                                          <div class="col-sm-2 col-md-3">
                                                            <div class="form-group">
                                                                <label for="lastname">Search: <span class="text-danger">*</span></label>
                                                               <select onchange="getpatientdetails(this.value);" style="width:100%;" class="form-control form-control-xl input-xl select2 clientname_pat" name="patient_registration_id" id="patient_registration_id" onchange="getpatientdetails(this.value);">
                                                                   <option value="">Select Patient MRD NOS</option>
                                                                  
                                                               </select>
                                                            </div>
                                                         </div>

              <!-- <div class="col-sm-2 col-md-3">

                <div class="form-group">

                  <label for="lastname">Select Search: <span class="text-danger">*</span></label>

                  <select class="form-control select2" name="search" id="search" onchange="getselectedval(this.value);">

                    <option value="1">MRD Number</option>

                    <option value="2">Phone number</option>

                    <option value="3">Address Search</option>

                    <option value="4">Barcode</option>

                  </select>

                </div>

              </div>

              <div class="col-sm-2 col-md-3">

                <div class="form-group">

                  <label for="lastname">Search: <span class="text-danger">*</span></label>

                  <select class="form-control select2" name="patient_registration_id" id="patient_registration_id"
                    onchange="getpatientdetails(this.value);">

                    <option value="">Select Patient MRD NOS</option>


                    <?php if ($mrdnos) {
                      foreach ($mrdnos as $data) { ?>

                    <option value="<?php echo $data['patient_registration_id']; ?>">
                      <?php echo $data['mrdno']; ?>
                    </option>

                    <?php }
                    } ?>

                  </select>

                </div> -->






              </div>



            </div>
            <div id="last_appointmentdetails">

            </div>

            <div id="view_file">

            </div>


            <div id="delete_file">


            </div>
            <div id="delete_view_file"></div>
          </div>

  </section>

  <!-- Justified With Top Border end -->

</div>

<script type="text/javascript">

  $(document).ready(function () {
    getselectedval(1);


  });



  function getselectedval(val) {
    $('#view_file').html('');
    $('#delete_file').html('');
    $('#delete_view_file').html('');
    $("#overlay").fadeIn(300);

    $.ajax({

      type: "POST",

      url: 'Common_controller/getsearchval',

      dataType: "json",

      data: { getid: val, csrf_test_name: $('#csrf_test_name').val() },

      success: function (data) {

        $("#overlay").fadeOut(300);

        if (data.msg != '') {
          console.log("patient_registration_id");

          $('#patient_registration_id').html(data.msg);

        } else if (data.error != '') {

          Swal.fire({ title: "Warning!", text: "" + data.error + "", type: "warning", confirmButtonClass: "btn btn-primary", buttonsStyling: !1 });

        } else if (data.error_message) {

          var error = data.error_message;

          var err_str = '';

          for (var key in error) {

            err_str += error[key] + '\n';

          }

          Swal.fire({ title: "Info!", text: "" + err_str + "", type: "info", confirmButtonClass: "btn btn-primary", buttonsStyling: !1 });

        }



      },

      error: function (error) {

        Swal.fire({ title: "Info!", text: "Network Busy", type: "info", confirmButtonClass: "btn btn-primary", buttonsStyling: !1 });

        $("#overlay").fadeOut(300);

      }

    });

  }
  function getpatientdetails(val) {

    $("#overlay").fadeIn(300);

    $.ajax({

      type: "POST",

      url: 'Mrd_user/getpatientdetails',

      dataType: "json",

      data: { getid: val, csrf_test_name: $('#csrf_test_name').val() },

      success: function (data) {

        $("#overlay").fadeOut(300);

        if (data.msg != '') {


          $('#last_appointmentdetails').html(data.msg);
          $('#view_file').html('');
          $('#delete_file').html('');
          $('#delete_view_file').html('');

        } else if (data.error != '') {

          Swal.fire({ title: "Warning!", text: "" + data.error + "", type: "warning", confirmButtonClass: "btn btn-primary", buttonsStyling: !1 });

        } else if (data.error_message) {

          var error = data.error_message;

          var err_str = '';

          for (var key in error) {

            err_str += error[key] + '\n';

          }

          Swal.fire({ title: "Info!", text: "" + err_str + "", type: "info", confirmButtonClass: "btn btn-primary", buttonsStyling: !1 });

        }



      },

      error: function (error) {

        Swal.fire({ title: "Info!", text: "Network Busy", type: "info", confirmButtonClass: "btn btn-primary", buttonsStyling: !1 });

        $("#overlay").fadeOut(300);

      }

    });

  }


  function saveFile() {

    $('#view_file').html('');
    $('#delete_file').html('');
    $('#delete_view_file').html('');
    $("#overlay").fadeIn(300);

    var formData = new FormData();
    var filesLength = document.getElementById('file_input').files.length;
    console.log(filesLength);
    if (filesLength == 0) {
      Swal.fire({ title: "Info!", text: "No Files Selected", type: "info", confirmButtonClass: "btn btn-primary", buttonsStyling: !1 });

      $("#overlay").fadeOut(300);
    }
    else {
      for (var i = 0; i < filesLength; i++) {
        formData.append("files[]", document.getElementById('file_input').files[i]);

      }
      formData.append("file_patient", $('#file_patient').val());
       formData.append("csrf_test_name", $('#csrf_test_name').val());

      $.ajax({

        type: "POST",

        url: 'Mrd_user/fileSubmit',

        mimeType: "multipart/form-data",
        //    data:$('#fileUploadForm').serialize(),
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {

          $("#overlay").fadeOut(300);

          if (data.msg != '') {

            //  $('#view_file').html(data.msg);
            Swal.fire({ title: "success", text: "" + "File Uploaded Sucessfully!!" + "", type: "success", confirmButtonClass: "btn btn-success", buttonsStyling: !1 });

          } else if (data.error != '') {

            Swal.fire({ title: "Warning!", text: "" + data.error + "", type: "warning", confirmButtonClass: "btn btn-primary", buttonsStyling: !1 });

          } else if (data.error_message) {

            var error = data.error_message;

            var err_str = '';

            for (var key in error) {

              err_str += error[key] + '\n';

            }

            Swal.fire({ title: "Info!", text: "" + err_str + "", type: "info", confirmButtonClass: "btn btn-primary", buttonsStyling: !1 });

          }



        },

        error: function (error) {

          Swal.fire({ title: "Info!", text: "Network Busy", type: "info", confirmButtonClass: "btn btn-primary", buttonsStyling: !1 });

          $("#overlay").fadeOut(300);

        }

      });
    }
  }

  //ViewFile

  function viewFile() {
    $('#delete_file').html('');
    $('#delete_view_file').html('');
    // e.preventDefault();
    $("#overlay").fadeIn(300);


    $.ajax({

      type: "POST",

      url: 'Mrd_user/viewFile',

      dataType: "json",

      data: { getid: $('#file_patient').val(), csrf_test_name: $('#csrf_test_name').val() },

      success: function (data) {

        $("#overlay").fadeOut(300);

        if (data.msg != '') {

          $('#view_file').html(data.msg);

        } else if (data.error != '') {

          Swal.fire({ title: "Warning!", text: "" + data.error + "", type: "warning", confirmButtonClass: "btn btn-primary", buttonsStyling: !1 });

        } else if (data.error_message) {

          var error = data.error_message;

          var err_str = '';

          for (var key in error) {

            err_str += error[key] + '\n';

          }

          Swal.fire({ title: "Info!", text: "" + err_str + "", type: "info", confirmButtonClass: "btn btn-primary", buttonsStyling: !1 });

        }



      },

      error: function (error) {

        Swal.fire({ title: "Info!", text: "Network Busy", type: "info", confirmButtonClass: "btn btn-primary", buttonsStyling: !1 });

        $("#overlay").fadeOut(300);

      }

    });




  }

  function deleteFile() {
    $('#view_file').html('');
    $('#delete_view_file').html('');

    // e.preventDefault();
    $("#overlay").fadeIn(300);


    $.ajax({

      type: "POST",

      url: 'Mrd_user/deleteFile',

      dataType: "json",

      data: { getid: $('#file_patient').val(), csrf_test_name: $('#csrf_test_name').val() },

      success: function (data) {

        $("#overlay").fadeOut(300);

        if (data.msg != '') {

          $('#delete_file').html(data.msg);

        } else if (data.error != '') {

          Swal.fire({ title: "Warning!", text: "" + data.error + "", type: "warning", confirmButtonClass: "btn btn-primary", buttonsStyling: !1 });

        } else if (data.error_message) {

          var error = data.error_message;

          var err_str = '';

          for (var key in error) {

            err_str += error[key] + '\n';

          }

          Swal.fire({ title: "Info!", text: "" + err_str + "", type: "info", confirmButtonClass: "btn btn-primary", buttonsStyling: !1 });

        }



      },

      error: function (error) {

        Swal.fire({ title: "Info!", text: "Network Busy", type: "info", confirmButtonClass: "btn btn-primary", buttonsStyling: !1 });

        $("#overlay").fadeOut(300);

      }

    });




  }

  //new added to desplay image preview to delete
  function getFileName(val) {

    $("#overlay").fadeIn(300);


    $.ajax({

      type: "POST",

      url: 'Mrd_user/viewdeleteFile',

      dataType: "json",

      data: { filename: val, patient_id: $('#file_patient_id').val(), csrf_test_name: $('#csrf_test_name').val() },

      success: function (data) {

        $("#overlay").fadeOut(300);

        if (data.msg != '') {

          //   Swal.fire({ title: "info!", text: "Deleted uccessfully", type: "warning", confirmButtonClass: "btn btn-primary", buttonsStyling: !1 });

          $('#delete_view_file').html(data.msg);

        } else if (data.error != '') {

          Swal.fire({ title: "Warning!", text: "" + data.error + "", type: "warning", confirmButtonClass: "btn btn-primary", buttonsStyling: !1 });

        } else if (data.error_message) {

          var error = data.error_message;

          var err_str = '';

          for (var key in error) {

            err_str += error[key] + '\n';

          }

          Swal.fire({ title: "Info!", text: "" + err_str + "", type: "info", confirmButtonClass: "btn btn-primary", buttonsStyling: !1 });

        }



      },

      error: function (error) {

        Swal.fire({ title: "Info!", text: "Network Busy", type: "info", confirmButtonClass: "btn btn-primary", buttonsStyling: !1 });

        $("#overlay").fadeOut(300);

      }

    });

  }
  //deletedata
  function deletedata(val) {

    $("#overlay").fadeIn(300);


    $.ajax({

      type: "POST",

      url: 'Mrd_user/deleteData',

      dataType: "json",

      data: { filename: $('#delete_file_name').val(), patient_id: $('#delete_patient_id').val(), csrf_test_name: $('#csrf_test_name').val() },

      success: function (data) {

        $("#overlay").fadeOut(300);

        if (data.msg != '') {

          $('#delete_view_file').html('');
          Swal.fire({ title: "info!", text: "Deleted uccessfully", type: "warning", confirmButtonClass: "btn btn-primary", buttonsStyling: !1 });

          deleteFile();
          //  getFileName( $('#delete_patient_id').val());


        } else if (data.error != '') {

          Swal.fire({ title: "Warning!", text: "" + data.error + "", type: "warning", confirmButtonClass: "btn btn-primary", buttonsStyling: !1 });

        } else if (data.error_message) {

          var error = data.error_message;

          var err_str = '';

          for (var key in error) {

            err_str += error[key] + '\n';

          }

          Swal.fire({ title: "Info!", text: "" + err_str + "", type: "info", confirmButtonClass: "btn btn-primary", buttonsStyling: !1 });

        }



      },

      error: function (error) {

        Swal.fire({ title: "Info!", text: "Network Busy", type: "info", confirmButtonClass: "btn btn-primary", buttonsStyling: !1 });

        $("#overlay").fadeOut(300);

      }

    });

  }
</script>

<script type="text/javascript">



  $("body").removeClass(" vertical-layout vertical-menu 2-columns fixed-navbar pace-done menu-expanded").addClass("vertical-layout vertical-menu 2-columns fixed-navbar pace-done menu-collapsed");

</script>



</script>