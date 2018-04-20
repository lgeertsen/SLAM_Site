<template lang="html">
  <div>
    <line-chart
      :data="body"
      :options="options"
      :width="400"
      :height="200"
      >
     </line-chart>
   </div>
 </template>

 <!-- :options="{responsive: false, maintainAspectRatio: false}"
 :width="400"
 :height="200" -->

<script>
import LineChart from './LineChart.js'

export default {
  props: ['elo'],

  data() {
    return {
      data: this.elo,
      options: {
        tooltips: {
            displayColors: false,
            titleFontSize: 0,
            titleMarginBottom: 0
        },
        legend: {
            display: false
        },
        responsive: true,
        maintainAspectRatio: false
      }
    }
  },

  computed: {
    body: function () {
      let data = {};
      data.labels = [];
      data.datasets = [];
      let datasets = {};
      datasets.label =  'ELO';
      datasets.borderColor = '#e74c3c';
      datasets.pointBackgroundColor = '#e74c3c';
      datasets.fill = false;
      let points = JSON.parse(this.data);
      points.unshift(1000);
      for(let i in points) {
        data.labels.push(' ');
      }
      datasets.data = points;
      datasets.options = {
        tooltips: {
          mode: 'nearest'
        }
      };
      data.datasets.push(datasets);
      return data;
    }
  },

  components: {
    LineChart
  }
}
</script>
