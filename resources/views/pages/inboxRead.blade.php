@extends('layouts.app')

@push('scripts')
<script>
function goBack() {
    window.history.back();
}
</script>
@endpush

@section('content')
<div style="border: 0px solid black;height:170mm;">
    <!-- menu list  -->
    @stack('scripts')
    <section style="display: inline-flex; width:20%">
        <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 40mm; text-align:center;">
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="{{ route('inbox')}}" class="nav-link active">
                        Inbox
                    </a>
                </li>
                <li>
                    <a href="{{ route('send')}}" class="nav-link link-dark">
                        Send
                    </a>
                </li>

                <li>
                    <a href="{{ route('compose')}}" class="nav-link link-dark">
                        Compose
                    </a>
                </li>
            </ul>
        </div>
    </section>

    <!-- main body -->
    @stack('scripts')
    <section style="display: inline-flex; width:75%" id="part-2">
        <table style="border: 0px solid black; width:320mm; margin-left:20mm;">
            <thead>
                <th><button style="float: right; margin-right:30mm;" class="btn btn-danger"><i class="bi bi-x"
                            onclick="goBack()"></i></button></th>
            </thead>
            <tbody>

                <tr>
                    <td>
                        <b>Sender :-</b>{{$data->sender}}
                    </td>
                </tr>
                <tr>
                    <td><b>Subject :-</b> {{$data->subject}}</td>
                </tr>
                <tr style="height: 30px;">
                    <td> </td>
                </tr>

                <tr>
                    <td>
                        {{$data->message}}
                    </td>

                </tr>
                <tr>
                    @if(is_null($data->file_name))
                    <td>
                        No File Found
                    </td>
                    @else
                    <td>
                        <a href="{{ route('file.download', ['filename' => $data->file_name]) }}">
                            <b>{{ $data->file_name }}</b>
                            <button class="btn btn-success"><i class="bi bi-download"></i></button>
                        </a>
                    </td>
                    @endif

                </tr>
            </tbody>
        </table>

    </section>
</div>
@endsection