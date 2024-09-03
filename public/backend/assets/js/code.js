$(function() {
  $(document).on('click', '#delete', function(e) {
      e.preventDefault();
      var link = $(this).attr("href");

      Swal.fire({
          title: 'Apakah anda yakin?',
          text: "Hapus data ini?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Iya, hapus!',
          cancelButtonText: 'Batalkan',
          showClass: {
              popup: 'animate__animated animate__fadeInDown'
          },
          hideClass: {
              popup: 'animate__animated animate__fadeOutUp'
          }
      }).then((result) => {
          if (result.isConfirmed) {
              Swal.fire({
                  title: 'Terhapus!',
                  text: 'File anda telah terhapus.',
                  icon: 'success',
                  showClass: {
                      popup: 'animate__animated animate__fadeInDown'
                  },
                  hideClass: {
                      popup: 'animate__animated animate__fadeOutUp'
                  }
              }).then(() => {
                  window.location.href = link;
              });
          }
      });
  });
});
