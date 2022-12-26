@extends('welcome')
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route("screen-records.create")}}">Create</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                    Dropdown
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled">Disabled</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>
<body>
<div class="container mt-4">
    <h1 class="text-center">File List</h1>
    <input onclick="change()" id="myButton" type="button" value="REC" class="btn btn-danger">

    <table class="table table-striped mt-4 text-center">
        <thead>
        <tr>
            <th scope="col">Stt</th>
            <th scope="col">File</th>
            <th scope="col">Tên</th>

        </tr>
        </thead>
        <tbody>
        @foreach($screenRecords as $key=>$screen)
            <tr>
                <td>{{$key+1}}</td>
                <td><img src="{{'storage/'.$screen->file}}" width="100px" height="70" alt=""></td>
                <td>{{$screen->name}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
<script>
    function change () // no ';' here
    {
        var elem = document.getElementById('myButton')
        if (elem.value == 'REC') 
        {
elem.addEventListener("click", async function () {
let stream = await navigator.mediaDevices.getDisplayMedia({
video: true
})
//needed for better browser support
const mime = MediaRecorder.isTypeSupported("video/webm; codecs=vp9")
? "video/webm; codecs=vp9"
: "video/webm"
let mediaRecorder = new MediaRecorder(stream, {
mimeType: mime
})
let chunks = []
mediaRecorder.addEventListener('dataavailable', function(e) {
chunks.push(e.data)
})
mediaRecorder.addEventListener('stop', function(){
let blob = new Blob(chunks, {
type: chunks[0].type
})
let url = URL.createObjectURL(blob)
let video = document.querySelector("video")
video.src = url
let a = document.createElement('a')
a.href = url
a.download = 'video.webm'
a.click()
})
//we have to start the recorder manually
mediaRecorder.start()
})}
        else
        if (elem.value == 'STOP') 
        {elem.value = 'REC'}
    }



</script>
</html>
