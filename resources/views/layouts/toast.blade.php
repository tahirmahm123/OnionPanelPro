@if(session()->has('createVPN'))
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Success!</h4>
        @php
            $data = session()->get('createVPN');
        @endphp
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <button type="button" class="btn btn-primary btn-sm float-right mx-2" aria-label="Close" data-dismiss="alert"
                onclick="Copier('Welcome to Onion VPN\nUsername : {{ $data['username'] }}\nPassword : {{ $data['password'] }}')">
            <i class="icon-copy"></i>
        </button>
        <span>{{ $data['message'] }}</span><br>
        <span>Username : {{ $data['username'] }}</span><br>
        <span>Password : {{ $data['password'] }}</span>
    </div>
    <script>
        function Copier(str) {
            var el = document.createElement('textarea');
            el.value = str;
            el.setAttribute('readonly', '');
            el.style = {
                position: 'absolute',
                left: '-9999px'
            };
            document.body.appendChild(el);
            el.select();
            document.execCommand('copy');
            document.body.removeChild(el);
        }
    </script>
@elseif(session()->has('success'))
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Success</h4>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <p>{{ session()->get('success') }}</p>
    </div>
@elseif(session()->has('fail'))
    <div class="alert alert-danger" role="alert">
        <h4 class="alert-heading">Success</h4>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <p>{{ session()->get('fail') }}</p>
    </div>
@endif
