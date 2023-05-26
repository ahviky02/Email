@extends('layouts.app')

@push('confirm')
<script>

</script>
@endpush

@section('content')
<div style="border: 0px solid black;height:170mm;">
    <!-- menu list  -->
    <section style="display: inline-flex; width:20%">
        <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 40mm; text-align:center;">
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="{{ route('inbox')}}" class="nav-link link-dark">
                        Inbox
                    </a>
                </li>
                <li>
                    <a href="{{ route('send')}}" class="nav-link active">
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
    @stack('confirm')
    <section style="display: inline-flex; width:75%">
        <table class="sendTable" style="border: 0px solid black; width:320mm; margin-left:20mm;">
            <thead>
                <th>Email</th>
                <th>Subject</th>
                <th>Message</th>
                <th>Date</th>
            </thead>
            <tbody>
                @foreach($send as $i)
                <tr>
                    <td scope="row">
                        <span class="email">{{$i->receiver}}</span>
                    </td>

                    <td scope="row">
                        <span class="email">{{$i->subject}}</span>
                    </td>

                    <td>
                        <a href="{{ route('read-send-page') }}?data={{ urlencode(json_encode($i)) }}"
                            style="text-decoration: none; color:black">
                            <span class="message">{{$i->message}}</span>
                        </a>

                    </td>
                    <td>
                        <span class="date">{{$i->created_at}}</span>
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