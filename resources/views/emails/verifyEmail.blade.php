<h3>Hi: {{ $account->name }}</h3>
<p>
    This is an account verification email for our website.
    Please <a href="{{route('verify_account', $account->email)}}">click</a> on the link below to verify your account.
</p>
<p>
    <a href="{{route('verify_account', $account->email)}}">
        Click here to verify your account
    </a>
</p>
