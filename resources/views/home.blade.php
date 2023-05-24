@extends('layouts.app')

@section('content')

<div style="border: 0px solid black;height:170mm;">
    <!-- menu list  -->
    <section style="display: inline-flex;">@include('menu')</section>

    <!-- main body -->
    <section style="display: inline-flex;">
        <table class="tab" style="border: 0px solid black; width:320mm; margin-left:20mm;">
            <thead>
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
                <th>Date</th>
            </thead>
            <tbody>

            </tbody>
        </table>
    </section>

</div>


@endsection