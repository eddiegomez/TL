import {Line} from 'vue-chartjs'

export default {
  extends: Line,
  mounted () {
    axios.get("api/dash").then(({ data }) => {
      localStorage.setItem("1",data.janeiro);
      localStorage.setItem("2",data.fevereiro);
      localStorage.setItem("3",data.marco);
      localStorage.setItem("4",data.abril);
      localStorage.setItem("5",data.maio);
      localStorage.setItem("6",data.junho);
      localStorage.setItem("7",data.julho);
      localStorage.setItem("8",data.agosto);
      localStorage.setItem("9",data.setembro);
      localStorage.setItem("10",data.outubro);
      localStorage.setItem("11",data.novembro);
      localStorage.setItem("12",data.dezembro);
      });
    axios.get("api/chart");
this.renderChart({
      labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho'],
      datasets: [
        {
          label: 'Pessoas Encontradas',
          backgroundColor: '#05CBE1',
          data: [0, 0, 0, 0, 3, 1, 0]
        },{
          label: 'Pessoas Perdidas',
          backgroundColor: '#FC2525',
          data: [0, 0, 0, 0, 4, 2, 0]
          //data: [localStorage.getItem("1"), localStorage.getItem("2"), localStorage.getItem("3"), localStorage.getItem("4"), localStorage.getItem("5"), localStorage.getItem("6"), localStorage.getItem("7")]
        }
      ]
    }, {responsive: true, maintainAspectRatio: false})

  }
}