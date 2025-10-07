## チャートApexChartsのライブラリ使用方法

インストール
```
npm install apexcharts --save
npm install vue3-apexcharts --save

npm install @vitejs/plugin-vue --save-dev
```

resourse/app.jsに下記追記
```
import "./bootstrap";
// この下から追記

import { createApp } from "vue";
import VueApexCharts from "vue3-apexcharts";
import App from "./App.vue";

const app = createApp(App);
app.use(VueApexCharts);
app.mount("#app");

```

App.vueをつくる
```
<template>
  <div>
    <h2>売上グラフ</h2>
    <apexchart type="bar" :options="chartOptions" :series="series" width="500" />
  </div>
</template>

<script setup>
const chartOptions = {
  chart: { id: 'basic-bar' },
  xaxis: { categories: [2020, 2021, 2022, 2023, 2024] },
};

const series = [
  {
    name: '売上',
    data: [30, 40, 35, 50, 49],
  },
];
</script>

```

vite.config.jsをvue仕様に変更
```
import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import vue from "@vitejs/plugin-vue";

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/css/app.css"],
            refresh: true,
        }),
        vue(),
    ],
});

```

## FullCalendar
```
npm install @fullcalendar/vue3 @fullcalendar/core @fullcalendar/daygrid 
@fullcalendar/list @fullcalendar/time
```

