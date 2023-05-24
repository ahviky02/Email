<div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 40mm; text-align:center;">
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="{{ route('inbox')}}" class="nav-link active" aria-current="page">
                Inbox
            </a>
        </li>
        <li>
            <a href="{{ route('send')}}" class="nav-link link-dark">
                Send
            </a>
        </li>

        <li>
            <a href="{{ route('compose') }}" class="nav-link link-dark">
                Compose
            </a>
        </li>
    </ul>
</div>