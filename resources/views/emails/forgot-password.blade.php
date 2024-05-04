<div>
    <h3>Hi {{ $customer->name }}</h3>
    <p>
        This is a password reset email for your account.
        Please <a href="{{ route('account.reset_password', $token) }}">click here</a>on the link below to verify your new password creation.
    </p>
    <p>
        <a href="{{ route('account.reset_password', $token) }}">
            Click here to get new password
        </a>
    </p>
</div>
