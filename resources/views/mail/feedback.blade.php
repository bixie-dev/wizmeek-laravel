<h1>Feedback from {{ $data['user_name'] }}</h1>
<p>Feedback type: {{ $data['feedback_type'] }}</p>

@if ($data['rating'])
    <p>The project was rated for {{ $data['rating'] }} stars.</p>
@endif
@if ($data['message'])
    <p>Message:</p>
    <p>{{ $data['message'] }}</p>
@endif