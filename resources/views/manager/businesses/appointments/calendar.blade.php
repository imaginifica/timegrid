@extends('layouts.app')

@section('css')
@parent
<link rel="stylesheet" href="{{ asset('css/datetime.css') }}">
<link rel="stylesheet" href="{{ asset('css/scheduler.min.css') }}">
@endsection

@section('content')
<div id="calendar"></div>

<div class="well">{{ $icalURL }}</div>
@endsection

@push('footer_scripts')
<script src="{{ asset('js/datetime.js') }}"></script>
<script src="{{ asset('js/scheduler.min.js') }}"></script>

<script>
$(document).ready(function(){

    $('#calendar').fullCalendar({
        defaultDate: moment(),
        editable: true,
        selectable: true,
        eventLimit: true, // allow "more" link when too many events
        locale: timegrid.lang,
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'agendaDay,agendaTwoDay,agendaWeek,month'
        },
        defaultView: 'agendaDay',
        allDayDefault: false,
        allDaySlot: false,
        businessHours: {
            start: timegrid.minTime,
            end: timegrid.maxTime,
            dow: [ 1, 2, 3, 4, 5, 6 ]
        },
        views: {
            agendaDay: {
                minTime: timegrid.minTime,
                maxTime: timegrid.maxTime,
                slotDuration: timegrid.slotDuration,
                groupByResource: true
            }
        },

        resources: [
            { id: 'a', title: 'Room A' },
            { id: 'b', title: 'Room B', eventColor: 'green' },
            { id: 'c', title: 'Room C', eventColor: 'orange' },
            { id: 'd', title: 'Room D', eventColor: 'red' }
        ],
        events: [
            { id: '1', resourceId: 'a', start: '2017-05-28T09:30:00', end: '2017-05-28T10:30:00', title: 'event 1' },
            { id: '2', resourceId: 'a', start: '2017-05-28T09:00:00', end: '2017-05-28T14:00:00', title: 'event 2' },
            { id: '3', resourceId: 'b', start: '2017-05-28T12:00:00', end: '2017-05-28T06:00:00', title: 'event 3' },
            { id: '4', resourceId: 'c', start: '2017-05-28T07:30:00', end: '2017-05-28T09:30:00', title: 'event 4' },
            { id: '5', resourceId: 'd', start: '2017-05-28T10:00:00', end: '2017-05-28T15:00:00', title: 'event 5' }
        ],

        //events: timegrid.events
    });

});

</script>
@endpush