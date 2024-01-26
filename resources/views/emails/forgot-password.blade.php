<div style="border:3px solid green ;padding:15px;background:greenyellow;width:600px;margin:auto">
<h3>Hi {{ $customer->name }}</h3>
<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Unde soluta optio repellendus aut quos iure animi quae laudantium placeat? Repellendus facilis illum earum non inventore enim repellat dolorem eum laboriosam.</p>
<p>
    <a href="{{ route('account.reset_password',$token ) }}" style="display:inline-block;padding:7px 25px;color:#fff;background:darkblue">Click here to get new password</a>
</p>
</div>