<h3>hi:{{ $account->name }}</h3>
<p>
    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fuga odio, ab ratione quaerat natus deleniti eius sed aliquam dicta vitae, sint architecto tenetur cupiditate! Error corporis distinctio facere autem earum.
</p>
<p>
    <a href="{{ route('account.verify',$account->email) }}">Click here your verify your account</a>
</p>