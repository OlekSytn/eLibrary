<template>
  <div class="main-content">
    <div v-if="loggedIn">
      <div class="main-content__top">
        <h1 class="main-content__title">
          Detail Pinjam
        </h1>
      </div>

      <div class="main-content__body">
         <b-card class="mr-15">
          <table class="table table-condensed">
            <tr>
              <td style="width: 250px">Nama Member</td>
              <td>{{ loan.member_name }}</td>
            </tr>
            <tr>
              <td>Alamat Member</td>
              <td>{{ loan.member.address }}</td>
            </tr>
            <tr>
              <td>No Telp Member</td>
              <td>{{ loan.member.phone_number }}</td>
            </tr>
            <tr>
              <td>Judul Buku</td>
              <td>{{ loan.book.title }}</td>
            </tr>
            <tr>
              <td>ISBN</td>
              <td>{{ loan.book.isbn }}</td>
            </tr>
            <tr>
              <td>Tanggal Dipinjam</td>
              <td><b>{{ loan.loan_date | moment("DD-MMM-Y") }}</b></td>
            </tr>
            <tr>
              <td>Tanggal Harus Kembalikan Buku</td>
              <td><b>{{ loan.must_returned_date | moment("DD-MMM-Y") }}</b></td>
            </tr>
            <tr v-if="loan.return_date">
              <td>Tanggal Dikembalikan</td>
              <td><b>{{ loan.return_date | moment("DD-MMM-Y") }}</b></td>
            </tr>
            <tr>
              <td>Status</td>
              <td>
                <div v-if="loan.return_date"><span class="label-sudah">Sudah Dikembalikan</span></div>
                <div v-else><span class="label-belum">Belum Dikembalikan</span></div>
              </td>
            </tr>
          </table>
          <div>
            <router-link :to="`/transaksi/pinjam-buku/edit/${loan.id}`">
              <b-button variant="outline-success">Edit Pinjam</b-button>
            </router-link>
            <router-link :to="`/transaksi/pinjam-buku`">
              <b-button variant="outline-danger">Back</b-button>
            </router-link>
          </div>
         </b-card>
      </div>
    </div>
  </div>
</template>

<script>

export default {
  data() {
    return {
      loggedIn: User.loggedIn(),
      loan: {
        book: '',
        member: ''
      }
    }
  },
  created() {
    this.callLoan()
  },
  methods: {
    callLoan() {
      axios.get(`/api/loan/${this.$route.params.id}`).then(res => {
        this.loan = res.data.data
      }).catch(error => console.log(error))
    }
  }
}
</script>

<style>
  .label-belum {
    color: #fff;
    background: #f00;
    padding: 4px 10px;
  }
  .label-sudah {
    color: #fff;
    background: #09b74f;
    padding: 4px 10px;
  }
</style>
