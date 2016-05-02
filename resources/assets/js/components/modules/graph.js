import Chart from 'chart.js';

export default {
    template: '<canvas v-el:canvas></canvas>{{{legend}}}',

    data() {
      return {
        legend: '',
        label: 'test'
      }
    },

    props: {
        labels: {},
        einnahmen: {},
        ausgaben: {},
        color: {
            default: 'rgba(0,0,225,0.2)'
        }
    },

    ready() {
        var data = {
          labels: this.labels,
          
          datasets: [
            {
              label: "Ausgaben",
              fillColor: this.color,
              backgroundColor: "rgba(223, 234, 245, 0.8)",
              borderColor: "rgba(39,155,243,1)",
              strokeColor: "#3371b1",
              pointColor: "rgba(220,220,220,1)",
              pointStrokeColor: "#fff",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "rgba(220,220,220,1)",
              data: this.ausgaben,
              borderWidth: 4,
              pointBorderWidth: 10,
              pointBackgroundColor: "#fff",
            },
            {
              label: 'Einnahmen',
              fillColor: this.color,
              backgroundColor: "rgba(244, 250, 254, 0.7)",
              borderColor: "rgba(39,155,243,1)",
              strokeColor: "#3370b0",
              pointColor: "rgba(220,220,220,1)",
              pointStrokeColor: "#fff",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "rgba(220,220,220,1)",
              data: this.einnahmen,
              borderWidth: 4,
              pointBorderWidth: 10,
              pointBackgroundColor: "#fff",
            }
          ]
        };

        const chart = new Chart(this.$els.canvas.getContext('2d') , {
            type: "line",
            data: data,
        });

        //this.legend = chart.generateLegend();

    }
}