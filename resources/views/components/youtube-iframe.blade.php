@if(isset($youtube_id))
<div class="youtube-iframe-block">
    <iframe
            src="https://www.youtube.com/embed/{{$youtube_id}}"
            frameborder="0"
            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen></iframe>
</div>
@endif
