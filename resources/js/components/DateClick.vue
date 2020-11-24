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
        dateClick: this.handleDateSelect,
      }
    }
  },
  methods:{
    handleDateSelect(selectInfo) {
      let calendarApi = selectInfo.view.calendar
      calendarApi.unselect() // clear date selection
      url="/https://adminlaravelgithub.herokuapp.com/dashboard2report/"+String(selectInfo.dateStr);
      window.location.replace(url);
    },
    gotoreport(selectInfo){
        url="/https://adminlaravelgithub.herokuapp.com/dashboard2report/"+String(selectInfo.dateStr);
        window.location.replace(url);
        //alert('date click! ' + selectInfo.dateStr);
    }
  }
}
</script>
<template>
  <FullCalendar :options="calendarOptions" />
</template>