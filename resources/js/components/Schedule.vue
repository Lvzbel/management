<template>
  <div class="w-full py-5">
    <p>{{ workWeek }}</p>
    <div
      class="flex flex-row w-11/12 mx-auto text-center divide-x divide-white shadow-sm"
    >
      <div class="font-bold bg-blue-200 p-1.5 border-b border-white flex-1">
        Monday
      </div>
      <div class="font-bold bg-blue-200 p-1.5 border-b border-white flex-1">
        Tuesday
      </div>
      <div class="font-bold bg-blue-200 p-1.5 border-b border-white flex-1">
        Wednesday
      </div>
      <div class="font-bold bg-blue-200 p-1.5 border-b border-white flex-1">
        Thursday
      </div>
      <div class="font-bold bg-blue-200 p-1.5 border-b border-white flex-1">
        Friday
      </div>
      <div class="font-bold bg-blue-200 p-1.5 border-b border-white flex-1">
        Saturday
      </div>
      <div class="font-bold bg-blue-200 p-1.5 border-b border-white flex-1">
        Sunday
      </div>
    </div>
    <div
      class="flex flex-row w-11/12 mx-auto text-center divide-x divide-white shadow-sm"
    >
      <div
        v-for="day in days"
        :key="day.label"
        class="font-bold bg-blue-200 p-1.5 border-b border-white flex-1"
      >
        {{ renderDay(day.from, day.to, day.isOff) }}
      </div>
    </div>
  </div>
</template>

<script>
import moment from "moment";

export default {
  props: ["schedule"],
  data: function () {
    return {
      days: [
        {
          label: "Monday",
          isOff: !this.schedule.start_monday && !this.schedule.end_monday,
          from: this.schedule.start_monday,
          to: this.schedule.end_monday,
        },
        {
          label: "Tuesday",
          isOff: !this.schedule.start_tuesday && !this.schedule.end_tuesday,
          from: this.schedule.start_tuesday,
          to: this.schedule.end_tuesday,
        },
        {
          label: "Wednesday",
          isOff: !this.schedule.start_wednesday && !this.schedule.end_wednesday,
          from: this.schedule.start_wednesday,
          to: this.schedule.end_wednesday,
        },
        {
          label: "Thursday",
          isOff: !this.schedule.start_thursday && !this.schedule.end_thursday,
          from: this.schedule.start_thursday,
          to: this.schedule.end_thursday,
        },
        {
          label: "Friday",
          isOff: !this.schedule.start_friday && !this.schedule.end_friday,
          from: this.schedule.start_friday,
          to: this.schedule.end_friday,
        },
        {
          label: "Saturday",
          isOff: !this.schedule.start_saturday && !this.schedule.end_saturday,
          from: this.schedule.start_saturday,
          to: this.schedule.end_saturday,
        },
        {
          label: "Sunday",
          isOff: !this.schedule.start_sunday && !this.schedule.end_sunday,
          from: this.schedule.start_sunday,
          to: this.schedule.end_sunday,
        },
      ],
    };
  },
  computed: {
    workWeek: function () {
      const startWeek = moment(this.schedule.week_start).format("MMMM Do YYYY");
      const endWeek = moment(this.schedule.week_end).format("MMMM Do YYYY");
      return `${startWeek} to ${endWeek}`;
    },
  },
  methods: {
    renderDay: function (start, end, isOff) {
      const startHour = moment(start).format("h:mm A");
      const endHour = moment(end).format("h:mm A");
      return isOff ? "Day Off" : `${startHour} - ${endHour}`;
    },
  },
};
</script>

<style></style>
