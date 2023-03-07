<template>
  <div class="main-content">
    <div v-if="loggedIn">
      <div class="main-content__top">
        <h1 class="main-content__title">
          Laporan
        </h1>
      </div>

      <div class="main-content__body">
        <div class="container">
          <div class="row">
            <div class="col-sm-3">
              <b-card>
                <p class="title-global-info">Jumlah Buku</p>
                <p class="content-global-info">{{ global_info.books }}</p>
                <router-link to="/master/buku">
                  <b-button outline block variant='outline-success'>Selengkapnya</b-button>
                </router-link>
              </b-card>
            </div>
            <div class="col-sm-3">
              <b-card>
                <p class="title-global-info">Jumlah Anggota</p>
                <p class="content-global-info">{{ global_info.members }}</p>
                <router-link to="/master/anggota">
                  <b-button outline block variant='outline-success'>Selengkapnya</b-button>
                </router-link>
              </b-card>
            </div>
            <div class="col-sm-3">
              <b-card>
                <p class="title-global-info">Buku Dipinjam</p>
                <p class="content-global-info">{{ global_info.loans }}</p>
                <router-link to="/transaksi/kembalikan-buku">
                  <b-button outline block variant='outline-success'>Selengkapnya</b-button>
                </router-link>
              </b-card>
            </div>
            <div class="col-sm-3">
              <b-card>
                <p class="title-global-info">Total Pinjaman</p>
                <p class="content-global-info">{{ global_info.total_loans }}</p>
                <router-link to="/transaksi/pinjam-buku">
                  <b-button outline block variant='outline-success'>Selengkapnya</b-button>
                </router-link>
              </b-card>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      loggedIn: User.loggedIn(),
      global_info: ''
    }
  },
  mounted() {
    this.callGlobalInfo()
  },
  methods: {
    callGlobalInfo() {
      axios.get('/api/perpus/global-info').then(res => {
        this.global_info = res.data
      })
    }
  }
}
</script>

<style>
  .title-global-info {
    margin: 0 auto;
    text-align: center;
    font-size: 14pt;
  }
  .content-global-info {
    margin: 0 auto 15px auto;
    font-size: 16pt;
    text-align: center;
    color: #8a8181;
  }
  a:hover {
    text-decoration: none
  }
</style>
