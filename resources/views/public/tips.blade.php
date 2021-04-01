@if(request()->session()->get('success'))
<script>
    $(function(){
        var success_msg = '{{request()->session()->pull("success")}}';
        Dashmix.helpers('notify', {delay:1,type: 'success', icon: 'fa fa-check mr-1',align: 'center', message: success_msg});
    });
</script>
@endif
@if(request()->session()->get('error'))
    <script>
        $(function(){
            var error_msg = '{!! request()->session()->pull("error") !!}';
            Dashmix.helpers('notify', {type: 'danger', icon: 'fa fa-times mr-1',align: 'center', message: error_msg});
        });
    </script>
@endif
