$(document).ready(function () {
  // hapus btn-search
  $('#btn-search').hide();
  $('#spinner').hide();

  // event ketika search
  $('#search').on('keyup', function () {
    $('#spinner').show();
    //ajax menggunakan get
    $.get('ajax/mahasiswa.php?search=' + $('#search').val(),
      function (data) {
        $('#container').html(data);
        $('#spinner').hide();
      });
    // ajax menggunakan load
    //$('#container').load('ajax/mahasiswa.php?search=' + $('#search').val());

  });
});


$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})