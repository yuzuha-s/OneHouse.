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