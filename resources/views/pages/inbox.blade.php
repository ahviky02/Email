@extends('layouts.app')

@push('scripts')
<!-- <script>
    function read(index) {
        // Functionality to read the email can be implemented here
    }

    function deleteInbox(id) {
        if (confirm('Are you sure you want to delete this inbox item?')) {
            $.ajax({
                url: "{{ route('del', '') }}/" + id,
                type: "POST",
                data: {
                    id: id,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    // Handle the success response
                    console.log(response);
                    alert('Inbox item deleted successfully.');
                    location.reload(); // Reload the page to reflect changes
                },
                error: function(xhr, status, error) {
                    console.error(error);
                    alert('Error deleting inbox item: ' + xhr.responseText);
                }
            });
        }
    }
</script> -->
@endpush

@section('content')
<div style="border: 0px solid black; height:170mm;">
    <!-- menu list -->
    <section style="display: inline-flex; width:20%">
        <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 40mm; text-align:center;">
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="{{ route('inbox') }}" class="nav-link active">Inbox</a>
                </li>
                <li>
                    <a href="{{ route('send') }}" class="nav-link link-dark">Send</a>
                </li>
                <li>
                    <a href="{{ route('compose') }}" class="nav-link link-dark">Compose</a>
                </li>
            </ul>
        </div>
    </section>

    <!-- main body -->
    <section style="display: inline-block; width:75%" id="part-2">
        <div class="d-block w-100">
            <input type="search" id="InboxSearch" class="form-control" placeholder="Search email" style="width: 100%; margin-bottom: 10px;">
        </div>
        <table class="indoxTable" id="indoxTable" style="border: 0px solid black; width:90%; margin-left:20mm;">
            <thead>
                <tr>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($receiver as $i)
                <tr style="height: 30px;">
                    <td scope="row" style="width: 60mm; padding:10px; cursor:pointer">
                        <span class="email">{{ $i->sender }}</span>
                    </td>
                    <td scope="row" style="padding:10px; cursor:pointer">
                        <span class="email">{{ $i->subject }}</span>
                    </td>
                    <td>
                        <span class="message" style="display: inline-block; width: 100px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                            {{ $i->message }}
                        </span>
                    </td>
                    <td>
                        <span class="date" style="padding:10px; cursor:pointer">{{ $i->created_at }}</span>
                    </td>
                    <td class="d-flex gap-3">
                        <a href="{{ route('read-page') }}?data={{ urlencode(json_encode($i)) }}" style="text-decoration: none; color:black">
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