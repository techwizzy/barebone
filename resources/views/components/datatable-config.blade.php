
<script>
     $(document).ready(function() {


        var table = $('.dataTable').DataTable({
            processing: true,
            serverSide: true,
            dom: "<'row'<'col-sm-3'l><'col-sm-6 text-center'B><'col-sm-3'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                buttons: [ {
                extend:    'excel',
                text:      '<i class="mdi mdi-file-excel-outline text-success"></i>Excel',
                className: 'btn btn-flat btn-sm btn-light'
            },
            {
                extend:    'pdf',
                text:      '<i class="mdi mdi mdi-file-pdf-box-outline text-danger"></i>PDF',
                className: 'btn btn-flat btn-sm btn-light'
            },
            {
                extend:    'print',
                text:      '<i class="mdi mdi-printer text-primary"></i>Print',
                className: 'btn btn-flat btn-sm btn-light'
            },
            {
                extend:    'colvis',
                text:      '<i class="mdi mdi-eye-off-outline text-warning"></i>Columns',
                className: 'btn btn-flat btn-sm btn-light'
            },

        ],
        lengthMenu: [
            [10, 25, 50, -1],
            [10, 25, 50, 'All'],
        ]
        });

        table.buttons().container()
        .appendTo( $('div.eight.column:eq(0)', table.table().container()) );



  });


</script>
