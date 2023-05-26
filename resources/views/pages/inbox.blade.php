@extends('layouts.app')

@push('scripts')
<script>
function read(index) {

}
</script>
@endpush

@section('content')
<div style="border: 0px solid black;height:170mm;">
    <!-- menu list  -->
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
        <table class="indexTable" id="indexTable" style="border: 0px solid black; width:320mm; margin-left:20mm;">
            <thead>
                <th>Email</th>
                <th>Subject</th>
                <th>Message</th>
                <th>Date</th>
            </thead>
            <tbody>
                @foreach($receiver as $i)
                <tr onclick="read('{{ $i }}')" style="height: 30px;">
                    <td scope="row" style="width: 60mm;padding:10px; cursor:pointer">
                        <span class="email">{{$i->sender}}</span>
                    </td>

                    <td scope="row" style="padding:10px; cursor:pointer">
                        <span class="email">{{$i->subject}}</span>
                    </td>

                    <td style="padding:10px; cursor:pointer"><a
                            href="{{ route('read-page') }}?data={{ urlencode(json_encode($i)) }}"
                            style="text-decoration: none; color:black">
                            <span class="message">{{$i->message}}</span>
                        </a>
                    </td>
                    <td>
                        <span class="date" style="padding:10px; cursor:pointer">{{$i->created_at}}</span>
                    </td>

                    <td>
                        <form action="{{ route('del', ['id' => $i]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-success">Delete</button>
                        </form>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>


    </section>
</div>
@endsection