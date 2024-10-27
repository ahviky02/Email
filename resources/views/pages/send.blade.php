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
    <section style="display: inline-block; width:75%">
    <div class="d-block w-100">
            <input type="search" id="sendSearch" class="form-control" placeholder="Search email" style="width: 100%; margin-bottom: 10px;">
        </div>
        <table class="sendTable" id="sendTable" style="border: 0px solid black; width:90%; margin-left:20mm;">
            <thead>
                <th>Email</th>
                <th>Subject</th>
                <th>Message</th>
                <th>Date</th>
                <th>Action</th>
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
                        <span class="message"
                            style="display: inline-block; width: 100px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                            {{$i->message}}
                        </span>
                    </td>

                    <td>
                        <span class="date">{{$i->created_at}}</span>
                    </td>

                    <td class="d-flex gap-3">
                        <a href="{{ route('read-send-page') }}?data={{ urlencode(json_encode($i)) }}"
                            style="text-decoration: none; color:black">
                            <button class="btn btn-success">Open</button>
                        </a>
                        <button class="btn btn-danger delete"  value="{{ $i->id }}">Delete</button>

                    </td>

                    

                </tr>
                @endforeach
            </tbody>
        </table>
    </section>
</div>
@endsection