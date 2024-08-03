<template>
  <div class="max-w-4xl mx-auto mt-10 p-5 border rounded-lg">
    <h1 class="text-2xl font-bold mb-4">Orçamento Familiar</h1>
    <div ref="echartsContainer" style="height: 500px;"></div>
  </div>
</template>

<script>
import * as echarts from 'echarts';

export default {
  name: 'TreemapChart',
  mounted() {
    this.createTreeMap();
  },
  methods: {
    createTreeMap() {
      const chart = echarts.init(this.$refs.echartsContainer);

      const option = {
        series: {
          type: 'treemap',
          data: [
            { name: 'Habitação', value: 1000 },
            { name: 'Alimentação', value: 600 },
            { name: 'Transporte', value: 300 },
            { name: 'Saúde', value: 200 },
            { name: 'Lazer', value: 150 },
            { name: 'Educação', value: 400 }
          ],
          label: {
            show: true,
            formatter: '{b}'
          },
          itemStyle: {
            borderColor: '#fff',
            borderWidth: 1
          }
        }
      };

      chart.setOption(option);
    }
  }
};
</script>
