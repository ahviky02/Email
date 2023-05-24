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
                    <a href="{{ route('send')}}" class="nav-link link-dark">
                        Send
                    </a>
                </li>

                <li>
                    <a href="{{ route('compose')}}" class="nav-link active">
                        Compose
                    </a>
                </li>
            </ul>
        </div>
    </section>

    <!-- main body -->
    <section style="display: inline-flex; width:75%">
        <table class="tab" style="border: 0px solid black; width:320mm; margin-left:20mm;">
            <form action="" method="post" enctype="multipart/form-data">
                <thead>
                    <th colspan="4">@if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                        @endif
                    </th>
                </thead>
                @csrf
                <tbody>
                    <tr>
                        <td style="font-weight: 600; font-size:16px; width:30mm; vertical-align:top">From :- </td>
                        <td><input class="form-control" readonly type="email" name="sender"
                                value="{{Auth::user()->email }}" />
                        </td>
                    </tr>
                    <tr>
                        <td style="font-weight: 600; font-size:16px; width:30mm; vertical-align:top">To :- </td>
                        <td><input class="form-control" type="email" name="receiver">
                        </td>
                    </tr>
                    <tr>
                        <td style="font-weight: 600; font-size:16px; width:30mm; vertical-align:top">Subject :-</td>
                        <td><input class="form-control" type="text" name="subject"></td>
                    </tr>
                    <tr>
                        <td style="font-weight: 600; font-size:16px; width:30mm; vertical-align:top">Message :-</td>
                        <td><textarea class="form-control" name="message" id="" cols="30" rows="10"></textarea></td>
                    </tr>
                    <tr>
                        <td style="font-weight: 600; font-size:16px; width:30mm; vertical-align:top">Upload File :-</td>
                        <td><input class="form-control" type="file" name="file"></td>
                    </tr>
                    <tr>
                        <td style="font-weight: 600; font-size:16px; width:30mm; vertical-align:top"></td>
                        <td style="float:right;padding-right:10mm; padding-top:5mm;"><button type="submit"
                                class="btn btn-success">Send</button></td>
                    </tr>
                </tbody>
            </form>
        </table>
    </section>
</div>
@endsection