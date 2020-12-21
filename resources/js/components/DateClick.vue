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
      var url="/dashboardreport/";
      console.log(selectInfo.dateStr);
      var myDate = String(selectInfo.dateStr);
      console.log(myDate);
      myDate = myDate.split("-");
      var newDate = new Date(  myDate[0], myDate[1] - 1, myDate[2]);
      
      console.log(newDate.getTime());
      var timestamp = String( newDate.getTime());
      var res = url+timestamp;
      //var timestapm = 
      calendarApi.unselect(); // clear date selection
      //var url="/https://adminlaravelgithub.herokuapp.com/dashboard2report/"+String(selectInfo.dateStr);
       window.open(res);
    }
  }
}
</script>
<template>
  <FullCalendar :options="calendarOptions" />
</template>