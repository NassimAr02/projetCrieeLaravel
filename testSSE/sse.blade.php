@extends('layouts.app')

@extends('content')

<h1>Server-Sent Events Demo</h1>
<div class="row">
    <div class="col-nd-4">
        <select  id="idAcheteur">
            @foreach ($acheteurs as $acheteur)
                <option value="{{ $acheteur->idAcheteur }}">{{$acheteur->loginA}}</option>
        </select>
    </div>
    <div class="col-nd-4">
        <input type="text" id="message" class="form-control">
    </div>
    <div class="col-nd-4">
        <input type="button" class="btn btn-success" value="Send" onclick="envoiNotification()">
    </div>
</div>
@endsection
@section('script')
<script>
    function envoiNotification(id){
        $.ajax ({
            type: 'post',
            headers: {
                'Authorization': 'Bearer' + localStorage.getItem('token')
            },
            url:  '{{URL('create-notification')}}',
            data: {
                '_token': "{{ csrf_token() }}",
                'id': $"#idAcheteur".val(),
                'message': $("#message").val()
            }
            success: function(data){
                console.log(data)
            }
        });
    }
</script>