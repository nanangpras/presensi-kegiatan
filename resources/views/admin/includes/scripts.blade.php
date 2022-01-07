<!-- Bootstrap core JavaScript -->
    <!--Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!--Boostrap -->
    <!-- <script src="/vendor/jquery/jquery.slim.min.js "></script> -->
    <script src="{{url('presensi/vendor/bootstrap/js/bootstrap.bundle.min.js')}} "></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js "></script>
    <script>
        AOS.init();
    </script>

    <script src="{{url('presensi/script/navbar-scroll.js')}}"></script>
    <script src="{{url('presensi/libraries/uikits/js/uikit.js')}}"></script>
    <!--Data Table-->
    <script src="{{url('presensi/vendor/datatables/DataTables-1.10.24/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('presensi/vendor/datatables/DataTables-1.10.24/js/dataTables.bootstrap4.min.js')}}"></script>

    <script src="{{url('presensi/vendor/datatables/Buttons-1.7.0/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{url('presensi/vendor/datatables/Buttons-1.7.0/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{url('presensi/vendor/datatables/JSZip-2.5.0/jszip.min.js')}}"></script>
    <script src="{{url('presensi/vendor/datatables/pdfmake-0.1.36/pdfmake.min.js')}}"></script>
    <script src="{{url('presensi/vendor/datatables/pdfmake-0.1.36/pdfmake.js')}}"></script>
    <script src="{{url('presensi/vendor/datatables/pdfmake-0.1.36/vfs_fonts.js')}}"></script>
    <script src="{{url('presensi/vendor/datatables/Buttons-1.7.0/js/buttons.html5.min.js')}}"></script>
    <script src="{{url('presensi/vendor/datatables/Buttons-1.7.0/js/buttons.print.min.js')}}"></script>
    <script src="{{url('presensi/vendor/datatables/Buttons-1.7.0/js/buttons.colVis.min.js')}}"></script>
    <!-- Table -->
    <script src="{{url('presensi/script/table.js')}}"></script>
    <!--DateRangePicker -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <!-- Date and Time -->
    <script src="{{url('presensi/script/date-picker.js')}}"></script>
    <script src="{{url('presensi/vendor/datatables/DateTime-1.0.3/js/dataTables.dateTime.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            new DateTime(document.getElementById('test'), {
                format: 'D MMM YYYY HH:mm'
            });
        });
    </script>
    <script>
        $("#menu-toggle ").click(function (e) {
            e.preventDefault();
            $("#wrapper ").toggleClass("toggled ");
        })
    </script>
    <script>
        $(document).ready(function () {
            $("#check-all").click(function () {
                $('input:checkbox').not(this).prop('checked', this.checked);
            });
        });
    </script>