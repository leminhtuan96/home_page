<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Screen Recorder</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<script>
    // function change () // no ';' here
    // { 
    //     var elem = document.getElementById('myButton')
    //     if (elem.value == 'REC') 
    //     {elem.value = 'STOP'}
    //     else
    //     if (elem.value == 'STOP') 
    //     {elem.value = 'REC'}
    // }

    let btn = document.getElementById('myButton')
    btn.addEventListener("click", async function () {
let stream = await navigator.mediaDevices.getDisplayMedia({
video: true
})
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
mediaRecorder.start()
})

    



</script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
