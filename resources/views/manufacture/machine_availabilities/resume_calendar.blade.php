<div class="col-10 offset-2">    
    <div class="pt-5">
        <div class="">
            <h4>Resume Availabilty Machine {{ localFormatDate($startDate) }} - {{ localFormatDate($endDate) }}</h4>
            <ul>
               <li>Target : {{ $resume['target'] }}</li>
               <li>Available : {{ $resume['available'] }}</li>
               <li>Off : {{ $resume['off'] }}</li>
            </ul>            
        </div>
        <hr>            
        <div id="calendar" class="calendar" data-optioncalendar='{!! json_encode(['initialDate' => $initialDate, 'eventSources' => ['events' => $events], 'eventTimeFormat' => $eventTimeFormat ]) !!}'></div>
    </div>    
</div>
    
    