<template>
  <div class="main-content">
    <div v-if="loggedIn">
      <div class="main-content__top">
        <h1 class="main-content__title">
          Data Pengembalian Buku
        </h1>
      </div>

      <div class="main-content__body">
        <b-card>
          <!-- <router-link to="/transaksi/kembalikan-buku/tambah">
            <b-button variant="primary">Kembalikan Buku</b-button>
          </router-link>
          <hr> -->
          <v-client-table :data="tableData" :columns="columns" :options="options">
            <div slot="__actions" slot-scope="props">
              <div>
                <b-btn v-b-modal="`modal-${props.row.id}`" variant="outline-primary">Kembalikan</b-btn>
                
                <b-modal ref="myModalRef" hide-footer :id="`modal-${props.row.id}`" title="Kembalikan Buku">
                  <input type="text" v-model="form.return_date" placeholder="Tanggal Mengembalikan, yyyy-mm-dd" class="return_date" :name="`return_date-${props.row.id}`">
                  <span class="info-return-date">Tanggal Mengembalikan, yyyy-mm-dd. Misal: 2019-01-13</span>
                  <b-btn class="mt-3" variant="outline-danger" block @click="onClickBtn(props.row.id)">Kembalikan Buku</b-btn>
                </b-modal>
              </div>
            </div>
          </v-client-table>
        </b-card>
      </div>
    </div>
    <div v-else>
      <b-card class="mtr-15">
        <b-alert class="mb-0" show variant="danger">Silahkan login terlebih dahulu!</b-alert>
      </b-card>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      loggedIn: User.loggedIn(),
      columns: ['book_title', 'member_name', 'loan_date', 'must_returned_date', '__actions'],
      tableData: [],
      options: {
        headings: {
          book_title: 'Judul Buku',
          member_name: 'Nema Peminjam',
          loan_date: 'Tanggal Pinjam',
          must_returned_date: 'Tanggal Harus Dikembalikan'
        },
        sortable: ['book_title', 'member_name', 'loan_date'],
        filterable: ['book_title', 'member_name', 'loan_date'],
      },
      form: {
        return_date: ''
      }
    }
  },
  created() {
    this.form.return_date = new Date().toISOString().slice(0,10);
  },
  mounted() {
    axios.get('/api/loan/borrowed/book').then(res => {
      this.tableData = res.data.data
    })
  },
  methods: {
    onClickBtn(id) {
      axios.patch(`/api/loan/return/${id}`, {return_date: this.form.return_date}).then(res => {
        this.tableData = res.data.data
      })
      this.$refs.myModalRef.hide()
    }
  }
}
</script>

<style>
  .return_date {
    margin: auto;
    display: block;
    width: 75%;
    padding: 4px 10px;
    text-align: center
  }
  .info-return-date {
    text-align: center;
    margin: auto;
    display: block;
    color: #aaa;
  }
</style>
