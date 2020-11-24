<script>
import FullCalendar from '@fullcalendar/vue'
import dayGridPlugin from '@fullcalendar/daygrid'
import interactionPlugin from '@fullcalendar/interaction'

export default {
  components: {
    FullCalendar // make the <FullCalendar> tag available
  },
  data() {
    return {
      calendarOptions: {
        plugins: [ dayGridPlugin, interactionPlugin ],
        initialView: 'dayGridMonth',
        selectable:true,
        dateClick: this.gotoreport,
      }
    }
  },
  methods:{
    handleDateSelect(selectInfo) {
      //let title = prompt('Please enter a new title for your event')
      let calendarApi = selectInfo.view.calendar
      calendarApi.unselect() // clear date selection
      alert('date click! ' + selectInfo.dateStr);
    },
    gotoreport(selectInfo){
        url="/https://adminlaravelgithub.herokuapp.com/dashboard2report/"+String(selectInfo.dateStr);
        window.location.replace(url);
    }
  }
}
</script>
<template>
  <FullCalendar :options="calendarOptions" />
</template>