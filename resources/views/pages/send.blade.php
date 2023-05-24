@extends('layouts.app')

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
                        <span class="message">{{$i->message}}</span>

                    </td>
                    <td>
                        <span class="date">{{$i->created_at}}</span>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </section>
</div>
@endsection