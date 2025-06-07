document.getElementById('btnApprove').addEventListener('click', function () {
    const url = '<?php echo URLROOT; ?>/eventHosters/approve_request/<?php echo $data["eventHoster"]->E_ID; ?>';
  
    Swal.fire({
      title: 'Are you sure?',
      text: 'You are about to approve the request.',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, approve it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = url;
        Swal.fire(
          'Approved!',
          'The request has been approved.',
          'success'
        );
      }
    });
  });
  
  document.getElementById('btnDeny').addEventListener('click', function () {
    const url = '<?php echo URLROOT; ?>/eventHosters/deny_request/<?php echo $data["eventHoster"]->E_ID; ?>';
  
    Swal.fire({
      title: 'Are you sure?',
      text: 'You are about to deny the request.',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, deny it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = url;
        Swal.fire(
          'Denied!',
          'The request has been denied.',
          'success'
        );
      }
    });
  });