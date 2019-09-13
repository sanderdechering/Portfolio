 @component('mail::message')
# Thank you for your message

<p><strong>Name</strong><br>{{ $data['name'] }}</p>
<p><strong>Email</strong><br>{{ $data['email'] }}</p>
<p><strong>Message</strong><br>{{ $data['message'] }}</p>
@endcomponent
