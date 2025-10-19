<template>
  <div>
    <div class="loan-form wrapper">
      <div class="loan-left">
        <div class="form-contant">
          <label for=""
            >借入金額(万円)<input
              v-model.number="loan"
              type="number"
            />万円</label
          >
        </div>
        <div class="form-contant">
          <label for=""
            >年利(固定金利)<input
              type="number"
              v-model.number="rate"
              step="0.1"
            />%</label
          >
        </div>

        <div class="form-contant">
          <label for=""
            >返済期間(年)<input
              v-model.number="loan_term"
              type="number"
              min="10"
              max="40"
            />年</label
          >
        </div>

        <div class="form-contant">
          <label for=""
            >年齢(歳)<input v-model.number="age" type="number" />歳</label
          >
        </div>

        <div class="form-contant">
          <label for=""
            >毎月の支出(万円)<input
              v-model.number="expense"
              type="number"
            />万円</label
          >
        </div>
        <div class="form-contant">
          <label for=""
            >現在の収入(万円/年間)<input
              v-model.number="income"
              type="number"
            />万円</label
          >
        </div>
        <div class="register">
          <button @click="calculateLoan">計算する</button>
        </div>
      </div>

      <div class="loan-right">
        <apexchart
          type="bar"
          :options="chartOptions"
          :series="series"
          width="700"
        />
      </div>
    </div>

    <div class="wrapper">
      <div class="loan-card">
        <div class="form-valiable">{{ payoffAge }}</div>
        <label>歳で完済が完了します。</label><br />
        <label>月々の返済額は</label>
        <div class="form-valiable">{{ monthlyPayment }}</div>
        <label>万円です。</label>
      </div>
    </div>
  </div>
</template>

<script>
import ApexChart from "vue3-apexcharts";
import { defineComponent } from "vue";

export default defineComponent({
  components: { apexchart: ApexChart },
  data() {
    return {
      series: [],
      loan: 3000,
      rate: 1.5,
      loan_term: 35,
      age: 30,
      expense: 20,
      income: 500,
      monthlyPayment: 0,
      chartSeries: [
        { name: "元金", type: "column", data: [] },
        { name: "利息", type: "column", data: [] },
      ],
      chartOptions: {
        chart: { stacked: true },
        stroke: { width: [0, 0] },
        yaxis: [{ title: { text: "年間支払額（万円）" }, min: 0 }],
        labels: [],
        tooltip: { shared: true, intersect: false },
        legend: { position: "top" },
      },
      payoffAge: 0,
    };
  },
  methods: {
    calculateLoan() {
      const rate = this.rate / 100;
      const loanTerm = this.loan_term;
      const loan = this.loan;

      // 年間返済額
      const under = loan * (rate * Math.pow(1 + rate, loanTerm));
      const over = Math.pow(1 + rate, loanTerm) - 1;

      const annualPayment = under / over;
      // 月々の支払金額
      this.monthlyPayment = Math.round((annualPayment / 12) * 100) / 100;

      let balance = loan;
      let interestPaymentData = [];
      let principalPaymentData = [];
      let labels = [];

      for (let year = 1; year <= loanTerm; year++) {
        const interestPayment = balance * rate;
        const principalPayment = annualPayment - interestPayment;
        balance -= principalPayment;

        interestPaymentData.push(Math.round(interestPayment));
        principalPaymentData.push(Math.round(principalPayment));
        labels.push(this.age + year);
      }
      // 支払い終了年齢
      this.payoffAge = this.age + loanTerm;

      this.series = [
        { name: "元利", type: "column", data: principalPaymentData },
        { name: "利息", type: "column", data: interestPaymentData },
      ];
      this.chartOptions = { ...this.chartOptions, labels: labels };
    },
  },
  mounted() {
    this.calculateLoan();
  },
});
</script>