@extends('layouts.app')

@section('css')
<style>

</style>
@endsection

@section('main')
<div class="container">
    <div class="row">
        @include('layouts.components.task.taskPlanning')
    </div>
</div>
@endsection


@section('js')
<script>
$(document).ready(function(){
    var urlTaskSearch = "{{ route('tasks.search') }}"
    $('#searchnav').on('keyup', function(){
        var searching = $(this).val()
        searchTasks(searching, urlTaskSearch, "{{ csrf_token() }}");
    });
})
const setdate=document.querySelector(".setdate");
const date= new Date().toDateString();
setdate.innerHTML=date;

setInterval(function(){
const settime=document.querySelector(".settime");
const time= new Date().toLocaleTimeString();
settime.innerHTML=time;
},500);

function checked(id){
var checked=document.querySelector(".check"+id);
checked.classList.toggle("active_circle");
checked.classList.toggle("active_inner_circle");
var striked=document.querySelector("#strike"+id);
striked.classList.toggle("strike_none");
var ticked=document.querySelector("#tick"+id);
ticked.classList.toggle("check_active");
}

var urlNewTask = "{{ route('tasks.newtask') }}"
</script>
@endsection