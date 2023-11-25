<div>
    Show Tweets
    <p>{{$message}}</p>
    <hr>
    @foreach ($tweets as $tweet)
        {{$tweet->user->name}} - {{$tweet->content}} <br>
    @endforeach
</div>
