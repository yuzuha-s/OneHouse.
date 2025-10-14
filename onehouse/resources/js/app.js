import './bootstrap';

import { createApp } from "vue";
import VueApexCharts from "vue3-apexcharts";

import Chart from "./Chart.vue";
import Calendar from "./Calendar.vue";

const chartApp = createApp(Chart);
chartApp.use(VueApexCharts);
chartApp.mount("#chart-app");

// カレンダー用
const calendarApp = createApp(Calendar);
calendarApp.mount("#calendar-app");


