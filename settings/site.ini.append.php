<?php /*

[Event]
# (This is private api and might change in future versions)
# List of global event listeners/filters in the form:
#Listeners[]=<event>@<callback>
# eg:
#Listeners[]=request/input@ezxFormHandler::input
Listeners[]=request/input@newRelicHandler::trackTransaction
*/ ?>
