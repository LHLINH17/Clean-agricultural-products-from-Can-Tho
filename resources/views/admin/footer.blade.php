<!-- jQuery -->
<script src="/template/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/template/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/template/admin/dist/js/adminlte.min.js"></script>

<script src="/template/admin/js/main.js"></script>

<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>

<script>
    $( function() {
        $( "#datepicker" ).datepicker({
            dateFormat:"yy-mm-dd",
            duration: "slow"
        });

    } );
    $( function() {
        $( "#datepicker2" ).datepicker({
            dateFormat:"yy-mm-dd",
            duration: "slow"
        });

    } );

</script>


<script type="text/javascript">
    $(document).ready(function (){
        chart30daysorder();
        var chart = new Morris.Line({
            element: 'myfirstchart',
            data: [
                { year: '2008', value: 20 },
                { year: '2009', value: 10 },
                { year: '2010', value: 5 },
                { year: '2011', value: 5 },
                { year: '2012', value: 20 }
            ],
            lineColor: ['#819C79', '#fc8710', '#FF6541', '#A4ADD3', '#766B56'],
            pointFillColors : ['#ffffff'],
            pointStrokeColor: ['black'],
            fillOpacity: 0.6,
            hideHover: 'auto',
            parseTime: false,
            xkey: 'period',
            ykeys: ['order', 'sales', 'profit', 'quantity'],
            behaveLikeLine: true,
            labels: ['don hang', 'doanh so', 'loi nhuan', 'so luong']
        });
        function chart30daysorder(){
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url:"{{ url('/filter-by-date') }}",
                method: "POST",
                dataType: "JSON",
                data:{_token:_token},
                success:function (data)
                {
                    chart.setData(data);
                }
            });
        }
    });
</script>

<script type="text/javascript">

    $('#btn-dashboard-filter').click(function (){

        var _token = $('input[name="_token"]').val();

        var from_date = $('#datepicker').val();
        // alert(from_date);
        var to_date = $('#datepicker2').val();

        $.ajax({
            url:"{{ url('/filter-by-date') }}",
            method: "POST",
            dataType: "JSON",
            data:{from_date:from_date, to_date:to_date, _token:_token},

            success:function (data)
            {
                chart.setData(data);
            }

        });
    });
</script>

<script>
    var ctx = document.getElementById('salesChart').getContext('2d');
    var data = {
        labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
        datasets: [{
            label: 'Doanh số',
            data: [1000000, 1500000, 2000000, 2500000, 3000000, 3500000, 4000000, 4500000, 5000000, 5500000, 6000000, 6500000],
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1
        }]
    };

    var chart = new Chart(ctx, {
        type: 'bar',
        data: data,
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>

<script>
    $(function(e){
        $('#select_all_ids').click(function (){
            $('.checkbox_ids').prop('checked',$(this).prop('checked'));
        });

        $('#deleteAllSelectedRecord').click(function (e){
            e.preventDefault();
            var all_ids  = [];
            $('input:checkbox[name=ids]:checked').each(function (){
                all_ids.push($(this).val());
            });

            $.ajax({
                url:"{{ route('product.delete') }}",
                type:"DELETE",
                data:{
                    ids:all_ids,
                    _token:'{{ csrf_token() }}'
                },
                success:function (response) {
                    $.each(all_ids,function (key,val){
                        $('#product_ids'+val).remove();
                    });
                }
            });
        });
    });

</script>

<script>
    $(function(e){
        $('#select_all_ids3').click(function (){
            $('.checkbox_ids').prop('checked',$(this).prop('checked'));
        });

        $('#deleteAllSelectedRecord3').click(function (e){
            e.preventDefault();
            var all_ids  = [];
            $('input:checkbox[name=ids3]:checked').each(function (){
                all_ids.push($(this).val());
            });

            $.ajax({
                url:"{{ route('menu.delete') }}",
                type:"DELETE",
                data:{
                    ids:all_ids,
                    _token:'{{ csrf_token() }}'
                },
                success:function (response) {
                    $.each(all_ids,function (key,val){
                        $('#menu_ids'+val).remove();
                    });
                }
            });
        });
    });

</script>
@yield('footer')
