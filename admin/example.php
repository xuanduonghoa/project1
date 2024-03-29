<!DOCTYPE html> 
<html> 
      
<head> 
    <title> 
        jQuery UI | Date Picker 
    </title> 
      
    <link href= 
'https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css'
          rel='stylesheet'> 
      
    <script src= 
"https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" > 
    </script> 
      
    <script src= 
"https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" > 
    </script> 
</head> 
  
<body> 
    Date: <input type="text" id="my_date_picker"> 
   
    <script> 
        $(document).ready(function() { 
          
            $(function() { 
                $( "#my_date_picker" ).datepicker(); 
            }); 
        }) 
    </script> 
</body> 
  
</html>
<link rel="import" href="../polymer/polymer.html">
<link rel="import" href="../google-signin/google-signin-aware.html">
<link rel="import" href="../google-apis/google-client-loader.html">


<!--
Element providing a list of Google Calendars for a signed in user.
Needs a google-signin element included somewhere on the same page
that handles authentication.
##### Example
    <google-calendar-list title="What I'm up to"></google-calendar-list>
@demo
-->
<dom-module id="google-calendar-list">
  <style>
    :host, span {
      display: inline-block;
    }
    ul {
      list-style: none;
      padding: 0;
    }
    li {
      font-family: Arial, sans-serif;
      display: block;
      list-style: none;
      width: 300px;
      border-radius: .2em;
      padding: .2em;
      margin: .2em;
      overflow: hidden;
    }
    li a {
      color: inherit;
      display: block;
      text-decoration: none;
    }
  </style>
  <template>
    <google-client-loader id="calendar" name="calendar" version="v3"
      on-google-api-load="displayCalendars"></google-client-loader>
    <google-signin-aware
      scopes="https://www.googleapis.com/auth/calendar.readonly"
      is-authorized="{{_signedIn}}"></google-signin-aware>

    <ul id="calendars">
      <li>{{title}}</li>
      <template is="dom-repeat" items="{{calendars}}">
        <li style$="{{_computeCalStyle(item.backgroundColor)}}">
          <a href="{{_computeCalHref(item.id, item.timeZone)}}" target="_blank">{{item.summary}}</a>
        </li>
      </template>
    </ul>
  </template>
</dom-module>

<script>
  Polymer({
    is: 'google-calendar-list',
    properties: {
      _signedIn: {
        type: Boolean,
        value: false,
        observer: '_signInChanged'
      },
      /**
       * A title to be displayed on top of the calendar list.
       */
      title: {
        type: String,
        value: 'My calendars'
      },
      /**
       * List of calendars
       */
      calendars: {
        type: Array,
        value: function() { return []; },
        readOnly: true
      }
    },
    _signInChanged: function(val) {
      if (val) {
        this.displayCalendars();
      }
      else {
        this._setCalendars([]);
      }
    },
    _computeCalStyle: function(backgroundColor) {
      return 'background-color:' + (backgroundColor || 'gray');
    },
    _computeCalHref: function(calId, calTimeZone) {
      return 'https://www.google.com/calendar/embed?src=' + calId + '&ctz=' + calTimeZone;
    },
    /**
     * Displays the calendar list if the user is signed in to Google.
     */
    displayCalendars: function() {
      if (this._signedIn && this.$.calendar.api) {
          var request = this.$.calendar.api.calendarList.list({"key": ""});
        // var request = this.$.calendar.api.calendarList.list({"key": ""});
        request.execute(function(resp) {
          if (resp.error) {
            console.error("Error with calendarList.list", resp.message)
          } else {
            this._setCalendars(resp.items);
          }
        }.bind(this));
      }
    }
  });
</script>


<dom-module id="google-calendar-busy-now">
  <style>
    span {
      font-family: Arial, sans-serif;
      display: inline-block;
      border-radius: .2em;
      padding: .2em;
      margin: .2em;
      overflow: hidden;
    }
    .busy {
      background-color: #FA573C;
    }
    .free {
      background-color: #7BD148;
    }
    .na {
      background-color: #999;
    }
  </style>
  <template>
      <google-client-loader id="calendar" name="calendar" version="v3"
        on-google-api-load="displayBusy"></google-client-loader>
      <google-signin-aware
        scopes="https://www.googleapis.com/auth/calendar.readonly"
        is-authorized="{{_isAuthorized}}"></google-signin-aware>

    <span class$="{{_labelClass}}">{{_label}}</span>
  </template>
</dom-template>
<script>
  (function() {
    var MS_PER_MINUTE = 60000;
    var TIME_SPAN = 30;
/**
A badge showing the free/busy status based on the events in a given calendar.
##### Example
    <google-calendar-busy-now
        calendar-id="YOUR_CAL_ID"
        api-key="YOUR_API_KEY"
        busy-label="Do not disturb"
        free-label="I'm free, talk to me!">
    </google-calendar-busy-now>
*/
    Polymer({
      is: 'google-calendar-busy-now',
      properties: {
        /**
         * Event from this calendar decide whether the status is free/busy.
         */
        calendarId: {
          type: String,
          value: null,
          observer: '_calendarIdChanged'
        },
        /**
         * API key to use with Calendar API requests.
         */
        apiKey: {
          type: String,
          value: null
        },
        /**
         * Label to be displayed if the status is busy.
         */
        busyLabel: {
          type: String,
          value: "I'm busy"
        },
        /**
         * Label to be displayed if the status is free.
         */
        freeLabel: {
          type: String,
          value: "I'm free"
        },
        _labelClass: {
          type: String,
          value: ''
        },
        _label: {
          type: String,
          value: ''
        },
        _isAuthorized: {
          type: Boolean,
          value: false,
          observer: '_isAuthorizedChanged'
        }
      },
      _calendarIdChanged: function() {
        this.displayBusy();
      },
      _isAuthorizedChanged: function() {
        this.displayBusy();
      },
      _setState: function(state) {
        switch(state) {
          case 'free':
            this._label = this.freeLabel;
            this._labelClass = 'free';
            break;
          case 'busy':
            this._label = this.busyLabel;
            this._labelClass = 'busy';
            break;
          case 'na':
            this._label = 'n/a';
            this._labelClass = 'na';
            break;
        };
      },
      /**
        * Displays the busy/free status. Use it to refresh label state
        */
      displayBusy: function() {
        if (!this.calendarId) {
          console.log('CalendarId is required for this component');
          return;
        }
        if (!this._isAuthorized) {
          this._setState('na');
          return;
        }
        if (this.$.calendar.api) {
          if (this.apiKey) {
            gapi.client.setApiKey(this.apiKey);
          }
          var now = new Date();
          var query = {
            timeMin: now.toISOString(),
            timeMax: new Date(now.valueOf() + TIME_SPAN * MS_PER_MINUTE).toISOString(),
            items: [
              {
                id: this.calendarId
              }
            ]
          }
          var request = this.$.calendar.api.freebusy.query(query);
          request.execute(function(resp) {
            if (!resp.calendars) {
              if (resp.error) {
                this._setState('na');
              } else {
                this._setState('free');
              }
              return;
            }
            if (resp.calendars[this.calendarId].errors) {
              this._setState('na');
              return;
            }
            var now = new Date();
            var busyTimes = resp.calendars[this.calendarId];
            for (var i = 0, busyTime; busyTime = busyTimes.busy[i]; i++) {
              var start = new Date(busyTime.start);
              var end = new Date(busyTime.end);
              var busy = start < now && now < end;
              this._setState( busy ? 'busy': 'free');
              if (busy) {
                break;
              }
            }
          }.bind(this));
        }
      }
    });
  })();
</script>