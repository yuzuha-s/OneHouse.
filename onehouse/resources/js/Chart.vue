<template>
  <div>
    <div class="wrapper">
      <div v-if="showValidate" class="validate">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          height="40px"
          viewBox="0 -960 960 960"
          width="40px"
          fill="#576bf5"
        >
          <path
            d="M422-297.33 704.67-580l-49.34-48.67L422-395.33l-118-118-48.67 48.66L422-297.33ZM480-80q-82.33 0-155.33-31.5-73-31.5-127.34-85.83Q143-251.67 111.5-324.67T80-480q0-83 31.5-156t85.83-127q54.34-54 127.34-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 82.33-31.5 155.33-31.5 73-85.5 127.34Q709-143 636-111.5T480-80Zm0-66.67q139.33 0 236.33-97.33t97-236q0-139.33-97-236.33t-236.33-97q-138.67 0-236 97-97.33 97-97.33 236.33 0 138.67 97.33 236 97.33 97.33 236 97.33ZM480-480Z"
          />
        </svg>
        <p>{{ saveMessage }}</p>
        <p>{{ calculationMessage }}</p>
      </div>
      <apexchart
        type="line"
        :options="chartOptions"
        :series="series"
        height="400"
      />
    </div>

    <div class="loan-form wrapper">
      <div class="loan-left">
        <div class="left-fix">
          <div class="form-contant">
            <label for="">借入金額(万円)</label>
            <div class="form-row">
              <input
                v-model.number="loan"
                type="number"
                style="text-align: right"
              />
              <span>万円</span>
            </div>
          </div>

          <div class="form-contant">
            <label for="">年利(固定金利)</label>
            <div class="form-row">
              <input
                type="number"
                v-model.number="rate"
                step="0.1"
                style="text-align: right"
              />
              <span>%</span>
            </div>
          </div>

          <div class="form-contant">
            <label for="">返済期間(年)</label>
            <div class="form-row">
              <input
                v-model.number="loan_term"
                type="number"
                min="10"
                max="40"
                style="text-align: right"
              />
              <span>年</span>
            </div>
          </div>
        </div>

        <div class="left-fix">
          <div class="form-contant">
            <label for="">年齢(歳)</label>
            <div class="form-row">
              <input
                v-model.number="age"
                type="number"
                style="text-align: right"
              />
              <span>歳</span>
            </div>
          </div>

          <div class="form-contant">
            <label for="">毎月の支出(万円)</label>
            <div class="form-row">
              <input
                v-model.number="expense"
                type="number"
                style="text-align: right"
              />
              <span>万円/月</span>
            </div>
          </div>

          <div class="form-contant">
            <label for="">現在の収入(万円/年間)</label>
            <div class="form-row">
              <input
                v-model.number="income"
                type="number"
                style="text-align: right"
              />
              <span>万円/年</span>
            </div>
          </div>
        </div>
        <div class="register">
          <button @click="calculateLoan">計算する</button>
        </div>
      </div>

      <div class="loan-right">
        <div class="loan-card">
          <div class="form-row">
            <div class="form-valiable">{{ payoffAge }}</div>
            <span>歳で完済が完了します。</span>
          </div>
          <div class="form-row">
            <span>月々の返済額は</span>
            <div class="form-valiable">{{ monthlyPayment }}</div>
            <span>万円です。</span>
          </div>

          <div class="register">
            <button @click="saveLoanSimulate">保存する</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import ApexChart from "vue3-apexcharts";
import { defineComponent } from "vue";
import axios from "axios";

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
      errors: {},
      showValidate: false,
      calculationMessage: "",
      saveMessage: "",
      chartSeries: [
        { name: "収入", type: "area", data: [] },
        { name: "支出", type: "line", data: [] },
        { name: "元金", type: "column", data: [] },
        { name: "利息", type: "column", data: [] },
      ],
      chartOptions: {
        chart: {
          stacked: true,
          animations: {
            enabled: true,
            speed: 800,
          },
        },
        stroke: { width: [0, 3, 3, 3] },
        dataLabels: {
          enabled: false,
        },
        yaxis: [
          {
            title: { text: "年間支払額（万円）" },
            min: 0,
            show: true,
            labels: {
              formatter: (val) => Math.floor(val),
            },
          },
        ],
        xaxis: { title: { text: "年齢(歳)" } },
        labels: [],
        tooltip: { shared: false, intersect: false },
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

      let expenseData = [];
      let incomeData = [];

      for (let year = 1; year <= loanTerm; year++) {
        const interestPayment = balance * rate;
        const principalPayment = annualPayment - interestPayment;
        balance -= principalPayment;

        // 年間の支出・収入額
        const annualIncome = this.income * Math.pow(1.01, year - 1); // 年1%上昇
        const annualExpense = this.expense * 12;

        interestPaymentData.push(Math.round(interestPayment));
        principalPaymentData.push(Math.round(principalPayment));
        labels.push(this.age + year);
        expenseData.push(annualExpense);
        incomeData.push(annualIncome);
      }

      // 支払い終了年齢
      this.payoffAge = this.age + loanTerm;

      this.series = [
        {
          name: "収入",
          type: "area",
          data: incomeData,
          fill: {
            type: "gradient",
            gradient: {
              shadeIntensity: 1,
              inverseColors: false,
              opacityFrom: 0.3,
              opacityTo: 0.1,
              stops: [0, 100],
            },
          },
        },
        { name: "支出", type: "line", data: expenseData },
        {
          name: "元利",
          type: "column",
          data: principalPaymentData,
        },
        {
          name: "利息",
          type: "column",
          data: interestPaymentData,
        },
      ];

      this.chartOptions = {
        ...this.chartOptions,
        labels: labels,
        chart: { stacked: true },
      };

      // 計算完了バリデーション
      this.calculationMessage = "計算が完了しました！";
      this.saveMessage = "";
      this.errors = {};

      this.showValidate = true;
      setTimeout(() => {
        this.showValidate = false;
      }, 3000);
    },

    // データ保存
    async saveLoanSimulate() {
      try {
        const loanSimulation = {
          profile_id: 1,
          loan: this.loan,
          rate: this.rate,
          loan_term: this.loan_term,
          age: this.age,
          expense: this.expense,
          income: this.income,
        };

        // LaravelのAPIのPOST
        await axios.put("/api/phase3/1", loanSimulation);
        this.saveMessage = "シミュレーションを保存しました";
        this.calculationMessage = "";

        // 保存完了バリデーション
        this.showValidate = true;
        setTimeout(() => {
          this.showValidate = false;
        }, 3000);

        // 失敗
      } catch (error) {
        if (error.response && error.response.status === 422) {
          // LaravelのバリデーションエラーをVue側にセット
          this.errors = error.response.data.errors;
        } else {
          console.error("通信エラー:", error);
          alert("サーバーへの通信に失敗しました。");
        }
      }
    },
  },
  mounted() {
    this.calculateLoan();
  },
});
</script>