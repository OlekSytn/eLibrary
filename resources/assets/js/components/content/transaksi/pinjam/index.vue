<template>
  <div class="main-content">
    <div v-if="loggedIn">
      <div class="main-content__top">
        <h1 class="main-content__title">
          Data Peminjaman Buku
        </h1>
      </div>

      <div class="main-content__body">
        <b-card>
          <router-link to="/transaksi/pinjam-buku/tambah">
            <b-button variant="primary">Tambah Pinam</b-button>
          </router-link>
          <hr>
          <v-client-table :data="tableData" :columns="columns" :options="options">
            <div slot="__actions" slot-scope="props">
              <router-link :to="`/transaksi/pinjam-buku/detail/${props.row.id}`">
                <b-button variant="outline-primary" size="sm">Detail</b-button>
              </router-link>
              <router-link :to="`/transaksi/pinjam-buku/edit/${props.row.id}`">
                <b-button variant="outline-success" size="sm">Edit</b-button>
              </router-link>
              <router-link :to="`/transaksi/pinjam-buku/delete/${props.row.id}`">
                <b-button variant="outline-danger" size="sm">Hapus</b-button>
              </router-link>
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
      columns: ['book_title', 'member_name', 'loan_date', 'return_date', '__actions'],
      tableData: [],
      options: {
        headings: {
          book_title: 'Judul Buku',
          member_name: 'Nema Peminjam',
          loan_date: 'Tanggal Pinjam',
          return_date: 'Tanggal Dikembalikan'
        },
        sortable: ['book_title', 'member_name', 'loan_date'],
        filterable: ['book_title', 'member_name', 'loan_date'],
      }
    }
  },
  mounted() {
    axios.get('/api/loan').then(res => {
      this.tableData = res.data.data
    })
  },
  methods: {
  }
}
</script>

<style>

</style>
