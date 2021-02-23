@extends('layout')
@section('namehalaman')
    <h2 class="text-lg font-medium mr-auto">
        Agenda
    </h2>
@endsection
@section('css')
<link href="{{asset('dist/calendar/lib/main.css')}}" rel='stylesheet' />
@endsection
@section('content')
<div class="overflow-x-auto">

        <div id='calendar'></div>
  
</div>
@endsection
@section('script')
<script src="{{asset('dist/calendar/lib/main.js')}}"></script>
<script>
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth'
    });
    calendar.render();
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth'
        });
        calendar.render();
    });

</script>
@endsection